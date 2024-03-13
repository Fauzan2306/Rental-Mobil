    <?php
    include "connection.php";

    $q = "SELECT * FROM kendaraan
    INNER JOIN tipe_mesin 
    ON tipe_mesin.id_tipe = kendaraan.id_tipe
    ORDER BY id_mobil ASC";
    $q = mysqli_query($conn, $q);
    ?>

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
        include "assets/link.php"
        ?>
        <br>
        <div class="container-fluid">
            <div class="container">
                <div class="row mt-3">
                    <div class="col-12">
                        <h1 class="text-center">Daftar Mobil</h1>
                        <div class="text-end mb-3">
                            <a class="btn btn-warning" href="tambah-mobil.php"><i class="bi bi-car-front"></i> Tambah Mobil</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th scope="col">Id Mobil</th>
                                        <th scope="col">Merk</th>
                                        <th scope="col">Tipe Mesin</th>
                                        <th scope="col">Harga Sewa</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($q as $row) { ?>
                                        <tr>
                                            <td><?= $row['id_mobil']; ?></td>
                                            <td><?= $row['merk']; ?></td>
                                            <td><?= $row['tipe_mesin']; ?></td>
                                            <td><?= $row['harga_sewa']; ?></td>
                                            <td><?= $row['status_kendaraan']; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-primary"><i class="bi bi-info-square"></i> (Detail)</a>
                                                <a href="edit-mobil.php?id=<?= $row['id_mobil'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i> (Edit)</a>
                                                <a href="proses-mobil.php?id=<?= $row['id_mobil'] ?>" onclick="return konfirmasiHapus()" class="btn btn-danger"><i class="bi bi-trash3"></i> (Hapus)</a>
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