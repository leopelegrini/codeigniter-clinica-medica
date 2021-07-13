<?php $this->extend('commons/app'); ?>

<?php $validation = session('validation'); ?>

<?= $this->section('content') ?>

	<div class="page-title">
        <div class="container ms-auto">
		    <h5>Editar médico - <?php echo $medico['nome'] ?></h5>
        </div>
    </div>

    <div class="app-stage">
        <div class="container ms-auto">

            <div class="mb-3">
                <a href="/medicos" class="link-secondary link-return">
                    Voltar
                </a>
            </div>

            <?php if(isset($validation)):?>
                <div class="alert alert-danger">Verifique as informações preenchidas.</div>
            <?php endif;?>

            <div class="panel">
                <form action="/medicos/<?php echo $medico['id'] ?>/atualizar" method="post">

                    <input type="hidden" name="id" value="<?php echo $medico['id'] ?>">

                    <div class="form-row">
                        <div class="col-lg-4">

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome" value="<?= set_value('nome', $medico['nome']) ?>">
                                <?php if(isset($validation) && $validation->getError('nome')){
                                    echo('<div class="text-invalid">'. $validation->getError('nome') .'</div>');
                                } ?>
                            </div>
                            <div class="mb-3">
                                <label for="crm" class="form-label">CRM</label>
                                <input type="text" name="crm" class="form-control" id="crm" value="<?= set_value('crm', $medico['crm']) ?>" maxlength="8">
                                <?php if(isset($validation) && $validation->getError('crm')){
                                    echo('<div class="text-invalid">'. $validation->getError('crm') .'</div>');
                                } ?>
                            </div>
                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" name="telefone" class="form-control" id="telefone" value="<?= set_value('telefone', $medico['telefone']) ?>">
                                <?php if(isset($validation) && $validation->getError('telefone')){
                                    echo('<div class="text-invalid">'. $validation->getError('telefone') .'</div>');
                                } ?>
                            </div>
                            <div class="mb-3">

                                <label for="especialidade_id" class="form-label">Especialidade</label>
                                <select name="especialidade_id" class="form-select" id="especialidade_id">
                                    <option value="">- selecione</option>
                                    <?php foreach ($especialidades as $esp):?>
                                    <option value="<?= $esp['id'] ?>" <?= set_select('especialidade_id', $esp['id'], $esp['id'] == $medico['especialidade_id'] ? true : false) ?>>
                                        <?= $esp['nome'] ?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                                <?php if(isset($validation) && $validation->getError('especialidade_id')){
                                    echo('<div class="text-invalid">'. $validation->getError('especialidade_id') .'</div>');
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
