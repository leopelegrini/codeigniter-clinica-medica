<?php $this->extend('commons/app'); ?>

<?php $validation = session('validation'); ?>

<?= $this->section('content') ?>

	<div class="page-title">
        <div class="container ms-auto">
		    <h5>Editar paciente - <?php echo $paciente['nome'] ?></h5>
        </div>
    </div>

    <div class="app-stage">
        <div class="container ms-auto">

            <div class="mb-3">
                <a href="/pacientes" class="link-secondary link-return">
                    Voltar
                </a>
            </div>

            <?php if(isset($validation)):?>
                <div class="alert alert-danger">Verifique as informações preenchidas.</div>
            <?php endif;?>

            <div class="panel">
                <form action="/pacientes/<?php echo $paciente['id'] ?>/atualizar" method="post">

                    <input type="hidden" name="id" value="<?php echo $paciente['id'] ?>">

                    <div class="form-row">
                        <div class="col-lg-4">

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome" value="<?= set_value('nome', $paciente['nome']) ?>">
                                <?php if(isset($validation) && $validation->getError('nome')){
                                    echo('<div class="text-invalid">'. $validation->getError('nome') .'</div>');
                                } ?>
                            </div>
                            <div class="mb-3">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" name="cpf" class="form-control js-input-cpf" id="cpf" value="<?= set_value('cpf', $paciente['cpf']) ?>">
                                <?php if(isset($validation) && $validation->getError('cpf')){
                                    echo('<div class="text-invalid">'. $validation->getError('cpf') .'</div>');
                                } ?>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="text" name="email" class="form-control" id="email" value="<?= set_value('email', $paciente['email']) ?>">
                                <?php if(isset($validation) && $validation->getError('email')){
                                    echo('<div class="text-invalid">'. $validation->getError('email') .'</div>');
                                } ?>
                            </div>
                            <div class="mb-3">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" name="telefone" class="form-control" id="telefone" value="<?= set_value('telefone', $paciente['telefone']) ?>">
                                <?php if(isset($validation) && $validation->getError('telefone')){
                                    echo('<div class="text-invalid">'. $validation->getError('telefone') .'</div>');
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
