<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include '../../config/db.connection.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM jenis_produk WHERE id_jenis_produk = '$id' ";

    if(mysqli_query($conn, $query)){
        header("location: jenis_produk.php");
        exit();
    }else{
        header("location: jenis_produk.php");
        exit();
    }


}else{
    header("location: jenis_produk.php");
        exit();
}
?>