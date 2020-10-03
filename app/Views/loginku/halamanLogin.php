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
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-light" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" autofocus required>
                            <small id="nama" class="form-text text-muted">masukan nama Mahasiswa atau Dosen</small>
                        </div>
                        <div class="form-group">
                            <label for="nim">Nim</label>
                            <input type="password" class="form-control" id="nim" name="nim" placeholder="nim" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="login">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>