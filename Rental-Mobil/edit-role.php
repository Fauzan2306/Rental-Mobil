<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Mobil</title>
    <?php include "assets/link.php"; ?>
</head>

<body>
    <?php
    include "navbar.php";

    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM `role` WHERE id_role=$id");

    while ($role_data = mysqli_fetch_array($result)) {
        $nama_role = $role_data['nama_role'];
        $id_role = $role_data['id_role'];
    }

    ?>
    <br>
    <div class="container-fluid">
        <div class="container">
            <div class="row mt-10">
            <form method="post" action="proses-role.php">
            <h1>Edit Role</h1>
            <input type="hidden" name="id_role" value="<?= $id_role ?>">
            <br>
            Nama Role
            <br>
            <input type="text" name="nama" class="form-control w-50" value="<?= $nama_role ?>"><br><br>
            <button type="submit" name="ubah" class="btn btn-warning">Ubah</button>
        </form>
            </div>
        </div>
    </div>
</body>

</html>