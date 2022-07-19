<?= $this->extend('/layouts/default') ?>

<?= $this->section('nav-right') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h3>Cadastro de Cliente</h3>
    <form id="update_customer" action="<?php echo base_url('/customer/create'); ?>" method="post">
        <?= csrf_field() ?>
        <div class="row px-3">
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach (session()->getFlashdata('error') as $error) : ?>
                        <li> <?= $error ?></li>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <span><?= session()->getFlashdata('success') ?></span>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6 col-sm-12">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" value="" required>
            </div>
            <div class="mb-3 col-md-6 col-sm-12">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="" required>
            </div>
            <div class="mb-3 col-md-3 col-sm-6">
                <label for="data_nascimento" class="form-label">Data de nascimento</label>
                <input type="text" class="form-control" name="data_nascimento" value="" required>
            </div>
            <div class="mb-3 col-md-3 col-sm-6">
                <label for="local_nascimento" class="form-label">Naturalidade</label>
                <input type="text" class="form-control" name="local_nascimento" value="" required>
            </div>
            <div class="mb-3 col-md-6 col-sm-12">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" name="endereco" value="" required>
            </div>
            <div class="mb-3 col-md-3 col-sm-6">
                <label for="empresa" class="form-label">Empresa</label>
                <input type="text" class="form-control" name="empresa" value="" required>
            </div>
            <div class="mb-3 col-md-3 col-sm-6">
                <label class="form-label" for="sexo">Gênero</label>
                <select class="form-control" name="sexo" required>
                    <option value="" disabled selected> Select your option </option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Non-binary">Non-binary</option>
                    <option value="undefined">I'd rather not inform</option>
                </select>
            </div>
            <div class="mb-3 col-md-6 col-sm-12">
                <label class="form-label" for="tipo_plano">Plano</label>
                <select class="form-control" name="tipo_plano" required>
                    <option value="" disabled selected> Select your option </option>
                    <option value="1">Bronze</option>
                    <option value="2">Silver</option>
                    <option value="3">Golden</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success me-2">Create</button>
    </form>
<?= $this->endSection() ?>