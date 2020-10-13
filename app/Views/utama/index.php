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
          <?php //$level = session()->get('tolol') 
          ?>
          <?php //foreach ($level as $i) : 
          ?>
          <!-- <p>Halo : <?//= $level[0]; ?></p> -->
          <?php //endforeach; 
          ?>

          <?php echo $kasta = session()->get('kasta')[1]; ?>
          <!-- <p>Haloo : <?//= $kasta[0]; ?></p> -->

          <ul class="list-group list-group-flush my-3">
            <li class="list-group-item">bug : blom tambahin update di dosen</li>
            <li class="list-group-item">belom ada Pembatasan session untuk akun mahasiswa dan dosen permasalahanya session 'level' tidak tertangkap</li>
            <li class="list-group-item">bug : tidak bisa menampilkan level user</li>
            <li class="list-group-item">bug : blom ada fitur validasi di update dosen dan mahasiswa</li>
            <li class="list-group-item">bug : blom ada fitur validasi di Login</li>
          </ul>
          <footer class="blockquote-footer">Kemauwan adalah kunci<cite title="Source Title"> Judith Herlambang</cite></footer>
        </blockquote>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>