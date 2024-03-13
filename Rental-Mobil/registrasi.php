<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>registrasi</title>

</head>

<body class="d-flex align-items-center py-4 bg-primary justify-content-center">
    <?php
    include "connection.php";

    $sql = "SELECT * FROM `role`";
    $role = mysqli_query($conn, $sql);
    $fauzanA = mysqli_fetch_all($role);


    ?>
    <div class="container mt-3 position-absolute top-50 start-50 translate-middle">

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center mb-4">Registrasi</h3>
                            <form action="#" method="post">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>


                                <div class="mb-3">
                                    <img src="captcha.php" alt="gambar" style="border-radius:10px;"> <br>

                                    <div class="mb-3">
                                        <div>Konfirmasi Kode : <input name="nilaiCaptcha" type="text" value="" style="border-radius:5px; color:black;" class="form-control" required> </div>
                                    </div>
                                </div>
                                <p class="mt-4">Sudah Mendaftar Akun? <a href="login.php">login disini</a></p>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-100" name="Registrasi">Registrasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>
<?php
if (isset($_POST['Registrasi'])) {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);
    $query = mysqli_query($conn, "INSERT INTO user VALUES (NULL,'$user','$pass','3')");

    if ($query) {
        echo "<script>
        alert('Berhasil Membuat Akun');
        window.location.href='login.php';
    </script>";
    } else {
        echo "<script>
        alert('Gagal Membuat Akun');
        window.location.href='registrasi.php';
    </script>";
    }
}
?>