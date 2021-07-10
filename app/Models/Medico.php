<?php

namespace App\Models;

use CodeIgniter\Model;

class Medico extends Model
{
	protected $table = 'medico';

	protected $allowedFields = ['nome','crm','telefone','especialidade_id'];
}