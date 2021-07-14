<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Services\UsuarioService;

class UsuarioController extends BaseController
{
	private $model;

	public function __construct()
	{
		$this->model = new Usuario;
	}

	public function index()
	{
		helper(['form']);

		$builder = $this->model->orderBy('usuario', 'asc');

		$nome = $this->request->getVar('nome');

		if($nome){
			$builder->like('usuario', $nome);
		}

		return view('usuarios/index', [
			'usuarios' => $builder->findAll(),
			'nome' => $nome
		]);
	}

	public function create()
	{
		helper(['form']);

		return view('usuarios/create');
	}

	public function store()
	{
		helper(['form']);

		$rules = [
			'usuario' => 'required|min_length[3]|max_length[50]|is_unique[login.usuario]',
			'senha' => 'required|min_length[4]|max_length[200]',
			'confirmar_senha'  => 'matches[senha]'
		];

		if( ! $this->validate($rules)){
			return redirect()->back()->withInput()->with('validation', $this->validator);
		}

		$this->model->insert([
			'usuario' => $this->request->getVar('usuario'),
			'senha' => password_hash($this->request->getVar('senha'), PASSWORD_DEFAULT)
		]);

		session()->setFlashdata('message', 'Usuário cadastrado');

		return redirect()->to('/usuarios');
	}

	public function edit($id)
	{
		helper(['form']);

		return view('/usuarios/edit', [
			'usuario' => $this->model->where('id', $id)->first()
		]);
	}

	public function update($id)
	{
		helper(['form']);

		$rules = [
			'usuario' => 'required|min_length[3]|max_length[50]|is_unique[login.usuario,id,{id}]',
			'senha' => 'required|min_length[4]|max_length[200]',
			'confirmar_senha'  => 'matches[senha]'
		];

		if( ! $this->validate($rules)){
			return redirect()->back()->withInput()->with('validation', $this->validator);
		}

		$this->model->update($id, [
			'usuario' => $this->request->getVar('usuario'),
			'senha' => password_hash($this->request->getVar('senha'), PASSWORD_DEFAULT)
		]);

		session()->setFlashdata('message', 'Usuário atualizado');

		return redirect()->to('/usuarios');
	}

	public function destroy($id)
	{
		$response = UsuarioService::delete($id);

		session()->setFlashdata('message', $response['message']);

		return redirect()->to('/usuarios');
	}
}
