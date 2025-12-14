<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../../config/db.connection.php';

$jenis_produk = mysqli_query($conn, "SELECT * FROM jenis_produk");
?>

<?php include 'meta.php' ?>
<?php include 'header.php' ?>
<head><link rel="stylesheet" href="../../assets/css/admin.css"></head>

<section class="card">
        <div class="cards">
            <form action="tambahproduk.php" method="POST" enctype="multipart/form-data">
                <label for="">Nama Produk</label><br>
                <input type="text" name="nama_produk" placeholder="Silakan beri Nama Produk" required>
                <br><br>

                <label for="">Jenis Poduk</label><br>
                <select name="id_jenis_produk" id="" required>
                    <?php while($row = mysqli_fetch_assoc($jenis_produk)) {  ?>
                        <option value="<?= $row['id_jenis_produk']; ?>"><?= $row['nama_jenis'] ?></option>
                    <?php } ?>
                </select> <br> <br>

                <label for="">Deskripsi Singkat</label> <br>
                <textarea name="desksingkat" cols="50" rows="1" id=""></textarea> <br>

                <label for="">Foto Produk</label> <br>
                <input type="file" name="foto_produk" required>

                <br><br>
                <button type="submit" name="simpan">Simpan</button>

            </form>
        </div>
     
    </section>
  </div>
<?php 
if(isset($_POST['simpan'])){
    // data dari form html
    $id_jenis_produk = $_POST['id_jenis_produk'];
    $nama_produk = $_POST['nama_produk'];
    $desksingkat = $_POST['desksingkat'];

    // upload foto
    $foto = $_FILES['foto_produk']['name'];
    $tmp = $_FILES['foto_produk']['tmp_name'];
    $folder = "../../uploads/";

    $foto_produk = uniqid() . "_" . $foto; //agar nama unik dan tidak redundan

    if($_FILES['foto_produk']['error'] !== UPLOAD_ERR_OK){
        echo "Error Upload File: ".$_FILES['foto_produk']['error'];
    }
    move_uploaded_file($tmp, $folder . $foto_produk);

    // Query simpan ke database 
    $query = "INSERT INTO produk(id_jenis_produk, nama_produk, desksingkat, foto_produk, tgl_produk)
    VALUES ('$id_jenis_produk', '$nama_produk', '$desksingkat','$foto_produk', NOW())";

    if(mysqli_query($conn, $query)){
        echo "<script>
                alert('Produk Berhasil diunggah!');
                window.location.href='produk.php'
              </script>";
    }
    else{
        "<script>
                alert('Gagal!');
                window.location.href='produk.php'
        </script>";
    }
}
?>

<?php include 'footer.php' ?>
</html>