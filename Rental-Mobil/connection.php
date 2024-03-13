<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "rental";

$conn = new mysqli($host, $username, $password, $database);

if($conn->connect_error){
   // echo"koneksi gagal";
}
else{

   //echo"koneksi berhasil";
}


?>