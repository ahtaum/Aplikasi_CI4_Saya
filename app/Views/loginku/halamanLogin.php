<?= $this->extend('/layout/templateLogin'); ?>

<?= $this->section('templateLogin'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card my-5">
                <div class="card-body">
                    <h1 class="text-center">Login</h1>
                    <form action="/login/auth">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus required>
                            <small id="username" class="form-text text-muted">masukan Username Mahasiswa atau Dosen</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="login">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>