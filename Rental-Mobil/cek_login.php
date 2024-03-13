<?php
session_start();
include "connection.php";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * 
                                        FROM `user` 
                                        WHERE `username` = '$username'
                                        AND `password` = '$password'");

    $login = mysqli_fetch_array($query);


    if ($login) {
        
        $_SESSION['id_user'] = $login['id_user'];
        $_SESSION['username'] = $login['username'];
        $_SESSION['password'] = $login['password'];
        $_SESSION['id_role'] = $login['id_role'];
        $_SESSION['status_login'] = 'login';

        if ($login['id_role'] == 1) {
            echo "<script>
                alert('Login Berhasil, Anda adalah $username!');
                window.location.href='home-admin.php';
            </script>";
        } elseif ($login['id_role'] == 2) {
            echo "<script>
            alert('Login Berhasil, Anda adalah $username!');
            window.location.href='home-petugas.php';
        </script>";
        } elseif ($login['id_role'] == 3) {
            echo "<script>
                alert('Login Berhasil, Hai, $username!');
                window.location.href='home-user.php';
            </script>";
        } 
    } else {
        echo "<script>
        alert('Login Gagal Username atau Password Salah!!');
        window.location.href='login.php';
    </script>";
    }
}
?>
