<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../../config/db.connection.php';

$jenisproduk = "SELECT * FROM jenis_produk ORDER BY id_jenis_produk DESC";
$tampiljenisproduk = mysqli_query($conn, $jenisproduk);

?>

<?php include 'meta.php' ?>
<?php include 'header.php' ?>
<head><link rel="stylesheet" href="../../assets/css/admin.css"></head>

<div class="main-content">
    <header>
      <a href="tambah_jenis_produk.php">+ Tambah Jenis Produk</a>
      <a href="produk.php"><- Kembali</a>
    </header>

    <section class="cards">
        <div class="card">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Jenis Produk</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $no = 1;
                while($row = mysqli_fetch_assoc($tampiljenisproduk)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['nama_jenis'] ?></td>
                    <td><?php echo $row['created_at'] ?></td>
                    <td>
                        <a href="editjenisproduk.php?id=<?php echo $row['id_jenis_produk'] ?>">Edit</a> |
                        <a href="hapusjenisproduk.php?id=<?php echo $row['id_jenis_produk'] ?>"
                        onclick = "return confirm('Yakin ingin menghapus jenis produk ini?')">Hapus</a>
                    </td>
                </tr>

                <?php } ?>
            </table>
        </div>
    </section>
  </div>

<?php include 'footer.php' ?>
</html>