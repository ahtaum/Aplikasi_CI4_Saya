<?= $this->extend('/layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="font-weight-light my-3">Data Bimbingan</h3>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">Nama Dosen</th>
                        <th scope="col">Nim</th>
                        <th scope="col">Nik</th>
                        <th scope="col">IPK</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bimbinganMhs as $v) : ?>
                        <tr>
                            <th><?= $v['mhs']; ?></th>
                            <th><?= $v['nama']; ?></th>
                            <th><?= $v['nim']; ?></th>
                            <th><?= $v['nik']; ?></th>
                            <th><?= $v['ipk']; ?></th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>