<?php
include "navbar.php";
if (isset($_SESSION['username'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Beranda</title>

    </head>

    <body>
        <br><br><br><br><br>
        <div class="container-fluid">
            <div class="container">
                <div class="row mt-10">
                </div>
            </div>
        </div>

        tes

    </body>

    </html>
<?php
} else {
    header("Location: logout.php");
}
?>