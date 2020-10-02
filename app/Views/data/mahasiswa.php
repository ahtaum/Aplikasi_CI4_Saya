<?= $this->extend('/layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
    <div class="row">
        <div class=" col">
            <div class="card my-5">
                <div class="card-body">
                    <h2 class="font-weight-light my-3">Tambah Data Mahasiswa</h2>
                    <form action="/dataku/simpan" method="POST" class="container">
                        <?= csrf_field(); ?>
                        <input type="hidden" class="<?= old('id'); ?>">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validasi->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validasi->getError('nama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nim" class="col-sm-2 col-form-label">Nim</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control <?= ($validasi->hasError('nim')) ? 'is-invalid' : ''; ?>" id="nim" name="nim" value="<?= old('nim'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validasi->getError('nim'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ipk" class="col-sm-2 col-form-label">Ipk</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control <?= ($validasi->hasError('ipk')) ? 'is-invalid' : ''; ?>" id="ipk" name="ipk" value="<?= old('ipk'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validasi->getError('ipk'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="jk">
                                <option>laki-laki</option>
                                <option>perempuan</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="mahasiswa">Tambah</button>
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