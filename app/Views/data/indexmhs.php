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
                    <?php $level = session()->get('kasta') ?>
                    <?php if ($level == 'mahasiswa') { ?>
                        <?php $datad = session()->get('datad') ?>
                        <?php foreach ($datad as $d) : ?>
                            <tr>
                                <th><?= $d['mhs']; ?></th>
                                <th><?= $d['nama']; ?></th>
                                <th><?= $d['nim']; ?></th>
                                <th><?= $d['nik']; ?></th>
                                <th><?= $d['ipk']; ?></th>
                            </tr>
                        <?php endforeach; ?>
                    <?php } else { ?>
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
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php if ($level == 'mahasiswa') { ?>
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ajukan Judul</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-header">Status</div>
                    <div class="card-body">
                        <div class="card-text">ad</div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</div>
<?= $this->endSection(); ?>