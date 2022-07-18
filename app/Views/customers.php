
<?php if (!empty($customers) && is_array($customers)) : ?>
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
                    <td>
                        <a href="<?= base_url('/customer/details/' . $customer['id'])?>" target="_blank" class="text-decoration-none">
                            <span class="material-symbols-outlined">
                                edit
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