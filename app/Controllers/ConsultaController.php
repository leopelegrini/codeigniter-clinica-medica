<?php

namespace App\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;

class ConsultaController extends BaseController
{
	private $model;

	public function __construct()
	{
		$this->model = new Consulta;
	}

	public function index()
	{
		helper(['form']);

		$builder = $this->model->orderBy('data', 'desc')->orderBy('hora', 'desc');

		/*
		$nome = $this->request->getVar('nome');

		if($nome){
			$builder->like('usuario', $nome);
		}
		*/

		return view('consultas/index', [
			'consultas' => $builder->findAll(),
			'medicos' => (new Medico())->orderBy('nome', 'asc')->findAll(),
			'pacientes' => (new Paciente())->orderBy('nome', 'asc')->findAll()
		]);
	}

	public function create()
	{
		helper(['form']);

		return view('consultas/create', [
			'medicos' => (new Medico())->orderBy('nome', 'asc')->findAll(),
			'pacientes' => (new Paciente())->orderBy('nome', 'asc')->findAll()
		]);
	}
}
