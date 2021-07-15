<?php

namespace App\Services;

use App\Models\Consulta;
use App\Models\Medico;

class MedicoService
{
	public static function delete($id)
	{
		$count = (new Consulta())->where('medico_id', $id)->countAllResults();

		if($count > 0){
			return [
				'status' => 'error',
				'message' => 'Este médico possui ' . $count . ' consulta' . ($count > 1 ? 's' : '') . ' e não pode ser excluído.'
			];
		}

		(new Medico())->delete($id);

		return [
			'status' => 'success',
			'message' => 'Médico excluído com sucesso.'
		];
	}
}