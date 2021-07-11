<?php

namespace App\Controllers;

use App\Models\Usuario;

class UsuarioController extends BaseController
{
	private $model;

	public function __construct()
	{
		$this->model = new Usuario;
	}

	public function index()
	{
		return view('usuarios/index', [
			'usuarios' => $this->model->orderBy('usuario', 'asc')->findAll()
		]);
	}

	public function create()
	{
		helper(['form']);

		echo view('usuarios/create');
	}

	public function store()
	{
		helper(['form']);

		$rules = [
			'usuario' => 'required|min_length[3]|max_length[20]|is_unique[login.usuario]',
			'senha' => 'required|min_length[4]|max_length[200]',
			'confirmar_senha'  => 'matches[senha]'
		];

		if( ! $this->validate($rules)){
			echo view('usuarios/create', [
				'validation' => $this->validator
			]);
		}
		else {

			$this->model->insert([
				'usuario' => $this->request->getVar('usuario'),
				'senha' => password_hash($this->request->getVar('senha'), PASSWORD_DEFAULT)
			]);

			session()->setFlashdata('message', 'Usuário cadastrado');

			return redirect()->to('/usuarios');
		}
	}

	public function edit($id)
	{
		helper(['form']);

		echo view('/usuarios/edit', [
			'usuario' => $this->model->where('id', $id)->first()
		]);
	}

	public function update($id)
	{
		helper(['form']);

		$rules = [
			'usuario' => 'required|min_length[3]|max_length[20]|is_unique[login.usuario,id,{id}]',
			'senha' => 'required|min_length[4]|max_length[200]',
			'confirmar_senha'  => 'matches[senha]'
		];

		if( ! $this->validate($rules)){
			echo view('usuarios/edit', [
				'usuario' => $this->model->where('id', $id)->first(),
				'validation' => $this->validator
			]);
		}
		else {

			$this->model->update($id, [
				'usuario' => $this->request->getVar('usuario'),
				'senha' => password_hash($this->request->getVar('senha'), PASSWORD_DEFAULT)
			]);

			session()->setFlashdata('message', 'Usuário atualizado');

			return redirect()->to('/usuarios');
		}
	}

	public function destroy($id)
	{
		$this->model->delete($id);

		session()->setFlashdata('message', 'Usuário excluído');

		return redirect()->to('/usuarios');
	}
}
