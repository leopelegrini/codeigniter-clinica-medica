<?php $this->extend('commons/app'); ?>

<?= $this->section('content') ?>

	<div class="page-title">
		<div class="container ms-auto">
			<h5>Especialidades</h5>
		</div>
	</div>

	<div class="app-stage">
		<div class="container ms-auto">

            <?php if(session()->getFlashdata('message')):?>
                <div class="alert alert-info"><?= session()->getFlashdata('message') ?></div>
            <?php endif;?>

            <div class="mb-3">
                <a href="/especialidades/cadastrar" class="btn btn-primary">
                    Cadastrar
                </a>
            </div>

            <?php if(count($especialidades)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr class="table-secondary">
                        <th>Nome</th>
                        <th class="text-end">Valor</th>
                        <th style="width:80px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($especialidades as $esp):?>
                    <tr>
                        <td><?= $esp['nome'] ?></td>
                        <td class="text-end"><?= dollarToReal($esp['valor']) ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="<?php echo base_url('/especialidades/'. $esp['id'] .'/editar');?>" class="btn btn-light btn-sm">
                                    Editar
                                </a>
                                <a href="<?php echo base_url('/especialidades/'. $esp['id'] .'/excluir');?>" class="btn btn-light btn-sm">
                                    Excluir
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <?php else: ?>
            <p>Nenhuma especialidade cadastrada.</p>
            <?php endif; ?>

		</div>
	</div>

<?= $this->endSection() ?>
