<?php

namespace App\Controllers;

use App\Models\Especialidade;

class Especialidades extends BaseController
{
	public function index()
	{
		$model = new Especialidade();

		$registros = $model->orderBy('nome', 'asc')->findAll();

		return view('especialidades/index', [
			'especialidades' => $registros
		]);
	}

	public function cadastrar()
	{
	}

	public function salvar()
	{
	}

	public function editar()
	{
	}

	public function atualizar()
	{
	}
}
