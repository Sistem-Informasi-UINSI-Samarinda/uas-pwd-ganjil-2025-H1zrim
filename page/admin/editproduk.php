<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../../config/db.connection.php';

$jenis_produk = mysqli_query($conn, "SELECT * FROM jenis_produk");

$id_produk = $_GET['id'];
$ambildata = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
$hasil = mysqli_query($conn, $ambildata);
$data = mysqli_fetch_assoc($hasil);
?>

<?php include 'meta.php' ?>
<?php include 'header.php' ?>
<head><link rel="stylesheet" href="../../assets/css/admin.css"></head>

 <div class="card">
    <section class="cards">
        <form action="editproduk.php" method="post" >
            <input type="hidden" name="id_produk" value="<?php echo $data['id_produk'] ?>">
            <label for="">Nama Produk</label>
            <br><br>
            <input type="text" name="nama_produk" value="<?php echo $data['nama_produk'] ?>">
            <br><br>
             <label for="">Jenis Produk</label><br>
                <select name="id_jenis_produk" id="" required>
                    <?php while($row = mysqli_fetch_assoc($jenis_produk)) {  ?>
                        <option value="<?= $row['id_jenis_produk']; ?>"><?= $row['nama_jenis'] ?></option>
                    <?php } ?>
                </select><br><br>
            <label for="">Deskripsi Singkat</label>
            <textarea name="desksingkat" id="" cols="50" rows="1"><?php echo $data['desksingkat']?></textarea>
            <br>
            <label for="">Foto Produk</label>
            <input type="file" name="foto_produk" >
            <br>
            <button type="submit" name="simpan">Simpan</button>
        </form>
    </section>
  </div>
<?php 

if(isset($_POST['simpan'])){
    // data dari form html
    $id_produk_update = $_POST['id_produk'];
    $id_jenis_produk = $_POST['id_jenis_produk'];
    $nama_produk = $_POST['nama_produk'];
    $desksingkat = $_POST['desksingkat'];

    $foto = $_FILES['foto_produk']['name'];
    if($foto) {
        // upload foto
        $tmp = $_FILES['foto_produk']['tmp_name'];
        $folder = "../../uploads/";
    
        $foto_produk = uniqid() . "_" . $foto; //agar nama unik dan tidak redundan
    
        if($_FILES['foto_produk']['error'] !== UPLOAD_ERR_OK){
            echo "Error Upload File: ".$_FILES['foto_produk']['error'];
            exit;
        }
        move_uploaded_file($tmp, $folder . $foto_produk);

        // update data produk dengan foto baru
        $updateproduk = "UPDATE produk SET 
                        id_jenis_produk = '$id_jenis_produk',
                        nama_produk = '$nama_produk',
                        desksingkat = '$desksingkat',
                        foto_produk = '$foto_produk',
                        tgl_produk = NOW()
                        WHERE id_produk = '$id_produk_update'";
    } else {
        // update data produk tanpa mengubah foto
        $updateproduk = "UPDATE produk SET 
                        id_jenis_produk = '$id_jenis_produk',
                        nama_produk = '$nama_produk',
                        desksingkat = '$desksingkat',
                        tgl_produk = NOW()
                        WHERE id_produk = '$id_produk_update'";
    }
    
    if(mysqli_query($conn, $updateproduk,)){
        echo "<script>
        alert('Produk berhasil diupdate'); 
        window.location.href='produk.php';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php include 'footer.php' ?>
</html>