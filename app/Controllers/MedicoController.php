<?php

namespace App\Controllers;

use App\Models\Especialidade;
use App\Models\Medico;

class MedicoController extends BaseController
{
	private $model;

	public function __construct()
	{
		$this->model = new Medico();
	}

	public function index()
	{
		return view('medicos/index', [
			'medicos' => $this->model
				->select([
					'medico.*',
					'especialidade.nome as especialidade_nome'
				])
				->join('especialidade', 'medico.especialidade_id = especialidade.id')
				->orderBy('nome', 'asc')
				->findAll()
		]);
	}

	public function create()
	{
		helper(['form']);

		return view('medicos/create', [
			'especialidades' => (new Especialidade())->orderBy('nome', 'asc')->findAll()
		]);
	}

	public function store()
	{
		helper(['form']);

		$rules = [
			'nome' => 'required|min_length[3]|max_length[50]',
			'crm' => 'required|exact_length[8]|is_unique[medico.crm]',
			'telefone' => 'required|max_length[14]',
			'especialidade_id' => 'required'
		];

		if( ! $this->validate($rules)){
			return redirect()->back()->withInput()->with('validation', $this->validator);
		}

		$this->model->insert([
			'nome' => $this->request->getVar('nome'),
			'crm' => $this->request->getVar('crm'),
			'telefone' => $this->request->getVar('telefone'),
			'especialidade_id' => $this->request->getVar('especialidade_id')
		]);

		session()->setFlashdata('message', 'Médico cadastrado');

		return redirect()->to('/medicos');
	}

	public function edit($id)
	{
		helper(['form']);

		return view('/medicos/edit', [
			'medico' => $this->model->where('id', $id)->first(),
			'especialidades' => (new Especialidade())->orderBy('nome', 'asc')->findAll()
		]);
	}

	public function update($id)
	{
		helper(['form']);

		$rules = [
			'nome' => 'required|min_length[3]|max_length[50]',
			'crm' => 'required|exact_length[8]|is_unique[medico.crm,id,{id}]',
			'telefone' => 'required|max_length[14]',
			'especialidade_id' => 'required'
		];

		if( ! $this->validate($rules)){
			return redirect()->back()->withInput()->with('validation', $this->validator);
		}

		$this->model->update($id, [
			'nome' => $this->request->getVar('nome'),
			'crm' => $this->request->getVar('crm'),
			'telefone' => $this->request->getVar('telefone'),
			'especialidade_id' => $this->request->getVar('especialidade_id')
		]);

		session()->setFlashdata('message', 'Médico atualizado');

		return redirect()->to('/medicos');
	}

	public function destroy($id)
	{
		$this->model->delete($id);

		session()->setFlashdata('message', 'Médico excluído');

		return redirect()->to('/medicos');
	}
}
