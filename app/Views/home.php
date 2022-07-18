<?= $this->extend('/layouts/default') ?>

<?= $this->section('nav-right') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="container d-flex justify-content-center flex-column">
        <div>
            <?= view_cell('\App\Controllers\Customer\CustomerController::index') ?>
        </div>
    </div>
<?= $this->endSection() ?>