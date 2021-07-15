<?php $this->extend('commons/app'); ?>

<?= $this->section('content') ?>

	<div class="page-title">
		<div class="container ms-auto">
			<h5>Consultas</h5>
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
						<a href="/consultas/cadastrar" class="btn btn-primary">
							Cadastrar
						</a>
					</div>
					<div class="col-md-6">
						<form action="/consultas" method="get">
							<div class="d-flex">
                                <input type="text" name="termo" class="form-control" value="<?= set_value('termo', $termo) ?>" placeholder="pesquisar...">
								<button type="submit" class="btn btn-primary ms-2">Pesquisar</button>
							</div>
						</form>
					</div>
				</div>
			</div>

            <?php if(count($consultas)): ?>
            <table class="table table-bordered bg-white">
                <thead>
                    <tr class="table-secondary">
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Paciente</th>
                        <th>Médico</th>
                        <th class="text-end">Valor (R$)</th>
                        <th class="collapsed"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultas as $c):?>
                    <tr>
                        <td><?= $c['data'] ?></td>
                        <td><?= $c['hora'] ?></td>
                        <td><?= $c['paciente'] ?></td>
                        <td><?= $c['medico'] ?></td>
                        <td class="text-end"><?= dollarToReal($c['valor']) ?></td>
                        <td class="collapsed">
                            <div class="d-flex">
                                <a href="<?php echo base_url('/consultas/'. $c['id'] .'/editar');?>" class="text-decoration-none me-2">
                                    Editar
                                </a>
                                <a href="<?php echo base_url('/consultas/'. $c['id'] .'/excluir');?>" class="text-decoration-none">
                                    Excluir
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <?php else: ?>
            <p>Nenhuma consulta encontrada.</p>
            <?php endif; ?>

		</div>
	</div>

<?= $this->endSection() ?>
