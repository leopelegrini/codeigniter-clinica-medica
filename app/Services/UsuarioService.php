<?php

namespace App\Services;

use App\Models\Usuario;
use App\Models\Medico;

class UsuarioService
{
	public static function delete($id)
	{
		$id_usuario_logado = session()->get('login_id');
		
		if($id == $id_usuario_logado){
			return [
				'status' => 'error',
				'message' => 'Não é possível o próprio usuário logado no sistema'
			];
		}

		(new Usuario())->delete($id);

		return [
			'status' => 'success',
			'message' => 'Usuário excluído com sucesso.'
		];
	}
}