<?php
// jalankan init.php (untuk autoloader)
require 'init.php';

// buat object user yang akan dipakai untuk proses login
$user = new User();

if (!empty($_POST)) {
  // jika terdeteksi form $_POST di submit, jalankan proses validasi
  $pesanError = $user->validasiLogin($_POST);
  if (empty($pesanError)) {
    // jika tidak ada error, proses login user
    $user->login();
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
    <div class="container pt-5">

    <?php
    if (!empty($pesanError)) :
    ?>

    <div class="row">
      <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto">
        <div class="alert alert-danger" role="alert">
          <ul class="mb-0">
          <?php
            foreach ($pesanError as $val) {
              echo "<li>$val</li>";
            }
          ?>
          </ul>
        </div>
      </div>
    </div>

    <?php
    endif;
    ?>

    <div class="row">
      <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto">
        <div class="card">
          <div class="card-header">
            <h4>Account Login</h4>
          </div>
          <div class="card-body">
            <form method="post" autocomplete="off" >
              <div class="form-group">
                <label for="username">Username</label>
                <input type="username" class="form-control" name="username"
                value="<?php echo $user->getItem('username'); ?>"  >
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
              </div>
              <input type="submit" class="btn btn-info btn-block"
              value="Login">
            </form>
            <p class="mt-2 text-center">
              <small class="text-center">Belum terdaftar? Silahkan
                <a href="register_user.php">register</a> terlebih dahulu
              </small>
            </p>
          </div>
        </div>
      </div>

    </div>
    </div>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
