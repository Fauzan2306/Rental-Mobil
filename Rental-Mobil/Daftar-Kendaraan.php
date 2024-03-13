<?php
include "navbar.php";
include "connection.php";

$query = "SELECT id_mobil, merk, foto FROM kendaraan";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        .card {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            /* Add margin between cards */
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: auto;
            display: block;
            max-height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            margin-top: 0;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .card-title:hover {
            color: #ff6b6b;
        }
    </style>
</head>

<body>
    <br><br><br><br>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <div class="col-md-3 col-sm-4 col-6">
                        <div class="card">
                            <a href="detail-mobil.php?id=<?= $row['id_mobil'] ?>" style="text-decoration: none; color:black">
                                <img src="img/<?= $row['foto'] ?>" class="card-img-top" alt="<?= $row['merk'] ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['merk'] ?></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</body>

</html>