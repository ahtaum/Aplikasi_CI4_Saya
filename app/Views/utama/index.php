<?= $this->extend('/layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
  <div class="col">
    <h2 class="mt-3">Utama</h2>
    <div class="card">
      <div class="card-header">Halaman Utama</div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p>Selamat Datang : <?= session()->get('nama') ?></p>
          <?php $level = session()->get('kasta') ?>
          <?= $level; ?>

          <ul class="list-group list-group-flush my-3">
            <li class="list-group-item">bug : blom ada fitur validasi di update dosen dan mahasiswa</li>
            <li class="list-group-item">bug : blom ada fitur validasi di Login</li>
            <li class="list-group-item">bug : blom ada penanganan exception</li>
            <li class="list-group-item">bug : 2 user yang sama bisa login dalam satu waktu</li>
            <li class="list-group-item text-danger">bug Penting !!! : Masih ada bug karena Session, maka solusinya sesuaikan session nya pada tiap-tiap fitur dan halaman</li>
          </ul>
          <footer class="blockquote-footer">bertekadlah untuk tidak mengharapkan apa yang dimiliki orang lain.<cite title="Source Title"> Muhammad SAW, di dalam kutipan hadis Imam Ahmad.</cite></footer>
        </blockquote>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>