<?= $this->extend('/layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card my-5">
                <div class="card-body">
                    <h2 class="font-weight-light my-3">Ubah Data Mahasiswa</h2>
                    <form action="/dataku/update/<?= $datanya['id']; ?>" method="POST" class="container">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $datanya['nama']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nim" class="col-sm-2 col-form-label">Nim</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nim" name="nim" value="<?= $datanya['nim']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ipk" class="col-sm-2 col-form-label">Ipk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ipk" name="ipk" value="<?= $datanya['ipk']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="jk" value="<?= $datanya['jk']; ?>">
                                <option>laki-laki</option>
                                <option>perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="col-sm-2 col-form-label">Pilih Dosen Pembimbing</label>
                            <select class="form-control" id="pilih" name="pilih" value="<?php $dataqu; ?>">
                                <?php foreach ($dataslug as $t) : ?>
                                    <option><?= $t['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="mahasiswaubah">Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>