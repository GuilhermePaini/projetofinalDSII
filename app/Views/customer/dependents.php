
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <form id="form_dependents" action="<?php echo base_url('/dependent/create'); ?>" method="post">
                <th scope="col">
                    <input type="hidden" name="titular" value="<?= $customer_id ?>">
                    <input type="text" class="form-control" name="nome" value="" placeholder="Nome" required>
                </th>
                <th scope="col">
                    <select class="form-control" name="parentesco" required>
                        <option value="" disabled selected> Select your option </option>
                        <?php foreach ($parentescos as $parentesco) : ?>
                            <option value="<?= $parentesco['id'] ?>">
                                <?= $parentesco['descricao'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </th>
                <th>
                    <button type="submit" class="btn btn-primary">Add +</button>
                </th>
            </form>
        </tr>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col" colspan="2">Parentesco</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dependents as $dependent) : ?>
            <tr>
                <td><?= $dependent['nome']?></td>
                <td><?= $dependent['descricao']?></td>
                <td>
                <form id="delete_dependent" action="<?php echo base_url('/dependent/delete'); ?>" method="post">
                    <input type="hidden" name="dependent_id" value="<?= $dependent['id'] ?>" />
                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>
                </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>