<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
    shrink-to-fit=no">
    <title>Stock Inventory</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

  <!-- NAVBAR -->
  <nav id="main-navbar" class="navbar navbar-expand-md navbar-dark bg-dark py-0">
    <div class="container">
      <span class="navbar-brand">
        Hello, <?php echo $_SESSION["username"]; ?>
      </span>
      <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link p-3 <?php echo basename($_SERVER['PHP_SELF']) 
            == "index.php" ? "active" : ""; ?>" href="index.php">
            Data Barang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link p-3 <?php echo basename($_SERVER['PHP_SELF']) 
            == "index.php" ? "active" : ""; ?>" href="index_penjualan.php">
            Data Penjualan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link p-3 <?php echo basename($_SERVER['PHP_SELF']) 
            == "profile.php" ? "active" : ""; ?>" href="profile.php">
            My Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link p-3" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
