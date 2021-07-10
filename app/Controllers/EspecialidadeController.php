<?php

namespace App\Controllers;

use App\Models\Especialidade;

class EspecialidadeController extends BaseController
{
	private $model;

	public function __construct()
	{
		$this->model = new Especialidade();
	}

	public function index()
	{
		return view('especialidades/index', [
			'especialidades' => $this->model->orderBy('nome', 'asc')->findAll()
		]);
	}

	public function create()
	{
		helper(['form']);

		echo view('especialidades/create');
	}

	public function store()
	{
		helper(['form']);

		$rules = [
			'nome' => 'required|min_length[3]|max_length[20]',
			'valor' => 'required|regex_match[/^\d{1,3}(.\d{3})*(\,\d{2})?$/]'
		];

		if( ! $this->validate($rules)){
			echo view('especialidades/create', [
				'validation' => $this->validator
			]);
		}
		else {

			$this->model->insert([
				'nome' => $this->request->getVar('nome'),
				'valor' => realToDollar($this->request->getVar('valor'))
			]);

			session()->setFlashdata('message', 'Especialidade cadastrada');

			return redirect()->to('/especialidades');
		}
	}

	public function edit($id)
	{
		helper(['form']);

		echo view('/especialidades/edit', [
			'especialidade' => $this->model->where('id', $id)->first()
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
			echo view('especialidades/edit', [
				'especialidade' => $this->model->where('id', $id)->first(),
				'validation' => $this->validator
			]);
		}
		else {

			$this->model->update($id, [
				'nome' => $this->request->getVar('nome'),
				'valor' => $this->request->getVar('valor')
			]);

			session()->setFlashdata('message', 'Especialidade atualizada');

			return redirect()->to('/especialidades');
		}
	}

	public function destroy($id)
	{
		$this->model->delete($id);

		session()->setFlashdata('message', 'Especialidade excluída');

		return redirect()->to('/especialidades');
	}
}
