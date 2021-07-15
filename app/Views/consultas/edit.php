<?php $this->extend('commons/app'); ?>

<?php $validation = session('validation'); ?>

<?= $this->section('content') ?>

	<div class="page-title">
		<div class="container ms-auto">
			<h5>Editar consulta</h5>
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
                <form action="/consultas/<?php echo $consulta['id'] ?>/atualizar" method="post">

                    <input type="hidden" name="id" value="<?php echo $consulta['id'] ?>">

					<div class="form-row">
						<div class="col-lg-6">

							<div class="mb-3">
								<label for="paciente_id" class="form-label">Paciente</label>
								<select name="paciente_id" class="form-select" id="paciente_id">
									<option value="">- selecione</option>
									<?php foreach ($pacientes as $p):?>
                                    <option value="<?= $p['id'] ?>" <?= set_select('paciente_id', $p['id'], $p['id'] == $consulta['paciente_id'] ? true : false) ?>>
										<?= $p['nome'] ?>
									</option>
									<?php endforeach;?>
								</select>
								<?php if(isset($validation) && $validation->getError('paciente_id')){
									echo('<div class="text-invalid">'. $validation->getError('paciente_id') .'</div>');
								} ?>
							</div>

							<div class="mb-3">
								<label for="nome" class="form-label">Médico</label>
								<select name="medico_id" class="form-select" id="medico_id">
									<option value="">- selecione</option>
									<?php foreach ($medicos as $m):?>
                                    <option value="<?= $m['id'] ?>" <?= set_select('medico_id', $m['id'], $m['id'] == $consulta['medico_id'] ? true : false) ?>>
										<?= $m['nome'] ?>
									</option>
									<?php endforeach;?>
								</select>
								<?php if(isset($validation) && $validation->getError('medico_id')){
									echo('<div class="text-invalid">'. $validation->getError('medico_id') .'</div>');
								} ?>
							</div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="data" class="form-label">Data</label>
                                        <input type="date" name="data" class="form-control" id="data" value="<?= set_value('data', $consulta['data']) ?>">
                                        <?php if(isset($validation) && $validation->getError('data')){
                                            echo('<div class="text-invalid">'. $validation->getError('data') .'</div>');
                                        } ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="hora" class="form-label">Hora</label>
                                        <input type="time" name="hora" class="form-control js-input-time" id="hora" value="<?= set_value('hora', $consulta['hora']) ?>">
                                        <?php if(isset($validation) && $validation->getError('hora')){
                                            echo('<div class="text-invalid">'. $validation->getError('hora') .'</div>');
                                        } ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="valor" class="form-label">Valor <small class="fst-italic text-muted">(opcional)</small></label>
                                        <input type="text" name="valor" class="form-control js-input-decimal" id="valor" value="<?= set_value('valor', dollarToReal($consulta['valor'])) ?>">
                                        <?php if(isset($validation) && $validation->getError('valor')){
                                            echo('<div class="text-invalid">'. $validation->getError('valor') .'</div>');
                                        } ?>
                                    </div>
                                </div>
                            </div>

							<button type="submit" class="btn btn-primary">Cadastrar</button>

						</div>
					</div>
				</form>
			</div>


		</div>
	</div>

<?= $this->endSection() ?>
