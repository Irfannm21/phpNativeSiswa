<?php
// jalankan init.php (untuk session_start dan autoloader)
require '../../init.php';

// cek apakah user sudah login atau belum
$user = new User();
$user->cekUserSession();

// buat koneksi ke database
$DB = DB::getInstance();

if (!empty($_GET)) {
  // jika terdeteksi form di submit, tampilkan hasil pencarian
  $tabelBarang = $DB->getLike('barang','nama_barang',
                              '%'.Input::get('search')."%");
}
else {
  // jika form tidak di submit, ambil semua isi tabel barang
  $tabelBarang = $DB->select("barang.kode_barang,barang.nama_barang,penjualan.jumlah,penjualan.tanggal_penjualan")->rightJoin('barang','penjualan');
}

// include head
include 'template/header.php';
?>

  <div class="container">
    <div class="row">
      <div class="col-12">

        <!-- Form pencarian -->
        <div class="py-4 d-flex justify-content-end align-items-center">
          <h1 class="h2 mr-auto">
            Data
          </h1>
          <a href="create.php" class="btn btn-primary">Tambah Barang</a>
          <form class="w-25 ml-4" method="get">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="search"
            name="search">
            <div class="input-group-append">
              <input type="submit" class="btn btn-outline-secondary"
              value="Cari">
            </div>
          </div>
          </form>
        </div>

      <!-- Tabel barang -->
      <?php
        // if (!empty($tabelBarang)) :
      ?>
        <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <!-- <th>Harga (Rp.)</th> -->
            <th>Tanggal Terjual</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach ($tabelBarang as $barang) {
            echo "<tr>";
            echo "<th>{$barang->kode_barang}</th>";
            echo "<td>{$barang->nama_barang}</td>";
            echo "<td>{$barang->jumlah}</td>";
            // echo "<td>".number_format($barang->harga_barang, 0, ',', '.').
            "</td>";
            echo "<td>".date('d-m-Y H:i:s', strtotime($barang->tanggal_penjualan)) ?? ''."</td>";
            echo "<td>";
              echo "<a href=\"edit.php?kode_barang={$barang->kode_barang}\"
              class=\"btn btn-info\">Edit</a> ";
              echo "<a href=\"delete.php?kode_barang={$barang->kode_barang}\"
              class=\"btn btn-danger\">Hapus</a>";
            echo "</td>";
            echo "</tr>";
          }
        ?>
        </tbody>
        </table>

      <?php
        // endif;
      ?>

      </div>
    </div>
  </div>

<?php
// include footer
include 'template/footer.php';
?>
