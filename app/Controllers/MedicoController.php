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
			'medicos' => $this->model->orderBy('nome', 'asc')->findAll()
		]);
	}

	public function create()
	{
		helper(['form']);

		echo view('medicos/create', [
			'especialidades' => (new Especialidade())->orderBy('nome', 'asc')->findAll()
		]);
	}

	public function store()
	{
		helper(['form']);

		$rules = [
			'nome' => 'required|min_length[3]|max_length[20]',
			'valor' => 'required|regex_match[/^\d{1,3}(.\d{3})*(\,\d{2})?$/]'
		];

		if( ! $this->validate($rules)){
			echo view('medicos/create', [
				'validation' => $this->validator
			]);
		}
		else {

			$this->model->insert([
				'nome' => $this->request->getVar('nome'),
				'valor' => realToDollar($this->request->getVar('valor'))
			]);

			session()->setFlashdata('message', 'Médico cadastrada');

			return redirect()->to('/medicos');
		}
	}

	public function edit($id)
	{
		helper(['form']);

		echo view('/medicos/edit', [
			'medico' => $this->model->where('id', $id)->first()
		]);
	}

	public function update($id)
	{
		helper(['form']);

		$rules = [
			'nome' => 'required|min_length[3]|max_length[20]',
			'valor' => 'required|regex_match[/^\d{1,3}(.\d{3})*(\,\d{2})?$/]'
		];

		if( ! $this->validate($rules)){
			echo view('medicos/edit', [
				'medico' => $this->model->where('id', $id)->first(),
				'validation' => $this->validator
			]);
		}
		else {

			$this->model->update($id, [
				'nome' => $this->request->getVar('nome'),
				'valor' => $this->request->getVar('valor')
			]);

			session()->setFlashdata('message', 'Médico atualizada');

			return redirect()->to('/medicos');
		}
	}

	public function destroy($id)
	{
		$this->model->delete($id);

		session()->setFlashdata('message', 'Médico excluído');

		return redirect()->to('/medicos');
	}
}
