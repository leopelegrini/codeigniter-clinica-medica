<?php

namespace App\Models;

use CodeIgniter\Model;

class Consulta extends Model
{
	protected $table = 'consulta';

	protected $allowedFields = ['data','hora','valor','medico_id','paciente_id'];
}