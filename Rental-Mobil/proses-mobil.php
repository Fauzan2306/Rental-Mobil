<?php
include 'connection.php';


if (isset($_POST['simpan'])) {
    $merk = $_POST['merk'];
    $warna = $_POST['warna'];
    $tipe = $_POST['tipe'];
    $status = $_POST['status'];
    $harga_sewa = $_POST['harga'];

    $foto = $_FILES['foto']['name'];
    $lokasiGambar = $_FILES['foto']['tmp_name'];

    $sql = "INSERT INTO `kendaraan` (`id_mobil`, `merk`, `warna`, `harga_sewa`, `status_kendaraan`, `foto`, `id_tipe`)
                         VALUES (NULL, '$merk','$warna', '$harga_sewa', '$status', '$foto', '$tipe');";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        move_uploaded_file($lokasiGambar, 'img/' . $gambar);
        echo "
		<script>
				alert('Penambahan Berhasil');
				window.location.href='master-kendaraan.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Penambahan Gagal');
			window.location.href='master-kendaraan.php';
		</script>";
    }
} elseif (isset($_POST['edit'])) {
    $id_mobil = $_POST['id'];
    $merk = $_POST['merk'];
    $warna = $_POST['warna'];
    $tipe = $_POST['tipe'];
    $status = $_POST['status'];
    $harga_sewa = $_POST['harga'];

    $foto = $_FILES['foto']['name'];
    $lokasiGambar = $_FILES['foto']['tmp_name'];

    if ($foto == "") {
        $sql = "UPDATE `kendaraan` 
                SET `merk` = '$merk', 
                `warna` = '$warna', 
                `id_tipe` = '$tipe', 
                `status_kendaraan` = '$status', 
                `harga_sewa` = '$harga_sewa' 
                WHERE `kendaraan`.`id_mobil` = $id_mobil";
        $result = mysqli_query($conn, $sql);
    } else {
            $sql = "UPDATE `kendaraan` 
                    SET `merk` = '$merk', 
                    `warna` = '$warna', 
                    `id_tipe` = '$tipe', 
                    `status_kendaraan` = '$status', 
                    `harga_sewa` = '$harga_sewa' 
                    WHERE `kendaraan`.`id_mobil` = $id_mobil";
            $result = mysqli_query($conn, $sql);
    }


    if ($result) {
        echo "
		<script>
				alert('Data Berhasil diubah');
				window.location.href='master-kendaraan.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Gagal diubah');
			window.location.href='master-kendaraan.php';
		</script>";
    }
    } else {
        $id_mobil = $_GET['id'];
        $sql = "DELETE FROM `kendaraan` WHERE `id_mobil` = $id_mobil";
        $hapus = mysqli_query($conn, $sql);

        if ($hapus) {
            echo "
    		<script>
    				alert('Data Berhasil di Hapus');
    				window.location.href='master-kendaraan.php';
    		</script>";
        } else {
            echo "
    		<script>
    			alert('Data Gagal di Hapus');
    			window.location.href='master-kendaraan.php';
    		</script>";
        }
    }

