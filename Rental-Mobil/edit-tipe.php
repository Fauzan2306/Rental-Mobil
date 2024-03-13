<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Tipe</title>
    <?php include "assets/link.php"; ?>
</head>

<body>
    <?php
    include "navbar.php";

    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM `tipe_mesin` WHERE id_tipe=$id");

    while ($role_data = mysqli_fetch_array($result)) {
        $nama_mesin = $role_data['tipe_mesin'];
        $id_mesin = $role_data['id_tipe'];
    }

    ?>
    <br>
    <div class="container-fluid">
        <div class="container">
            <div class="row mt-10">
                <form method="post" action="proses-tipe.php">
                    <h1>Edit Tipe mesin</h1>
                    <input type="hidden" name="id_mesin" value="<?= $id_mesin ?>">
                    <br>
                    Tipe mesin
                    <br>
                    <input type="text" name="nama" class="form-control w-100" value="<?= $nama_mesin ?>"><br><br>
                    <button type="submit" name="ubah" class="btn btn-warning">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>