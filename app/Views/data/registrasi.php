<?= $this->extend('/layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
    <div class="row">
        <div class=" col">
            <div class="card my-5">
                <div class="card-body">
                    <h2 class="font-weight-light my-3">Registrasi Admin</h2>
                    <form action="/dataku/simpanRegistrasi" method="POST" class="container">
                        <?= csrf_field(); ?>
                        <input type="hidden" class="<?= old('id'); ?>">
                        <div class="form-group row">
                            <input type="hidden" value="admin" name="adm">
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?//= ($validasi->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>">
                                <div class="invalid-feedback">
                                    <?//= $validasi->getError('nama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nim" class="col-sm-2 col-form-label">Nim</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control <?//= ($validasi->hasError('nim')) ? 'is-invalid' : ''; ?>" id="nim" name="nim" value="<?//= old('nim'); ?>">
                                <div class="invalid-feedback">
                                    <?//= $validasi->getError('nim'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="admin">Tambah</button>
                                <a href="/dataku" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>