<?= $this->extend('/layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h5 class="card-title mt-3">Data Dosen</h5>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Nama : <?= $tampildetaildosen['nama']; ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted">Nik : <?= $tampildetaildosen['nik']; ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted">Bidang Keahlian : <?= $tampildetaildosen['bidangkeahlian']; ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted">Jenis Kelamin : <?= $tampildetaildosen['jk']; ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted">Judul Skripsi</h6>
                    <a href="/dataku" class="card-link btn btn-primary">Kembali</a>
                    <form action="/dataku/ubah/<?= $tampildetaildosen['id']; ?>" method="post" class="d-inline">
                        <button class="btn btn-success" type="submit" name="ubahDosen">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>