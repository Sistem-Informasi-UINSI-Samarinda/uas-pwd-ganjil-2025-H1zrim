<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include '../../config/db.connection.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM produk WHERE id_produk = '$id' ";

    if(mysqli_query($conn, $query)){
        header("location: produk.php");
        exit();
    }else{
        header("location: produk.php");
        exit();
    }


}else{
    header("location: produk.php");
        exit();
}
?>