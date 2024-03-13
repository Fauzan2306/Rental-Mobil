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
    </body>

    </html>
<?php
} else {
    header("Location: logout.php");
}
?>