<?php $this->extend('commons/app'); ?>

<?= $this->section('content') ?>

	<div class="page-title">
		<div class="container ms-auto">
			<h5>Médicos</h5>
		</div>
	</div>

	<div class="app-stage">
		<div class="container ms-auto">

            <?php if(session()->getFlashdata('message')):?>
                <div class="alert alert-info"><?= session()->getFlashdata('message') ?></div>
            <?php endif;?>

            <div class="mb-3">
                <a href="/medicos/cadastrar" class="btn btn-primary">
                    Cadastrar
                </a>
            </div>

            <?php if(count($medicos)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr class="table-secondary">
                        <th>Nome</th>
                        <th>CRM</th>
                        <th>Telefone</th>
                        <th>Especialidade</th>
                        <th style="width:80px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($medicos as $medico):?>
                    <tr>
                        <td><?= $medico['nome'] ?></td>
                        <td><?= $medico['crm'] ?></td>
                        <td><?= $medico['telefone'] ?></td>
                        <td><?= $medico['especialidade_nome'] ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="<?php echo base_url('/medicos/'. $medico['id'] .'/editar');?>" class="text-decoration-none me-2">
                                    Editar
                                </a>
                                <a href="<?php echo base_url('/medicos/'. $medico['id'] .'/excluir');?>" class="text-decoration-none">
                                    Excluir
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <?php else: ?>
            <p>Nenhum médico cadastrado.</p>
            <?php endif; ?>

		</div>
	</div>

<?= $this->endSection() ?>
