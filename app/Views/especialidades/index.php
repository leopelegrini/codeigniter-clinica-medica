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
				<div class="row">
					<div class="col-md-6">
						<a href="/especialidades/cadastrar" class="btn btn-primary">
							Cadastrar
						</a>
					</div>
					<div class="col-md-6">
						<form action="/especialidades" method="get">
							<div class="d-flex">
                                <input type="text" name="nome" class="form-control" value="<?= set_value('nome', $nome) ?>" placeholder="pesquisar...">
								<button type="submit" class="btn btn-primary ms-2">Pesquisar</button>
							</div>
						</form>
					</div>
				</div>
			</div>

            <?php if(count($especialidades)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr class="table-secondary">
                        <th>Nome</th>
                        <th class="text-end">Valor (R$)</th>
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
                                <a href="<?php echo base_url('/especialidades/'. $esp['id'] .'/editar');?>" class="text-decoration-none me-2">
                                    Editar
                                </a>
                                <a href="<?php echo base_url('/especialidades/'. $esp['id'] .'/excluir');?>" class="text-decoration-none">
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
