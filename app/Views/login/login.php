<?= $this->extend('/layouts/default') ?>

<?= $this->section('content') ?>
    <div style="max-width: 1080px; margin: auto;">
        <!-- error handling view -->
            <?= $this->include('error_alerts') ?>
        <!--   -->
        <form action="<?php echo base_url('/login'); ?>" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?= $this->endSection() ?>