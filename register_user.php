<?php
// jalankan init.php (untuk autoloader)
require 'init.php';

// buat object user yang akan dipakai untuk proses input
$user = new User();

if (!empty($_POST)) {
  // jika terdeteksi form $_POST di submit, jalankan proses validasi
  $pesanError = $user->validasiInsert($_POST);
  if (empty($pesanError)) {
    // jika tidak ada error, proses insert user
    $user->insert();
    header('Location:register_berhasil.php');
  }
}
?>
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

  <div class="container">
    <div class="row">
      <div class="col-12 col-md-8 col-lg-6 py-4">
      <h1 class="h2 mr-auto"><a class="text-info" href="register_user.php">
        Register User</a></h1>

      <?php
        // jika ada error, tampilkan pesan error
        if (!empty($pesanError)):
      ?>

      <div id="divPesanError">
        <div class="mx-auto">
          <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
            <?php
             foreach ($pesanError as $pesan) {
               echo "<li>$pesan</li>";
             }
            ?>
            </ul>
          </div>
        </div>
      </div>

      <?php
        endif;
      ?>

      <!-- Form untuk proses insert -->
      <form method="post">

        <div class="form-group">
          <label for="username">Username</label>
          <small> (minimal 4 karakter angka atau huruf) </small>
          <input type="text" class="form-control" name="username"
          value="<?php echo $user->getItem('username'); ?>">
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <small> (minimal 6 karakter, harus terdapat angka dan huruf) </small>
          <input type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
          <label for="ulangi_password">Ulangi Password</label>
          <input type="password" class="form-control" name="ulangi_password">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" name="email"
          value="<?php echo $user->getItem('email'); ?>">
        </div>
        <input type="submit" class="btn btn-primary" value="Daftar">
        <a href="login.php" class="btn btn-danger">Batal</a>

      </form>

      </div>
    </div>
  </div>

<?php
// include footer
include 'template/footer.php';
?>
