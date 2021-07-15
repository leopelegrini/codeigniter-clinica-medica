<?php

namespace App\Services;

use App\Models\Especialidade;
use App\Models\Medico;

class EspecialidadeService
{
	public static function delete($id)
	{
		$count = (new Medico())->where('especialidade_id', $id)->countAllResults();

		if($count > 0){
			return [
				'status' => 'error',
				'message' => 'Esta especialidade possui ' . $count . ' médico' . ($count > 1 ? 's' : '') . ' vinculado' . ($count > 1 ? 's' : '') . ' e não pode ser excluída.'
			];
		}

		(new Especialidade())->delete($id);

		return [
			'status' => 'success',
			'message' => 'Especialidade excluída com sucesso.'
		];
	}

	public static function getValorEspecialidadeByMedicoId($medico_id)
	{
		$especialidade = (new Medico())->select('especialidade.*')
			->where('medico.id', $medico_id)
			->join('especialidade', 'medico.especialidade_id = especialidade.id')
			->first();

		return $especialidade['valor'];
	}
}