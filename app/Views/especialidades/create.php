<?php $this->extend('commons/app'); ?>

<?php $validation = session('validation'); ?>

<?= $this->section('content') ?>

	<div class="page-title">
        <div class="container ms-auto">
		    <h5>Cadastrar especialidade</h5>
        </div>
    </div>

    <div class="app-stage">
        <div class="container ms-auto">

            <div class="mb-3">
                <a href="/especialidades" class="link-secondary link-return">
                    Voltar
                </a>
            </div>

            <?php if(isset($validation)):?>
                <div class="alert alert-danger">Verifique as informações preenchidas.</div>
            <?php endif;?>

            <div class="panel">
                <form action="/especialidades/salvar" method="post">
                    <div class="form-row">
                        <div class="col-lg-4">

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome" value="<?= set_value('nome') ?>">
                                <?php if(isset($validation) && $validation->getError('nome')){
                                    echo('<div class="text-invalid">'. $validation->getError('nome') .'</div>');
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
