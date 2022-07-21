<!-- error handling view -->
    <?= $this->include('error_alerts') ?>
<!--   -->
<div class="d-flex justify-content-between">
    <span class="fs-3">Lista de clientes</span>
    <a href="<?= base_url('/customer/create')?>" class="btn btn-success">
        Add Customer +
    </a>
</div>
<hr>
<table class="table table-striped table-hover">
    <thead>
        <tr class="fs-4">
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
                        <span class="material-symbols-outlined text-muted">
                            edit
                        </span>
                    </a>
                    <form onsubmit="event.preventDefault(); return;" id="delete_customer_<?=$customer['id']?>" action="<?php echo base_url('/customer/delete'); ?>" method="post">
                        <input type="hidden" name="customer_id" value="<?= $customer['id'] ?>" />
                    </form>
                    <a onclick="deleteCustomer('delete_customer_<?=$customer['id']?>')" type="button" class="me-3">
                        <span class="material-symbols-outlined text-muted">
                            delete
                        </span>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    function deleteCustomer(form) {
        if(confirm('Are you sure you want to delete this customer and its dependents?')) {
            document.getElementById(form).submit();
        }
        return false;
    }
</script>