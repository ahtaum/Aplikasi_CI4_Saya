<?= $this->extend('/layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card my-5 text-white bg-dark font-weight-light">
        <div class="card-body">
          <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-light" role="alert">
              <?= session()->getFlashdata('pesan'); ?>
            </div>
          <?php endif; ?>
          <h2 class="font-weight-light mb-3">Tambah data</h2>
          <h3>Anda adalah : <?= session()->get('nama') ?></h3>
          <p>anda seorang : <?= session()->get('kasta') ?></p>
          <a class="btn btn-light mb-4" data-toggle="modal" data-target="#tambah">Tambah</a>
          <h3 class="font-weight-light mb-3">Data Mahasiswa</h3>
          <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-dark">
                <div class="modal-header">
                  <h5 class="modal-title text-center" id="exampleModalLabel">Tambah Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-footer">
                  <a href="/dataku/tambahMahasiswa" class="btn btn-light">Mahasiswa</a>
                  <a href="/dataku/tambahDosen" class="btn btn-light">Dosen</a>
                  <a class="nav-link btn btn-light" href="/dataku/registrasiAdmin">Registrasi Admin</a>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
              </div>
            </div>
          </div>
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Nim</th>
                <th scope="col">Ipk</th>
                <th scope="col">Jenis kelamin</th>
                <th scope="col">Judul Skripsi</th>
                <th scope="col">Keterangan Buat</th>
                <th scope="col">Keterangan Ubah</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($cumatabel as $x) : ?>
                <tr>
                  <th><?= $i++; ?></th>
                  <td><?= $x['nama']; ?></td>
                  <td><?= $x['nim']; ?></td>
                  <td><?= $x['ipk']; ?></td>
                  <td><?= $x['jk']; ?></td>
                  <td><?= $x['komentar']; ?></td>
                  <td><?= $x['created_at']; ?></td>
                  <td><?= $x['updated_at']; ?></td>
                  <form action="/dataku/hapus/<?= $x['id']; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <td><button type="submit" class="btn btn-danger" onclick="return confirm('Apakah ente yaqin ?')" name="mahasiswahapus">Hapus</button></td>
                  </form>
                  <td><a href="/dataku/detail/<?= $x['id']; ?>" class="btn btn-primary">Detail</a></td>
                </tr>
              <?php endforeach; ?>
          </table>
          <h3 class="font-weight-light my-3">Data Dosen</h3>
          <p>bug : blom tambahin update di dosen</p>
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Nik</th>
                <th scope="col">Bidang Keahlian</th>
                <th scope="col">Jenis kelamin</th>
                <th scope="col">Keterangan Buat</th>
                <th scope="col">Keterangan Ubah</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($cumatabeldua as $z) : ?>
                <tr>
                  <th><?= $i++; ?></th>
                  <td><?= $z['nama']; ?></td>
                  <td><?= $z['nik']; ?></td>
                  <td><?= $z['bidangkeahlian']; ?></td>
                  <td><?= $z['jk']; ?></td>
                  <td><?= $z['created_at']; ?></td>
                  <td><?= $z['updated_at']; ?></td>
                  <form action="/dataku/<?= $z['id']; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <td><button type="submit" class="btn btn-danger" onclick="return confirm('Apakah ente yaqin ?')" name="dosenhapus">Hapus</button></td>
                  </form>
                  <td><a href="/dataku/detailDosen/<?= $z['id']; ?>" class="btn btn-primary">Detail</a></td>
                </tr>
              <?php endforeach; ?>
          </table>
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
              <?php foreach ($gabung as $v) : ?>
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
  </div>
</div>
<?= $this->endSection(); ?>