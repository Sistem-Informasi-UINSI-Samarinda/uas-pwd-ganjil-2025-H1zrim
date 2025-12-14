<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../../config/db.connection.php';
$ambilproduk = "SELECT produk.*, jenis_produk.nama_jenis FROM produk
                LEFT JOIN jenis_produk ON produk.id_jenis_produk = jenis_produk.id_jenis_produk
                ORDER BY produk.id_produk ASC";
$produk = mysqli_query($conn, $ambilproduk);                
?>

<?php include 'meta.php' ?>
<?php include 'header.php' ?>
<head><link rel="stylesheet" href="../../assets/css/admin.css"></head>

<div class="main-content">
    <header>
      <a href="jenis_produk.php">List Jenis Produk</a>
      <a href="tambahproduk.php">+ Tambah Produk</a>
    </header>

    <section class="cards">
      <div class="card">
        <table>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jenis Produk</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Action</th>
          </tr>
          <?php 
          $no = 1;
          if(mysqli_num_rows($produk) > 0){
            while($row = mysqli_fetch_assoc($produk)){
          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama_produk'] ?></td>
            <td><?= $row['nama_jenis'] ?></td>
            <td><?= $row['desksingkat'] ?><br></td>
            <td>
              <img src="../../uploads/<?= $row['foto_produk']; ?>" alt="" width="80">
            </td>
            <td><a href="editproduk.php?id=<?php echo $row['id_produk'] ?>">Edit</a> |
                        <a href="hapusproduk.php?id=<?php echo $row['id_produk'] ?>"
                        onclick = "return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                      </td>
          </tr>
          <?php
            }
          } ?>
        </table>
      </div>
    </section>
  </div>

<?php include 'footer.php' ?>
</html>