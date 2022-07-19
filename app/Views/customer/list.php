
<?php if (!empty($customers) && is_array($customers)) : ?>
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
    <div class="d-flex justify-content-between">
        <h3>Lista de clientes</h3>
        <a href="<?= base_url('/customer/create')?>" class="btn btn-success">
            Add Customer +
        </a>
    </div>
    <hr>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Plano</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer) : ?>
                <tr>
                    <td><?= $customer['nome']?></td>
                    <td><?= $plans[$customer['tipo_plano'] - 1]['tipo_plano'] ?></td>
                    <td class="d-flex flex-row justify-content-end">
                        <a href="<?= base_url('/customer/details/' . $customer['id'])?>" target="_blank" class="text-decoration-none me-3">
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                        </a>
                        <form onsubmit="event.preventDefault(); return;" id="delete_customer_<?=$customer['id']?>" action="<?php echo base_url('/customer/delete'); ?>" method="post">
                            <input type="hidden" name="customer_id" value="<?= $customer['id'] ?>" />
                        </form>
                        <a onclick="deleteCustomer('delete_customer_<?=$customer['id']?>')" type="button" class="me-3">
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <h3>No Customers</h3>
<?php endif ?>

<script>
    function deleteCustomer(form) {
        if(confirm('Are you sure you want to delete this customer and its dependents?')) {
            document.getElementById(form).submit();
        }
        return false;
    }
</script>