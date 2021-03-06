<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login - Consultório Médico</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/app.css">
</head>
<body class="bg-light">

	<div class="login-container">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title mb-4 mt-1">Cadastro de usuário</h4>

                <?php $validation = session('validation'); ?>

                <?php if(isset($validation)):?>
                    <div class="alert alert-danger">Verifique as informações preenchidas.</div>
                <?php endif;?>

				<form action="/criar-conta/salvar" method="post">
					<div class="mb-3">
						<label for="3" class="form-label">Usuário</label>
						<input type="text" name="usuario" class="form-control" id="usuario" value="<?= set_value('usuario') ?>">
						<?php if(isset($validation) && $validation->getError('usuario')){
							echo('<div class="text-invalid">'. $validation->getError('usuario') .'</div>');
						} ?>
					</div>
					<div class="mb-3">
						<label for="senha" class="form-label">Senha</label>
						<input type="password" name="senha" class="form-control" id="senha">
						<?php if(isset($validation) && $validation->getError('senha')){
							echo('<div class="text-invalid">'. $validation->getError('senha') .'</div>');
						} ?>
					</div>
					<div class="mb-3">
						<label for="confirmar_senha" class="form-label">Confirmar senha</label>
						<input type="password" name="confirmar_senha" class="form-control" id="confirmar_senha">
						<?php if(isset($validation) && $validation->getError('confirmar_senha')){
						    echo('<div class="text-invalid">'. $validation->getError('confirmar_senha') .'</div>');
						} ?>
					</div>
					<button type="submit" class="btn btn-primary">Cadastrar</button>
				</form>

			</div>
		</div>
	</div>

</body>
</html>