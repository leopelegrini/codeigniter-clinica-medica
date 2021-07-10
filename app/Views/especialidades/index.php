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

            <table class="table table-bordered">
                <thead>
                    <tr class="table-secondary">
                        <th>Nome</th>
                        <th>Valor</th>
                        <th style="width:80px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($especialidades as $esp):?>
                    <tr>
                        <td><?= $esp['nome'] ?></td>
                        <td><?= $esp['valor'] ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="<?php echo base_url('/especialidades/editar/'.$esp['id']);?>" class="btn btn-light btn-sm">
                                    Editar
                                </a>
                                <a href="<?php echo base_url('/especialidades/excluir/'.$esp['id']);?>" class="btn btn-light btn-sm">
                                    Excluir
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

		</div>
	</div>

<?= $this->endSection() ?>
