<?php

namespace App\Models;

use CodeIgniter\Model;

class Especialidade extends Model
{
	protected $table = 'especialidade';

	protected $allowedFields = ['nome','valor'];
}