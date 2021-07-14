<?php

namespace App\Controllers;

use App\Models\Especialidade;
use App\Services\EspecialidadeService;

class EspecialidadeController extends BaseController
{
	private $model;

	public function __construct()
	{
		$this->model = new Especialidade();
	}

	public function index()
	{
		helper(['form']);

		$builder = $this->model->orderBy('nome', 'asc');

		$nome = $this->request->getVar('nome');

		if($nome){
			$builder->like('nome', $nome);
		}

		return view('especialidades/index', [
			'especialidades' => $builder->findAll(),
			'nome' => $nome
		]);
	}

	public function create()
	{
		helper(['form']);

		return view('especialidades/create');
	}

	public function store()
	{
		helper(['form']);

		$rules = [
			'nome' => 'required|min_length[3]|max_length[50]|is_unique[especialidade.nome]',
			'valor' => 'required|regex_match[/^\d{1,3}(.\d{3})*(\,\d{2})?$/]'
		];

		if( ! $this->validate($rules)){
			return redirect()->back()->withInput()->with('validation', $this->validator);
		}

		$this->model->insert([
			'nome' => $this->request->getVar('nome'),
			'valor' => realToDollar($this->request->getVar('valor'))
		]);

		session()->setFlashdata('message', 'Especialidade cadastrada');

		return redirect()->to('/especialidades');
	}

	public function edit($id)
	{
		helper(['form']);

		return view('/especialidades/edit', [
			'especialidade' => $this->model->where('id', $id)->first()
		]);
	}

	public function update($id)
	{
		helper(['form']);

		$rules = [
			'nome' => 'required|min_length[3]|max_length[50]|is_unique[especialidade.nome,id,{id}]',
			'valor' => 'required|regex_match[/^\d{1,3}(.\d{3})*(\,\d{2})?$/]'
		];

		if( ! $this->validate($rules)){
			return redirect()->back()->withInput()->with('validation', $this->validator);
		}

		$this->model->update($id, [
			'nome' => $this->request->getVar('nome'),
			'valor' => $this->request->getVar('valor')
		]);

		session()->setFlashdata('message', 'Especialidade atualizada');

		return redirect()->to('/especialidades');
	}

	public function destroy($id)
	{
		$response = EspecialidadeService::delete($id);

		session()->setFlashdata('message', $response['message']);

		return redirect()->to('/especialidades');
	}
}
