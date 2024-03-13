<!DOCTYPE html>
<html lang="en">

<?php
include "connection.php";
session_start();
?>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

   <!-- Custom CSS -->
   <style>
      .navbar {
         background-color: #192A51;
         color: white;
      }

      .navbar-brand {
         font-weight: bold;
      }

      .nav-link {
         color: white !important;
         transition: all 0.3s ease;
      }

      .nav-link.active {
         font-weight: bold;
      }

      .navbar-toggler-icon {
         background-color: white;
      }

      .dropdown-menu {
         background-color: #192A51;
         border: none;
         border-radius: 0;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
         transition: all 0.3s ease;
      }

      .dropdown-menu a.dropdown-item {
         color: white !important;
         transition: all 0.3s ease;
      }

      .dropdown-menu a.dropdown-item:hover {
         background-color: #233A6C;
         color: yellow !important;
      }

      .dropdown-toggle::after {
         display: none;
      }

      .dropdown-menu {
         opacity: 0;
         transform: translateY(-10px);
         display: block !important;
         transition: opacity 0.3s, transform 0.3s;
      }

      .dropdown-menu.show {
         opacity: 1;
         transform: translateY(0);
      }

      .nav-item.dropdown:hover .dropdown-menu {
         opacity: 1;
         transform: translateY(0);
      }
   </style>
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
         <a class="navbar-brand" href="#top">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
            </svg>
            RentKuY
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

               <!-- HOME -->
               <?php if ($_SESSION['id_role'] == 1) { ?>
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="home-admin.php">Home</a>
                  </li>
               <?php } elseif ($_SESSION['id_role'] == 2) { ?>
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="home-petugas.php">Home</a>
                  </li>
               <?php } elseif ($_SESSION['id_role'] == 3) { ?>
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="home-user.php">Home</a>
                  </li>
               <?php } ?>
               <!-- END -->

               <!-- FITUR -->
               <?php if ($_SESSION['id_role'] == 1) { ?>
                  <li class="nav-item">
                     <a class="nav-link" href="master-role.php">Role</a>
                  </li>
               <?php } ?>
               <li class="nav-item">
                  <a class="nav-link" href="master-kendaraan.php">Mobil</a>
               </li>
               <?php if ($_SESSION['id_role'] != 3) { ?>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Pelanggan</a>
                  </li>
               <?php } ?>
               <li class="nav-item">
                  <a class="nav-link" href="master-tipe.php">Mesin</a>
               </li>
               <?php if ($_SESSION['id_role'] == 3) { ?>
                  <li class="nav-item">
                     <a class="nav-link" href="Daftar-Kendaraan.php">Daftar Mobil</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Sewa</a>
                  </li>
               <?php } ?>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Lainnya
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink"> <!-- Add dropdown-menu-end class here -->
                     <?php if ($_SESSION['id_role'] != 3) { ?>
                        <li><a class="dropdown-item" href="#">Laporan Kerusakan</a></li>
                     <?php } ?>
                     <li><a class="dropdown-item" href="#">Denda</a></li>
                  </ul>
               </li>
            </ul>
            <div class="d-flex">
               <div class="navbar-nav">
                  <div class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['username'] ?>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li><a class="dropdown-item" href="logout.php" onclick="return konfirmasiLogout()">Logout</a></li>
                        <!-- END -->
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </nav>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
   <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    -->
   <script>
      function konfirmasiLogout() {
         return confirm("Apakah Anda yakin ingin Logout?");
      }
   </script>
</body>

</html>