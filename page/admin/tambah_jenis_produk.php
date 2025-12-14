<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include 'meta.php' ?>
<?php include 'header.php' ?>
<head><link rel="stylesheet" href="../../assets/css/admin.css"></head>

<div class="main-content">
    <section class="cards">
        <form action="" method="post">
            <label for="">Nama Jenis Produk</label>
            <br>
            <input type="text" name="nama_jenis" required>
            <br>
            <br>
            <button type="submit" name="simpan">Simpan</button>
        </form>
     
    </section>
  </div>
<?php 
include '../../config/db.connection.php';

if(isset($_POST['simpan'])){
    $nama_jenis = $_POST['nama_jenis'];
    $created_at = date("Y-m-d H:i:s");

    $query = "
            INSERT INTO jenis_produk 
            (nama_jenis, created_at) VALUES
            ('$nama_jenis','$created_at')
            ";

    if(mysqli_query($conn, $query)){
        echo "<script>
                alert('Jenis Produk Telah di unggah');
                window.location.href='jenis_produk.php';
            </script>";
    }
    else{
        echo "Gagal menambahkan data: ". mysqli_error($conn);
    }
}
?>

<?php include 'footer.php' ?>
</html>