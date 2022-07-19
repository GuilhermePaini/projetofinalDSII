<?= $this->extend('/layouts/default') ?>

<?= $this->section('nav-right') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="container d-flex justify-content-center flex-column">
        <h3>Cliente</h3>
        <form id="update_customer" action="<?php echo base_url('/customer/update'); ?>" method="post">
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
                <input type="hidden" name="id" class="form-control" value="<?= $customer['id'] ?>">
                <div class="mb-3 col-md-6 col-sm-12">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" value="<?= $customer['nome'] ?>">
                </div>
                <div class="mb-3 col-md-6 col-sm-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="<?= $customer['email'] ?>">
                </div>
                <div class="mb-3 col-md-3 col-sm-6">
                    <label for="data_nascimento" class="form-label">Data de nascimento</label>
                    <input type="text" class="form-control" name="data_nascimento" value="<?= $customer['data_nascimento'] ?>">
                </div>
                <div class="mb-3 col-md-3 col-sm-6">
                    <label for="local_nascimento" class="form-label">Naturalidade</label>
                    <input type="text" class="form-control" name="local_nascimento" value="<?= $customer['local_nascimento'] ?>">
                </div>
                <div class="mb-3 col-md-6 col-sm-12">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" name="endereco" value="<?= $customer['endereco'] ?>">
                </div>
                <div class="mb-3 col-md-3 col-sm-6">
                    <label for="empresa" class="form-label">Empresa</label>
                    <input type="text" class="form-control" name="empresa" value="<?= $customer['empresa'] ?>">
                </div>
                <div class="mb-3 col-md-3 col-sm-6">
                    <label class="form-label" for="sexo">Gênero</label>
                    <select class="form-control" name="sexo">
                        <option value="Male" <?php echo $customer['sexo'] == 'Male' ? 'selected' : '' ?> >Male</option>
                        <option value="Female" <?php echo $customer['sexo'] == 'Female' ? 'selected' : '' ?> >Female</option>
                        <option value="Non-binary" <?php echo $customer['sexo'] == 'Non-binary' ? 'selected' : '' ?> >Non-binary</option>
                        <option value="undefined" <?php echo $customer['sexo'] == 'undefined' ? 'selected' : '' ?> >I'd rather not inform</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6 col-sm-12">
                    <label class="form-label" for="tipo_plano">Plano</label>
                    <select class="form-control" name="tipo_plano">
                        <option value="1" <?php echo $plan['tipo_plano'] == 1 ? 'selected' : '' ?> >Bronze</option>
                        <option value="2" <?php echo $plan['tipo_plano'] == 2 ? 'selected' : '' ?> >Silver</option>
                        <option value="3" <?php echo $plan['tipo_plano'] == 3 ? 'selected' : '' ?> >Golden</option>
                    </select>
                </div>
            </div>
        </form>
        <form onsubmit="event.preventDefault(); return;" id="delete_customer" action="<?php echo base_url('/customer/delete'); ?>" method="post">
            <input type="hidden" name="customer_id" value="<?= $customer['id'] ?>" />
        </form>
        <div class="d-flex justify-content-start">
            <button onclick="submitEdit()" type="button" class="btn btn-success me-2">Save</button>
            <button onclick="deleteCustomer()" type="button" class="btn btn-danger">Delete Customer</button>
        </div>
        </div>
        
        <hr>
        <h3>Dependentes</h3>
        <?= view_cell('\App\Controllers\Customer\CustomerController::render_dependents', 'customer_id=' . $customer['id']) ?>
    </div>
    <script>
        function deleteCustomer() {
            if(confirm('Are you sure you want to delete this customer and its dependents?')) {
                document.getElementById('delete_customer').submit();
            }
            return false;
        }

        function submitEdit() {
            if(confirm('Are you sure you want to update this customer?')) {
                document.getElementById('update_customer').submit();
            }
            return false;
        }
    </script>
<?= $this->endSection() ?>