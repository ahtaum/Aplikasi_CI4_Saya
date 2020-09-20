<?= $this->extend('/layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card my-5">
                <div class="card-body">
                    <h2 class="font-weight-light my-3">Tambah Data Dosen</h2>
                    <form action="/dataku/simpan" method="POST" class="container">
                        <?= csrf_field(); ?>
                        <input type="hidden" class="<?= old('id'); ?>">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validasidua->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validasidua->getError('nama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-2 col-form-label">Nik</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control <?= ($validasidua->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" name="nik" value="<?= old('nik'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validasidua->getError('nik'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bidangkeahlian" class="col-sm-2 col-form-label">Bidang Keahlian</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validasidua->hasError('bidangkeahlian')) ? 'is-invalid' : ''; ?>" id="bidangkeahlian" name="bidangkeahlian" value="<?= old('bidangkeahlian'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validasidua->getError('bidangkeahlian'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="col-sm-2 col-form-label">Example select</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="jk">
                                <option>laki-laki</option>
                                <option>perempuan</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="dosen">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>