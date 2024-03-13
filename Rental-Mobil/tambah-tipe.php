<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Tipe Mesin</title>
    <?php include "assets/link.php"; ?>
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <br>
    <div class="container-fluid">
        <div class="container">
            <div class="row mt-10">
                <form method="post" action="proses-tipe.php">
                    <h1>Tambah Tipe Mesin</h1><br> 
                    Tipe Mesin <br><br>
                    <input type="text" name="nama" class="form-control w-100 enter mb-4" placeholder=" Masukan Nama Role" required>
                    <button type="submit" name="simpan" class="btn btn-warning">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>