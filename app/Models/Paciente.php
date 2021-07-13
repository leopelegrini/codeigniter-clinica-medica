<?php

namespace App\Models;

use CodeIgniter\Model;

class Paciente extends Model
{
	protected $table = 'paciente';

	protected $allowedFields = ['nome','cpf','email','telefone'];
}