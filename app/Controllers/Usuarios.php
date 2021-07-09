<?php

namespace App\Controllers;

use App\Models\Usuario;

class Usuarios extends BaseController
{
	public function index()
	{
		$modelUsuario = new Usuario;

		$usuarios = $modelUsuario->orderBy('usuario', 'asc')->findAll();

		return view('usuarios/index', [
			'usuarios' => $usuarios
		]);
	}

	public function cadastrar()
	{
		helper(['form']);

		$data = [];

		echo view('usuarios/create', $data);
	}

	public function salvar()
	{
		helper(['form']);

		$rules = [
			'usuario' => 'required|min_length[3]|max_length[20]',
			'senha' => 'required|min_length[4]|max_length[200]',
			'confirmar_senha'  => 'matches[senha]'
		];

		if($this->validate($rules)){

			$model = new \App\Models\Usuario();

			$data = [
				'usuario' => $this->request->getVar('usuario'),
				'senha' => password_hash($this->request->getVar('senha'), PASSWORD_DEFAULT)
			];

			$model->insert($data);

			return redirect()->to('/usuarios');
		}

		$data['validation'] = $this->validator;

		echo view('usuarios/create', $data);
	}
}
