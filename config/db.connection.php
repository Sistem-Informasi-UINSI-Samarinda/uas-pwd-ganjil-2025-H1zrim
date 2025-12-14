<?php

$servername = "localhost";
$database = "pwd_uas_2441919003";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Koneksi Gagal.". mysqli_connect_error());
}

?>