<?php

namespace App\Controllers;

use App\Models\Paciente;

class PacienteController extends BaseController
{
	private $model;

	public function __construct()
	{
		$this->model = new Paciente();
	}

	public function index()
	{
		helper(['form']);

		$builder = $this->model->orderBy('nome', 'asc');

		$nome = $this->request->getVar('nome');

		if($nome){
			$builder->like('nome', $nome);
		}

		return view('pacientes/index', [
			'pacientes' => $builder->findAll(),
			'nome' => $nome
		]);
	}

	public function create()
	{
		helper(['form']);

		echo view('pacientes/create');
	}

	public function store()
	{
		helper(['form']);

		$rules = [
			'nome' => 'required|min_length[3]|max_length[50]',
			'cpf' => 'required|is_unique[paciente.cpf]|cpf',
			'email' => 'required|max_length[100]|valid_email',
			'telefone' => 'required'
		];

		if( ! $this->validate($rules)){
			return redirect()->back()->withInput()->with('validation', $this->validator);
		}

		$this->model->insert([
			'nome' => $this->request->getVar('nome'),
			'cpf' => $this->request->getVar('cpf'),
			'email' => $this->request->getVar('email'),
			'telefone' => $this->request->getVar('telefone')
		]);

		session()->setFlashdata('message', 'Paciente cadastrado');

		return redirect()->to('/pacientes');
	}

	public function edit($id)
	{
		helper(['form']);

		echo view('/pacientes/edit', [
			'paciente' => $this->model->where('id', $id)->first()
		]);
	}

	public function update($id)
	{
		helper(['form']);

		$rules = [
			'nome' => 'required|min_length[3]|max_length[50]',
			'cpf' => 'required|is_unique[paciente.cpf,id,{id}]|cpf',
			'email' => 'required|max_length[100]|valid_email',
			'telefone' => 'required'
		];

		if( ! $this->validate($rules)){
			return redirect()->back()->withInput()->with('validation', $this->validator);
		}

		$this->model->update($id, [
			'nome' => $this->request->getVar('nome'),
			'cpf' => $this->request->getVar('cpf'),
			'email' => $this->request->getVar('email'),
			'telefone' => $this->request->getVar('telefone')
		]);

		session()->setFlashdata('message', 'Paciente atualizado');

		return redirect()->to('/pacientes');
	}

	public function destroy($id)
	{
		// $paciente = $this->model->where('id', $id)->first();

		$this->model->delete($id);

		session()->setFlashdata('message', 'Paciente excluído');

		return redirect()->to('/pacientes');
	}
}
