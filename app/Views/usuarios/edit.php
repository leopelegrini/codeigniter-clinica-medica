<?php $this->extend('commons/app'); ?>

<?= $this->section('content') ?>

	<div class="page-title">
        <div class="container ms-auto">
		    <h5>Editar usuário - <?= $usuario['usuario'] ?></h5>
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
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif;?>

            <div class="panel">
                <form action="/usuarios/atualizar" method="post">

                    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

                    <div class="mb-3">
                        <label for="3" class="form-label">Usuário</label>
                        <input type="text" name="usuario" class="form-control" id="usuario" value="<?php echo $usuario['usuario']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" name="senha" class="form-control" id="senha">
                    </div>
                    <div class="mb-3">
                        <label for="confirmar_senha" class="form-label">Confirmar senha</label>
                        <input type="password" name="confirmar_senha" class="form-control" id="confirmar_senha">
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>

        </div>
    </div>

<?= $this->endSection() ?>
