<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../../config/db.connection.php';

if(isset($_GET['id'])){
    $id_jenis_produk = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM jenis_produk WHERE id_jenis_produk = '$id_jenis_produk'");
    $data = mysqli_fetch_assoc($result);
} else {
    echo "<script>
    alert('ID Kategori tidak ditemukan'); 
    window.location.href='jenis_produk.php';
    </script>";
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
            <input type="text" name="nama_jenis" value="<?php echo $data['nama_jenis'] ?>">
            <br>
            <br>
            <button type="submit" name="simpan">Simpan</button>
        </form>
     
    </section>
  </div>
<?php 

if(isset($_POST['simpan'])){
    $nama_jenis = $_POST['nama_jenis'];

    $query = "
            UPDATE jenis_produk 
            SET nama_jenis = '$nama_jenis'
            WHERE id_jenis_produk = '$id_jenis_produk'
            ";

    if(mysqli_query($conn, $query)){
        header("Location: jenis_produk.php");
        exit();
    }
    else{
        echo "Gagal menambahkan data: ". mysqli_error($conn);
    }
}
?>

<?php include 'footer.php' ?>
</html>