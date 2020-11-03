<?= $this->extend('/layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="font-weight-light mt-4 text-center">Upload File Skripsi</h2>
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
                        <div class="form-group row">
                            <div class="custom-file my-3 p-1">
                                <div class="col">
                                    <label class="custom-file-label" for="fileskripsi">Choose file</label>
                                    <input type="file" class="custom-file-input" id="fileskripsi" name="file">
                                </div>
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