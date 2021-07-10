<?php $this->extend('commons/app'); ?>

<?= $this->section('content') ?>

	<div class="page-title">
        <div class="container ms-auto">
		    <h5>Cadastrar usuário</h5>
        </div>
    </div>

    <div class="app-stage">
        <div class="container ms-auto">

            <div class="mb-3">
                <a href="/usuarios" class="link-secondary link-return">
                    Voltar
                </a>
            </div>

            <?php if(isset($validation)):?>
                <div class="alert alert-danger">Verifique as informações preenchidas.</div>
            <?php endif;?>

            <div class="panel">
                <form action="/usuarios/salvar" method="post">
                    <div class="form-row">
                        <div class="col-lg-4">

                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuário</label>
                                <input type="text" name="usuario" class="form-control" id="usuario" value="<?= set_value('usuario') ?>">
                                <?php if(isset($validation) && $validation->getError('usuario')){
                                    echo('<div class="text-invalid">'. $validation->getError('usuario') .'</div>');
                                } ?>
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" name="senha" class="form-control" id="senha">
                                <?php if(isset($validation) && $validation->getError('senha')){
                                    echo('<div class="text-invalid">'. $validation->getError('senha') .'</div>');
                                } ?>
                            </div>
                            <div class="mb-3">
                                <label for="confirmar_senha" class="form-label">Confirmar senha</label>
                                <input type="password" name="confirmar_senha" class="form-control" id="confirmar_senha">
                                <?php if(isset($validation) && $validation->getError('confirmar_senha')){
                                    echo('<div class="text-invalid">'. $validation->getError('confirmar_senha') .'</div>');
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
