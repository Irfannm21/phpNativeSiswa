<?php
// jalankan init.php (untuk session_start dan autoloader)
require '../../init.php';

// cek apakah user sudah login atau belum
$user = new User();
$user->cekUserSession();

// halaman tidak bisa diakses langsung, harus ada query string kode_barang
if(empty(Input::get('kode_barang'))) {
  die ('Maaf halaman ini tidak bisa diakses langsung');
}

//ambil data barang yang akan dihapus
$barang = new Barang();
$barang->generate(Input::get('kode_barang'));

if (!empty($_POST)) {
  // jika terdeteksi form di submit, hapus barang berdasarkan nilai kode_barang
  $barang->delete(Input::get('kode_barang'));
  header('Location:index.php');
}

// include head
include 'template/header.php';
?>

  <div class="container">
    <div class="row">
      <div class="col-6 mx-auto">

      <!-- Modal Untuk Konfirmasi Hapus -->
      <div id="modalHapus">
        <div class="modal-dialog modal-confirm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi</h4>
            </div>
            <div class="modal-body">
              <p> Apakah anda yakin akan menghapus
                <b><?php echo $barang->getItem('nama_barang'); ?>?</b></p>
            </div>
            <div class="modal-footer">
            <a href="index.php" class="btn btn-secondary">Tidak</a>

            <form method="post">
              <input type="hidden" name="kode_barang"
               value="<?php echo $barang->getItem('kode_barang'); ?>">
              <input type="submit" class="btn btn-danger" value="Ya">
            </form>

            </div>
          </div>
        </div>
      </div>

      </div>
    </div>
  </div>

<?php
// include footer
include 'template/footer.php';
?>
