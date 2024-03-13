<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Tipe Mesin</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <?php
    include "assets/link.php"
    ?>
</head>

<body>
    <?php
    include "navbar.php";

    $sql = "SELECT * FROM `tipe_mesin` ORDER BY id_tipe ASC";
    $tipe = mysqli_query($conn, $sql);
    ?>
    <br>
    <div class="container-fluid">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                    <h1 class="text-center">Data Tipe Mesin</h1>
                    <div class="text-end mb-3">
                        <a class="btn btn-warning" href="tambah-tipe.php"><i class="bi bi-gear-fill"></i> Tambah Data Tipe Mesin</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID Tipe</th>
                                    <th>Tipe Mesin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($tipe as $row) { ?>
                                    <tr>
                                        <td><?= $row['id_tipe']; ?></td>
                                        <td><?= $row['tipe_mesin']; ?></td>
                                        <td>
                                            <a href="edit-tipe.php?id=<?= $row['id_tipe'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i> (Edit)</a>
                                            <a href="proses-tipe.php?id=<?= $row['id_tipe'] ?>" onclick="return konfirmasiHapus()" class="btn btn-danger"><i class="bi bi-trash"></i> (Hapus)</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap Bundle JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        function konfirmasiHapus() {
            var agree = confirm("Apakah Anda yakin ingin menghapus ini?");
            if (agree) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>