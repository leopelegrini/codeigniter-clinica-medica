<?php

namespace App\Controllers;

use App\Models\Usuario;

class RegisterController extends BaseController
{
	private $model;

	public function __construct()
	{
		$this->model = new Usuario();
	}

	public function index()
	{
		helper(['form']);

		echo view('auth/register');
	}

	public function store()
	{
		helper(['form']);

		$rules = [
			'usuario' => 'required|min_length[3]|max_length[50]|is_unique[login.usuario]',
			'senha' => 'required|min_length[4]|max_length[24]',
			'confirmar_senha'  => 'matches[senha]'
		];

		if( ! $this->validate($rules)){
			return redirect()->back()->withInput()->with('validation', $this->validator);
		}

		$this->model->insert([
			'usuario' => $this->request->getVar('usuario'),
			'senha' => password_hash($this->request->getVar('senha'), PASSWORD_DEFAULT)
		]);

		session()->setFlashdata('message', 'Conta cadastrada com sucesso');

		return redirect()->to('/login');
	}
}
