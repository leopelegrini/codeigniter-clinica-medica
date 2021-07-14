<?php $this->extend('commons/app'); ?>

<?php $validation = session('validation'); ?>

<?= $this->section('content') ?>

	<div class="page-title">
		<div class="container ms-auto">
			<h5>Cadastrar consulta</h5>
		</div>
	</div>

	<div class="app-stage">
		<div class="container ms-auto">

			<div class="mb-3">
				<a href="/consultas" class="link-secondary link-return">
					Voltar
				</a>
			</div>

			<?php if(isset($validation)):?>
				<div class="alert alert-danger">Verifique as informações preenchidas.</div>
			<?php endif;?>

			<div class="panel">
				<form action="/consultas/salvar" method="post">
					<div class="form-row">
						<div class="col-lg-4">

							<div class="mb-3">
								<label for="nome" class="form-label">Médico</label>
								<select name="medico_id" class="form-select" id="medico_id">
									<option value="">- selecione</option>
									<?php foreach ($medicos as $m):?>
									<option value="<?= $m['id'] ?>" <?php set_select('medico_id') ?>>
										<?= $m['nome'] ?>
									</option>
									<?php endforeach;?>
								</select>
								<?php if(isset($validation) && $validation->getError('medico_id')){
									echo('<div class="text-invalid">'. $validation->getError('medico_id') .'</div>');
								} ?>
							</div>

							<div class="mb-3">
								<label for="nome" class="form-label">Paciente</label>
								<select name="medico_id" class="form-select" id="medico_id">
									<option value="">- selecione</option>
									<?php foreach ($medicos as $m):?>
									<option value="<?= $m['id'] ?>" <?php set_select('medico_id') ?>>
										<?= $m['nome'] ?>
									</option>
									<?php endforeach;?>
								</select>
								<?php if(isset($validation) && $validation->getError('medico_id')){
									echo('<div class="text-invalid">'. $validation->getError('medico_id') .'</div>');
								} ?>
							</div>

							<div class="mb-3">
								<label for="valor" class="form-label">Data</label>
								<input type="text" name="valor" class="form-control js-input-decimal" id="valor" value="<?= set_value('valor') ?>">
								<?php if(isset($validation) && $validation->getError('valor')){
									echo('<div class="text-invalid">'. $validation->getError('valor') .'</div>');
								} ?>
							</div>

							<div class="mb-3">
								<label for="valor" class="form-label">Hora</label>
								<input type="text" name="valor" class="form-control js-input-decimal" id="valor" value="<?= set_value('valor') ?>">
								<?php if(isset($validation) && $validation->getError('valor')){
									echo('<div class="text-invalid">'. $validation->getError('valor') .'</div>');
								} ?>
							</div>

							<div class="mb-3">
								<label for="valor" class="form-label">Valor</label>
								<input type="text" name="valor" class="form-control js-input-decimal" id="valor" value="<?= set_value('valor') ?>">
								<?php if(isset($validation) && $validation->getError('valor')){
									echo('<div class="text-invalid">'. $validation->getError('valor') .'</div>');
								} ?>
							</div>

							<button type="submit" class="btn btn-primary">Cadastrar</button>

						</div>
					</div>
				</form>
			</div>


		</div>
	</div>

<?= $this->endSection() ?>
