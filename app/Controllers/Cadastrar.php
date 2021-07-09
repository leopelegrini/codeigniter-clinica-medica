<?php

namespace App\Controllers;

class Cadastrar extends BaseController
{
	public function index()
	{
		helper(['form']);

		$data = [];

		echo view('cadastrar', $data);
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

			return redirect()->to('/login');
		}

		$data['validation'] = $this->validator;

		echo view('cadastrar', $data);
	}
}
