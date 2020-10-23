<?= $this->extend('/layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h5 class="card-title mt-3">Data Mahasiswa</h5>
            <div class="card" style="width: 30rem;" class="my-3">
                <div class="card-body">
                    <?php try { ?>
                        <h6 class="card-subtitle mb-2 text-muted">Nama : <?= $tampildetail['nama']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted">Nim : <?= $tampildetail['nim']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted">Ipk : <?= $tampildetail['ipk']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted">Jenis Kelamin : <?= $tampildetail['jk']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted">Judul Skripsi</h6>
                        <a href="/dataku" class="card-link btn btn-primary">Kembali</a>
                        <a href="/dataku/ubah/<?= $tampildetail['id']; ?>" class="card-link btn btn-success">Update</a>
                    <?php } catch (Exception $e) {
                        echo 'Message: ' . $e->getMessage();
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>