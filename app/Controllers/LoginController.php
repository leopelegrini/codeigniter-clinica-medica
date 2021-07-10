<?php

namespace App\Controllers;

class LoginController extends BaseController
{
	public function index()
	{
		helper(['form']);

		echo view('auth/login');
	}

	public function auth()
	{
		$session = session();

		$model = new \App\Models\Usuario();

		$usuario = $this->request->getVar('usuario');

		$senha = $this->request->getVar('senha');

		$usuario_cadastrado = $model->where('usuario', $usuario)->first();

		if($usuario_cadastrado){

			$pass = $usuario_cadastrado['senha'];

			$verify_pass = password_verify($senha, $pass);

			if($verify_pass){

				$ses_data = [
					'login_id' => $usuario_cadastrado['id'],
					'login_usuario' => $usuario_cadastrado['usuario'],
					'logged_in' => TRUE
				];

				$session->set($ses_data);

				return redirect()->to('/home');
			}
			else {
				$session->setFlashdata('message', 'Credenciais inválidas');
				return redirect()->to('/login');
			}
		}
		else {

			$session->setFlashdata('message', 'Credenciais inválidas');

			return redirect()->to('/login');
		}
	}

	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('/login');
	}
}
