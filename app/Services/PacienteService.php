<?php

namespace App\Services;

use App\Models\Consulta;
use App\Models\Paciente;

class PacienteService
{
	public static function delete($id)
	{
		$count = (new Consulta())->where('paciente_id', $id)->countAllResults();

		if($count > 0){
			return [
				'status' => 'error',
				'message' => 'Este paciente possui ' . $count . ' consulta' . ($count > 1 ? 's' : '') . ' e não pode ser excluído.'
			];
		}

		(new Paciente())->delete($id);

		return [
			'status' => 'success',
			'message' => 'Paciente excluído com sucesso.'
		];
	}
}