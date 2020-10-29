<?= $this->extend('/layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="font-weight-light mt-4 text-center">Registrasi Admin</h2>
            <div class="card my-5">
                <div class="card-body">
                    <form action="/dataku/update/<?= $dataCek['id']; ?>" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control mt-2" id="judul" name="judul">
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="nim" class="col-sm-2 col-form-label">Nim</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control mt-3" id="nim" name="nim">
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label for="nim" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <div class="card-text">xxxxx</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="ajukan">Submit</button>
                                <a href="/dataku/indexMahasiswa" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>