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