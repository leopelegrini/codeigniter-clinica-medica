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

                <h5 class="card-title mb-4 mt-1">Login</h5>

                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>

                <?php if(isset($validation)):?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif;?>

                <form action="/login/auth" method="post">
                    <div class="mb-3">
                        <label class="form-label">Usuário</label>
                        <input name="usuario" class="form-control" placeholder="usuário" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input name="senha" class="form-control" placeholder="******" type="password">
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary btn-block">
                            Entrar
                        </button>
                        <a href="/cadastrar" class="btn btn-outline-primary btn-block">
                            Criar conta
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>