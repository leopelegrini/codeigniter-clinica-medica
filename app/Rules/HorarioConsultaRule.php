<?php

namespace App\Rules;

use App\Models\Consulta;

class HorarioConsultaRule
{
	public function horario_consulta_paciente($hora, string $fields, array $data): bool
	{
		$builder = (new Consulta())
			->where('data', $data['data'])
			->where('hora', $hora)
			->where('paciente_id', $data['paciente_id']);

		if(isset($data['id']) && $data['id']){
			$builder->where('id !=', $data['id']);
		}

		return $builder->first() ? false : true;
	}

	public function horario_consulta_medico($hora, string $fields, array $data): bool
	{
		$builder = (new Consulta())
			->where('data', $data['data'])
			->where('hora', $hora)
			->where('medico_id', $data['medico_id']);

		if(isset($data['id']) && $data['id']){
			$builder->where('id !=', $data['id']);
		}

		return $builder->first() ? false : true;
	}
}