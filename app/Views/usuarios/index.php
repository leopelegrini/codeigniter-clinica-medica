<?php $this->extend('commons/app'); ?>

<?= $this->section('content') ?>

	<div class="page-title">
		<div class="container ms-auto">
			<h5>Usuários</h5>
		</div>
	</div>

	<div class="app-stage">
		<div class="container ms-auto">

            <div class="mb-3">
                <a href="/usuarios/cadastrar" class="btn btn-primary">
                    Cadastrar
                </a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr class="table-secondary">
                        <th>Login</th>
                        <th style="width:80px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario):?>
                    <tr>
                        <td><?= $usuario['usuario'] ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="#" class="btn btn-light btn-sm">Editar</a>
                                <a href="#" class="btn btn-light btn-sm ml-2">Excluir</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

		</div>
	</div>

<?= $this->endSection() ?>
