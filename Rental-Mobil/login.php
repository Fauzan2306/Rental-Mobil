<?php
include "connection.php";
if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
  if ($_SESSION['id_role'] == 1) {
    echo "<script>window.location.href='home-admin.php'</script>";
  } elseif ($_SESSION['id_role'] == 2) {
    echo "<script>window.location.href='home-manager.php'</script>";
  } elseif ($_SESSION['id_role'] == 3) {
    echo "<script>window.location.href='home-user.php'</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style_login.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <div class="wrapper">
    <form action="cek_login.php" method="post">
      <h1>Login</h1>
      <div class="">
        <?php
        if (isset($_GET['pesan'])) {
          if ($_GET['pesan'] == 'gagal') {
            echo "<div class='alert alert-danger text-center' role='alert'>
                 Username atau Password Salah
              </div>";
          } elseif ($_GET['pesan'] == 'logout') {
            echo "<div class='alert alert-info text-center' role='alert'>
              Anda Telah Berhasil Logout
             </div>";
          } else {
            echo "<div class='alert alert-info text-center' role='alert'>
              Anda Harus Login Terlebih Dahulu
             </div>";
          }
        }
        ?>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Username" name="username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" name="password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>
      <input type="submit" class="btn" name="login" value="Login">
      <div class="register-link">
        <p>Belum Memiliki Akun? <a href="registrasi.php">Registrasi Disini</a></p>
      </div>
    </form>
  </div>
</body>

</html>