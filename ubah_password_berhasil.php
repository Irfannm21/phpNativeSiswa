<?php
// jalankan init.php (untuk session_start dan autoloader)
require 'init.php';

// include head
include 'template/header.php';
?>

  <!-- LOGIN -->
  <div class="container" class="py-5">
    <div class="row">
      <div class="col-12 py-4 mx-auto">
      <h1 class="h2 text-center">Ubah Password Berhasil!</h1>
      <p class="text-center">Silahkan lanjut ke <a href="tampil_barang.php">tabel barang</a>
      atau <a href="logout.php">logout</a></p>
      </div>
    </div>
  </div>

<?php
// include footer
include 'template/footer.php';
?>