<?php $this->extend('commons/app'); ?>

<?= $this->section('content') ?>

	<div class="page-title">
		<div class="container ms-auto">
			<h5>Usuários</h5>
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
						<a href="/usuarios/cadastrar" class="btn btn-primary">
							Cadastrar
						</a>
					</div>
					<div class="col-md-6">
						<form action="/usuarios" method="get">
							<div class="d-flex">
                                <input type="text" name="nome" class="form-control" value="<?= set_value('nome', $nome) ?>" placeholder="pesquisar...">
								<button type="submit" class="btn btn-primary ms-2">Pesquisar</button>
							</div>
						</form>
					</div>
				</div>
			</div>

            <table class="table table-bordered">
                <thead>
                    <tr class="table-secondary">
                        <th>Login</th>
                        <th class="collapsed"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario):?>
                    <tr>
                        <td><?= $usuario['usuario'] ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="<?php echo base_url('/usuarios/'. $usuario['id'] .'/editar');?>" class="text-decoration-none me-2">
                                    Editar
                                </a>
                                <a href="<?php echo base_url('/usuarios/'. $usuario['id'] .'/excluir');?>" class="text-decoration-none">
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
