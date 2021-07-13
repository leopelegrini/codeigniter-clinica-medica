<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Consultório Médico</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="bg-light">

<header class="p-3 bg-white">
	<div class="container">
		<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
			<a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
				Clínica Médica
			</a>

			<ul class="nav nav-pills ms-auto">
				<li><a href="/home" class="nav-link px-2">Início</a></li>
				<li><a href="/usuarios" class="nav-link px-2">Usuários</a></li>
				<li><a href="/especialidades" class="nav-link px-2">Especialidades</a></li>
				<li><a href="/medicos" class="nav-link px-2">Médicos</a></li>
				<li><a href="/pacientes" class="nav-link px-2">Pacientes</a></li>
				<li><a href="/agenda" class="nav-link px-2">Consultas</a></li>
				<li style="margin-left:1rem;">
					<a href="/logout" class="btn btn-outline-primary me-2">Sair</a>
				</li>
			</ul>
		</div>
	</div>
</header>

<?= $this->renderSection('content') ?>

<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="/js/jquery.mask.min.js"></script>
<script type="text/javascript" src="/js/accounting.min.js"></script>
<script type="text/javascript" src="/js/currency.js"></script>
<script type="text/javascript" src="/js/app.js"></script>

<?= $this->renderSection('scripts') ?>

</body>
</html>