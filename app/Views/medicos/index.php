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
				<div class="row">
					<div class="col-md-6">
						<a href="/medicos/cadastrar" class="btn btn-primary">
							Cadastrar
						</a>
					</div>
					<div class="col-md-6">
						<form action="/medicos" method="get">
							<div class="d-flex">
                                <input type="text" name="termo" class="form-control" value="<?= set_value('termo', $termo) ?>" placeholder="pesquisar...">
								<button type="submit" class="btn btn-primary ms-2">Pesquisar</button>
							</div>
						</form>
					</div>
				</div>
			</div>

            <?php if(count($medicos)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr class="table-secondary">
                        <th>Nome</th>
                        <th>CRM</th>
                        <th>Telefone</th>
                        <th>Especialidade</th>
                        <th class="collapsed"></th>
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
