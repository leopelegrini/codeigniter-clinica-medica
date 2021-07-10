<?php

namespace App\Controllers;

class RegisterController extends BaseController
{
	public function index()
	{
		helper(['form']);

		$data = [];

		echo view('auth/register', $data);
	}

	public function store()
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

			session()->setFlashdata('message', 'Conta cadastrada com sucesso');

			return redirect()->to('/login');
		}

		$data['validation'] = $this->validator;

		echo view('auth/register', $data);
	}
}
