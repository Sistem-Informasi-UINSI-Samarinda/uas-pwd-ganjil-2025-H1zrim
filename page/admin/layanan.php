<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include '../../config/db.connection.php';
$ambillayanan = "SELECT lyn.*, user_layanan.nama, user_layanan.email, user_layanan.layanan FROM lyn
                LEFT JOIN user_layanan ON lyn.id_user = user_layanan.id_user
                ORDER BY lyn.id_layanan ASC";
$layanan = mysqli_query($conn, $ambillayanan);                
?>

<?php include 'meta.php' ?>
<?php include 'header.php' ?>
<head><link rel="stylesheet" href="../../assets/css/admin.css"></head>

<div class="main-content">
    <section class="cards">
      <div class="card">
        <table>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jenis layanan</th>
            <th>Keluhan</th>
            <th>Saran</th>
            <th>Kritik</th>
            <th>Tanggal Dibuat</th>
            <th>Action</th>
          </tr>
          <?php 
          $no = 1;
          if(mysqli_num_rows($layanan) > 0){
            while($row = mysqli_fetch_assoc($layanan)){
          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['layanan'] ?></td>
            <td><?= $row['keluhan'] ?></td>
            <td><?= $row['saran'] ?></td>
            <td><?= $row['kritik'] ?></td>
            <td><?= $row['created_at'] ?></td>   
            <td>Edit | Hapus</a>
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