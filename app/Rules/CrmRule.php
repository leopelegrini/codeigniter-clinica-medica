<?php

namespace App\Rules;

class CrmRule
{
	public function crm(string $value) : bool
	{
		return preg_match('/^[0-9]{5}[\/][A-Z]{2}/', $value) != 1 ? false : true;
	}
}