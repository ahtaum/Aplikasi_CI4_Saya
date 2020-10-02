<?= $this->extend('/layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card my-5">
                <div class="card-body">
                    <h2 class="font-weight-light my-3">Ubah Data Dosen</h2>
                    <form action="/dataku/update/<?= $datanyaDosen['id']; ?>" method="POST" class="container">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $datanyaDosen['nama']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-2 col-form-label">Nik</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nik" name="nik" value="<?= $datanyaDosen['nik']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bidangkeahlian" class="col-sm-2 col-form-label">Bidang keahlian</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="bidangkeahlian" name="bidangkeahlian" value="<?= $datanyaDosen['bidangkeahlian']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="jk" value="<?= $datanyaDosen['jk']; ?>">
                                <option>laki-laki</option>
                                <option>perempuan</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="dosenUbah">Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>