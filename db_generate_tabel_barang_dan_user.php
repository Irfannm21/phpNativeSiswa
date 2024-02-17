<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
    shrink-to-fit=no">
    <title>ILKOOM Inventory</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

  <div class="container" class="py-5">
    <div class="row">
      <div class="col-12 py-4 mx-auto text-center">
        <h3 class="mt-5">Proses Generate Database</h3>
        <hr class="w-50">
        <ul>

<?php
mysqli_report(MYSQLI_REPORT_STRICT);

try {
  $mysqli = new mysqli("localhost", "root", "");

  // Buat database "ilkoom" (jika belum ada)
  $query = "CREATE DATABASE IF NOT EXISTS ilkoom";
  $mysqli->query($query);
  if ($mysqli->error){
    throw new Exception($mysqli->error, $mysqli->errno);
  }
  else {
    echo "<li>Database 'ilkoom' berhasil di buat / sudah tersedia</li>";
  };

  // Pilih database "ilkoom"
  $mysqli->select_db("ilkoom");
  if ($mysqli->error){
    throw new Exception($mysqli->error, $mysqli->errno);
  }
  else {
    echo "<li>Database 'ilkoom' berhasil di pilih</li>";
  };

  // Hapus tabel "barang" (jika ada)
  $query = "DROP TABLE IF EXISTS barang";
  $mysqli->query($query);
  if ($mysqli->error){
    throw new Exception($mysqli->error, $mysqli->errno);
  }

  // Buat tabel "barang"
  $query = "CREATE TABLE barang (
           id_barang INT PRIMARY KEY AUTO_INCREMENT,
           nama_barang VARCHAR(50),
           jumlah_barang INT,
           harga_barang DEC,
           tanggal_update TIMESTAMP
           )";
  $mysqli->query($query);
  if ($mysqli->error){
    throw new Exception($mysqli->error, $mysqli->errno);
  }
  else {
    echo "<li>Tabel 'barang' berhasil di buat</li>";
  };

  // Isi tabel "barang"
  $sekarang = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
  $timestamp = $sekarang->format("Y-m-d H:i:s");

  $query = "INSERT INTO barang
    (nama_barang, jumlah_barang, harga_barang, tanggal_update) VALUES
      ('TV Samsung 43NU7090 4K',5,5399000,'$timestamp'),
      ('Kulkas LG GC-A432HLHU',10,7600000,'$timestamp'),
      ('Laptop ASUS ROG GL503GE',7,16200000,'$timestamp'),
      ('Printer Epson L220',14,2099000,'$timestamp'),
      ('Smartphone Xiaomi Pocophone F1',25,4750000,'$timestamp')
    ;";
  $mysqli->query($query);
  if ($mysqli->error){
    throw new Exception($mysqli->error, $mysqli->errno);
  }
  else {
    echo "<li>Tabel 'barang' berhasil di isi ".$mysqli->affected_rows."
         baris data</li>";
  };

  // Hapus tabel "user" (jika ada)
  $query = "DROP TABLE IF EXISTS user";
  $mysqli->query($query);
  if ($mysqli->error){
    throw new Exception($mysqli->error, $mysqli->errno);
  }

  // Buat tabel "user"
  $query = "CREATE TABLE user (
           username VARCHAR(50) PRIMARY KEY,
           password VARCHAR(255),
           email VARCHAR(100)
           )";
  $mysqli->query($query);
  if ($mysqli->error){
    throw new Exception($mysqli->error, $mysqli->errno);
  }
  else {
    echo "<li>Tabel 'user' berhasil di buat</li>";
  };

  // Isi tabel "user"
  $passwordAdmin = password_hash('rahasia',PASSWORD_DEFAULT);

  $query = "INSERT INTO user
    (username, password, email) VALUES
      ('admin','$passwordAdmin','admin@gmail.com')
    ;";
  $mysqli->query($query);
  if ($mysqli->error){
    throw new Exception($mysqli->error, $mysqli->errno);
  }
  else {
    echo "<li>Tabel 'user' berhasil di isi ".$mysqli->affected_rows."
         baris data</li>";
  };

?>
        </ul>
        <hr class="w-50">
  <p class="lead">Database berhasil dibuat, silahkan <a href="login.php">
  Login</a> dengan username: <code>admin</code>, password: <code>rahasia</code>
  <br>Atau <a href="register_user.php">Register</a> untuk membuat user baru</p>

<?php
}
catch (Exception $e) {
  echo "<p>Koneksi / Query bermasalah: ".$e->getMessage().
       " (".$e->getCode().")</p>";
}
finally {
  if (isset($mysqli)) {
    $mysqli->close();
  }
}
?>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.3.1.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>
