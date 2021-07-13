<?php $this->extend('commons/app'); ?>

<?= $this->section('content') ?>

	<div class="page-title">
		<div class="container ms-auto">
			<h5>Pacientes</h5>
		</div>
	</div>

	<div class="app-stage">
		<div class="container ms-auto">

            <?php if(session()->getFlashdata('message')):?>
                <div class="alert alert-info"><?= session()->getFlashdata('message') ?></div>
            <?php endif;?>

            <div class="mb-3">
                <a href="/pacientes/cadastrar" class="btn btn-primary">
                    Cadastrar
                </a>
            </div>

            <?php if(count($pacientes)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr class="table-secondary">
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th style="width:80px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pacientes as $paciente):?>
                    <tr>
                        <td><?= $paciente['nome'] ?></td>
                        <td><?= $paciente['cpf'] ?></td>
                        <td><?= $paciente['email'] ?></td>
                        <td><?= $paciente['telefone'] ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="<?php echo base_url('/pacientes/'. $paciente['id'] .'/editar');?>" class="btn btn-light btn-sm">
                                    Editar
                                </a>
                                <a href="<?php echo base_url('/pacientes/'. $paciente['id'] .'/excluir');?>" class="btn btn-light btn-sm">
                                    Excluir
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <?php else: ?>
            <p>Nenhum paciente cadastrado.</p>
            <?php endif; ?>

		</div>
	</div>

<?= $this->endSection() ?>
