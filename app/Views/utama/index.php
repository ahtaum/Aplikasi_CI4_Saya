<?= $this->extend('/layout/template'); ?>

<?= $this->section('konten'); ?>
<div class="container">
  <div class="col">
    <h2 class="mt-3">Utama</h2>
    <div class="card">
      <div class="card-header">Halaman Utama</div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p>Halaman ini hanya untuk web pribadi saya</p>
          <footer class="blockquote-footer">Kemauwan adalah kunci<cite title="Source Title"> Judith Herlambang</cite></footer>
        </blockquote>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
