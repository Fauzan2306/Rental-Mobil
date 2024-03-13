<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Mobil</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include "navbar.php";
include "assets/link.php";
    $sql = "SELECT * FROM `role` ORDER BY id_role ASC";
    $role = mysqli_query($conn, $sql);
    ?>
    <br>
    <div class="container-fluid">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                    <h1 class="text-center">Data Role</h1>
                    <div class="text-end mb-3">
                        <a class="btn btn-warning" href="tambah-role.php"><i class="bi bi-person-plus"></i> Tambah Data Role</a>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID Role</th>
                                    <th>Nama Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($role as $row) { ?>
                                    <tr>
                                        <td><?= $row['id_role']; ?></td>
                                        <td><?= $row['nama_role']; ?></td>
                                        <td>
                                            <a href="edit-role.php?id=<?= $row['id_role'] ?>" class="btn btn-success"><i class="bi bi-info-square"></i> (Detail)</a>
                                            <a href="proses-role.php?id=<?= $row['id_role'] ?>" onclick="return konfirmasiHapus()" class="btn btn-danger"><i class="bi bi-trash3"></i> (Hapus)</i></a>
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
