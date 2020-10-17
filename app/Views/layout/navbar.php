<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <?php $level = session()->get('kasta'); ?>
        <?php if ($level == 'admin') { ?>
          <a class="nav-link" href="/dataku">Data</a>
          <!-- <a class="nav-link" href="/dataku/registrasiAdmin">Registrasi Admin</a> -->
        <?php } ?>
        <a class="nav-link" href="/dataku/indexMahasiswa">Bimbingan</a>
        <a class="nav-link" href="/utama">Home</a>
        <a class="nav-link" href="/login/Logout">Logout</a>
      </div>
    </div>
  </div>
</nav>

<?php
// if (session()->get('level') == 'mahasiswa') {
// }

?>