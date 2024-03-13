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
    include "connection.php";

    $sql_tipe = "SELECT * FROM `tipe_mesin`";
    $result_tipe = mysqli_query($conn, $sql_tipe);

    $sql_status = "SELECT DISTINCT status_kendaraan FROM `kendaraan`";
    $result_status = mysqli_query($conn, $sql_status);

    
    ?>
    <br>
    <div class="container-fluid">
        <div class="container">
            <div class="row mt-10">
                <h1>Tambah Mobil</h1>
                <form method="post" action="proses-mobil.php" enctype="multipart/form-data">
                    <label class="mb-3 ">Merk Mobil</label>
                    <input type="text" name="merk" class="form-control w-100 enter mb-4" placeholder="Merk Mobil" required>

                    <label class="mb-3 ">Warna</label>
                    <input type="text" name="warna" class="form-control w-100 enter mb-4" placeholder="Warna" required>

                    <label class="mb-3 ">Tipe Mesin Mobil</label>
                    <select class="form-select" name="tipe">
                        <option selected>-- Pilih Tipe --</option>
                        <?php foreach ($result_tipe as $tipe): ?>
                        <option value="<?=$tipe['id_tipe']?>"><?=$tipe['tipe_mesin']?></option>
                        <?php endforeach; ?>
                    </select>

                    <label class="mb-3 ">Status</label>
                    <select class="form-select" name="status">
                        <option selected>-- Status --</option>
                        <?php while ($status = mysqli_fetch_assoc($result_status)): ?>
                        <option value="<?=$status['status_kendaraan']?>"><?=$status['status_kendaraan']?></option>
                        <?php endwhile; ?>
                    </select>

                    <label class="mb-3 ">Foto</label>
                    <input type="file" name="foto" class="form-control w-100 enter mb-4" placeholder="Masukan Gambar Mobil">

                    <label class="mb-3 ">Harga Sewa</label>
                    <input type="number" name="harga" class="form-control w-100 enter mb-4" placeholder="Masukan Harga Sewa Perhari">

                    <input type="submit" name="simpan" class="btn btn-warning w-100 enter mb-4" value="Tambah">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
