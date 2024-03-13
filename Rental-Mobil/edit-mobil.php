<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mobil</title>
    <?php include "assets/link.php"; ?>
</head>

<body>
    <?php
    include "navbar.php";

    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM kendaraan WHERE id_mobil=$id");
    $data_mobil = mysqli_fetch_assoc($result);
    $merk = $data_mobil['merk'];
    $warna = $data_mobil['warna'];
    $sewa = $data_mobil['harga_sewa'];
    $status = $data_mobil['status_kendaraan'];
    $foto = $data_mobil['foto'];
    $tipe_id = $data_mobil['id_tipe'];

    $sql_tipe = "SELECT * FROM `tipe_mesin`";
    $result_tipe = mysqli_query($conn, $sql_tipe);

    $sql_status = "SELECT DISTINCT status_kendaraan FROM `kendaraan`";
    $result_status = mysqli_query($conn, $sql_status);
    ?>
    <br>
    <div class="container-fluid">
        <div class="container">
            <div class="row mt-10">
                <h1>Edit Mobil</h1>
                <form method="post" action="proses-mobil.php" enctype="multipart/form-data">
                    <label class="mb-3 ">Merk Mobil</label>
                    <input type="text" name="merk" class="form-control w-100 enter mb-4" value="<?= $merk ?>" placeholder="Merk Mobil" required>

                    <label class="mb-3 ">Warna</label>
                    <input type="text" name="warna" class="form-control w-100 enter mb-4" value="<?= $warna ?>" placeholder="Warna" required>

                    <label class="mb-3 ">Tipe Mesin Mobil</label>
                    <select class="form-select" name="tipe">
                        <option selected>-- Pilih Tipe --</option>
                        <?php foreach ($result_tipe as $tipe_row) : ?>
                            <option value="<?= $tipe_row['id_tipe'] ?>" <?= ($tipe_row['id_tipe'] == $tipe_id) ? 'selected' : '' ?>><?= $tipe_row['tipe_mesin'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label class="mb-3 ">Status</label>
                    <select class="form-select" name="status">
                        <option selected disabled>-- Pilih Status --</option>
                        <?php while ($status_row = mysqli_fetch_assoc($result_status)) : ?>
                            <option value="<?= $status_row['status_kendaraan'] ?>" <?= ($status_row['status_kendaraan'] == $status) ? 'selected' : '' ?>><?= $status_row['status_kendaraan'] ?></option>
                        <?php endwhile; ?>
                    </select>

                    <label class="mb-3 ">Foto</label>
                    <input type="file" name="foto" class="form-control w-100 enter mb-4" placeholder="Masukkan Gambar Mobil">

                    <label class="mb-3 ">Harga Sewa</label>
                    <input type="number" name="harga" class="form-control w-100 enter mb-4" value="<?= $sewa ?>" placeholder="Masukkan Harga Sewa Perhari">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="submit" name="edit" class="btn btn-warning w-100 enter mb-4" value="Edit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>