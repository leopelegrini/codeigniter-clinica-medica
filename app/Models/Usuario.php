<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuario extends Model
{
	protected $table = 'login';

	protected $allowedFields = ['usuario','senha'];
}