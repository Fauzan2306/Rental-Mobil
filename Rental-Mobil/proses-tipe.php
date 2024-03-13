<?php
include 'connection.php';

if (isset($_POST['simpan'])) {


    $nama = $_POST['nama'];
    $sql = "INSERT INTO `tipe_mesin` VALUES (NULL, '$nama');";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "
		<script>
				alert('Data Berhasil di simpan');
				window.location.href='master-tipe.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Gagal di Simpan');
			window.location.href='master-tipe.php';
		</script>";
    }
} elseif (isset($_POST['ubah'])) {

    $id_tipe = $_POST['id_mesin'];
    $nama = $_POST['nama'];
    $result = mysqli_query($conn, "UPDATE `tipe_mesin` SET `tipe_mesin` = '$nama' WHERE `id_tipe` = $id_tipe");

    if ($result) {
        echo "
		<script>
				alert('Data Berhasil diubah');
				window.location.href='master-tipe.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Gagal diubah');
			window.location.href='master-tipe.php';
		</script>";
    }
} else {
    
    $id = $_GET['id'];
    $sql = "DELETE FROM `tipe_mesin` WHERE id_tipe=$id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
		<script>
				alert('Data Berhasil di Hapus');
				window.location.href='master-tipe.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Data Gagal di Hapus');
			window.location.href='master-tipe.php';
		</script>";
    }
}
