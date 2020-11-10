<?= $this->extend('/layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
    <div class="row">
        <div class="col">

            <h3 class="font-weight-light my-3">Data Bimbingan</h3>

            <?php $level = [
                'mahasiswa' => session()->get('kasta'),
                'admin' => session()->get('kasta'),
                'dosen' => session()->get('kasta')
            ]; ?>

            <?php if ($level['mahasiswa'] == 'mahasiswa') { ?>

                <table class="table table-dark">
                    <?php if (session()->getFlashdata('pesanJudul')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesanJudul'); ?>
                        </div>
                    <?php endif; ?>

                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">Nim</th>
                            <th scope="col">Nik</th>
                            <th scope="col">IPK</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $datad = session()->get('datad') ?>
                        <?php foreach ($datad as $d) : ?>
                            <tr>
                                <th><?= $d['idmhs']; ?></th>
                                <th><?= $d['mhs']; ?></th>
                                <th><?= $d['nama']; ?></th>
                                <th><?= $d['nim']; ?></th>
                                <th><?= $d['nik']; ?></th>
                                <th><?= $d['ipk']; ?></th>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            <?php } elseif ($level['admin'] == 'admin') { ?>

                <table class="table table-dark">
                    <?php if (session()->getFlashdata('pesanJudul')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesanJudul'); ?>
                        </div>
                    <?php endif; ?>
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">Nim</th>
                            <th scope="col">Nik</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bimbinganMhs as $v) : ?>
                            <tr>
                                <th>
                                    <?= $v['mhs']; ?>
                                </th>
                                <th>
                                    <?= $v['nama']; ?>
                                </th>
                                <th>
                                    <?= $v['nim']; ?>
                                </th>
                                <th>
                                    <?= $v['nik']; ?>
                                </th>
                                <th>
                                    <?= $v['ipk']; ?>
                                </th>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            <?php } else { ?>

                <div class="card text-center">
                    <div class="card-body">
                        <div class="table-responsive-xl">
                            <table class="table table-dark table-hover table-bordered p-5">
                                <?php if (session()->getFlashdata('pesanJudul')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('pesanJudul'); ?>
                                    </div>
                                <?php endif; ?>
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Nama Mahasiswa</th>
                                        <th scope="col">Nim</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">File</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $le = session()->get('dataDosen') ?>
                                    <?php foreach ($le as $k) : ?>
                                        <tr>
                                            <th><?= $k['idmhs']; ?></th>
                                            <th><?= $k['mhs']; ?></th>
                                            <th><?= $k['nim']; ?></th>
                                            <th><?= $k['judul']; ?></th>
                                            <th><?= $k['status']; ?></th>
                                            <th><?= $k['file']; ?></th>
                                            <th><a class="btn btn-danger mb-4">Vertifikasi</a></th>
                                            <th><a class="btn btn-light mb-4">Download</a></th>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <!-- <div class="card">
                    <div class="card-body">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Nim</th>
                                    <th scope="col">Judul</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div> -->

            <?php } ?>

        </div>
    </div>

    <?php if ($level['mahasiswa'] == 'mahasiswa') { ?>
        <div class="row">
            <div class="col-sm-10">
                <div class="card" id="identitasMhs">
                    <div class="card-header text-center">Identitas</div>
                    <div class="card-body">
                        <div class="card-text" style="padding: 10px;">Nilai Seminar Proposal : </div>
                        <div class="card-text" style="padding: 10px;">Nilai Seminar Pra Skripsi : </div>
                        <div class="card-text" style="padding: 10px;">Nilai Seminar Skripsi : </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="card text-center">
                    <div class="card-header">Status</div>
                    <div class="card-body">
                        <div class="card-text">adaadasda</div>
                        <?php foreach ($datad as $j) : ?>
                            <a href="/dataku/pengajuan/<?= $j['idmhs']; ?>" class="btn btn-primary card-link mt-3">Ajukan</a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</div>
<?= $this->endSection(); ?>