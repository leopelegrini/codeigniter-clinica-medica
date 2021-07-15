<?php

namespace App\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use App\Services\EspecialidadeService;
use CodeIgniter\I18n\Time;

class ConsultaController extends BaseController
{
	private $model;

	public function __construct()
	{
		$this->model = new Consulta;
	}

	public function index()
	{
		helper(['form']);

		$builder = $this->model
			->select([
				'consulta.id', 'consulta.data', 'consulta.hora', 'consulta.valor',
				'paciente.nome as paciente',
				'medico.nome as medico'
			])
			->join('medico', 'consulta.medico_id = medico.id')
			->join('paciente', 'consulta.paciente_id = paciente.id')
			->orderBy('data', 'desc')->orderBy('hora', 'desc');

		$termo = $this->request->getVar('termo');

		if($termo){
			$builder->groupStart()
				->like('medico.nome', $termo)
				->orLike('paciente.nome', $termo)
				->groupEnd();
		}

		$consultas = $builder->findAll();

		foreach($consultas as &$c){

			$c['data'] = Time::createFromFormat('Y-m-d', $c['data'])->format('d/m/y');

			$c['hora'] = Time::createFromFormat('H:i:s', $c['hora'])->format('H:i');
		}

		return view('consultas/index', [
			'consultas' => $consultas,
			'medicos' => (new Medico())->orderBy('nome', 'asc')->findAll(),
			'pacientes' => (new Paciente())->orderBy('nome', 'asc')->findAll(),
			'termo' => $termo
		]);
	}

	public function create()
	{
		helper(['form']);

		return view('consultas/create', [
			'medicos' => (new Medico())->orderBy('nome', 'asc')->findAll(),
			'pacientes' => (new Paciente())->orderBy('nome', 'asc')->findAll(),
			'data_padrao' => Time::now()->addDays(7)->format('Y-m-d'),
			'hora_padrao' => Time::now()->format('H:i')
		]);
	}

	public function store()
	{
		helper(['form']);

		$rules = [
			'medico_id' => 'required',
			'paciente_id' => 'required',
			'data' => 'required|valid_date[Y-m-d]',
			'hora' => 'required|valid_date[H:i]',
			'valor' => 'permit_empty|regex_match[/^\d{1,3}(.\d{3})*(\,\d{2})?$/]'
		];

		if( ! $this->validate($rules)){
			return redirect()->back()->withInput()->with('validation', $this->validator);
		}

		$rules = [
			'hora' => [
				'horario_consulta_paciente[medico_id,paciente_id,data]',
				'horario_consulta_medico[medico_id,paciente_id,data]',
			],
		];

		if( ! $this->validate($rules)){
			return redirect()->back()->withInput()->with('validation', $this->validator);
		}

		$valor = $this->request->getVar('valor');

		$valor = $valor ?
			realToDollar($valor) :
			EspecialidadeService::getValorEspecialidadeByMedicoId($this->request->getVar('medico_id'));

		$this->model->insert([
			'medico_id' => $this->request->getVar('medico_id'),
			'paciente_id' => $this->request->getVar('paciente_id'),
			'data' => $this->request->getVar('data'),
			'hora' => $this->request->getVar('hora'),
			'valor' => $valor
		]);

		session()->setFlashdata('message', 'Consulta cadastrada');

		return redirect()->to('/consultas');
	}

	public function edit($id)
	{
		helper(['form']);

		$consulta = $this->model->where('id', $id)->first();

		$consulta['hora'] = Time::createFromFormat('H:i:s', $consulta['hora'])->format('H:i');

		return view('consultas/edit', [
			'medicos' => (new Medico())->orderBy('nome', 'asc')->findAll(),
			'pacientes' => (new Paciente())->orderBy('nome', 'asc')->findAll(),
			'consulta' => $consulta
		]);
	}

	public function update($id)
	{
		helper(['form']);

		$rules = [
			'medico_id' => 'required',
			'paciente_id' => 'required',
			'data' => 'required|valid_date[Y-m-d]',
			'hora' => 'required|valid_date[H:i]',
			'valor' => 'permit_empty|regex_match[/^\d{1,3}(.\d{3})*(\,\d{2})?$/]'
		];

		if( ! $this->validate($rules)){
			return redirect()->back()->withInput()->with('validation', $this->validator);
		}

		$rules = [
			'hora' => [
				'horario_consulta_paciente[medico_id,paciente_id,data]',
				'horario_consulta_medico[medico_id,paciente_id,data]',
			],
		];

		if( ! $this->validate($rules)){
			return redirect()->back()->withInput()->with('validation', $this->validator);
		}

		$valor = $this->request->getVar('valor');

		$valor = $valor ?
			realToDollar($valor) :
			EspecialidadeService::getValorEspecialidadeByMedicoId($this->request->getVar('medico_id'));

		$this->model->update($id, [
			'medico_id' => $this->request->getVar('medico_id'),
			'paciente_id' => $this->request->getVar('paciente_id'),
			'data' => $this->request->getVar('data'),
			'hora' => $this->request->getVar('hora'),
			'valor' => $valor
		]);

		session()->setFlashdata('message', 'Consulta atualizada');

		return redirect()->to('/consultas');
	}

	public function destroy($id)
	{
		$this->model->delete($id);

		session()->setFlashdata('message', 'Consulta excluída com sucesso.');

		return redirect()->to('/consultas');
	}
}
