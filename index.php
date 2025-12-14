<?php

include 'includes/meta.php';
include 'includes/header.php';
include 'config/db.connection.php';

$ambilproduk = "SELECT produk.*, jenis_produk.nama_jenis FROM produk
                LEFT JOIN jenis_produk ON produk.id_jenis_produk = jenis_produk.id_jenis_produk
                ORDER BY produk.id_produk ASC";
$produk = mysqli_query($conn, $ambilproduk);
?>

<head>
    <link rel="stylesheet" href="assets/css/visitor_style.css">
</head>
<body>
  <div class="banner">
      <img src="https://picsum.photos/1200/250" alt="Foto utama">
   </div>
   <div class="container">
      <div class="kolom">
         <h1><strong>Cafe it</strong></h1>
         <h2>Waktumu Paling Berharga</h2>
      </div>
   </div>
   <div class="foto-container" id="fotoSlider">
      <?php 
      if(mysqli_num_rows($produk) > 0){
        while($row = mysqli_fetch_assoc($produk)){
      ?>
          <div class="foto">
              <img src="uploads/<?= $row['foto_produk']; ?>" alt="<?= $row['nama_produk']; ?>">
              <div class="text-overlay">
                  <h2><?= $row['nama_produk']?></h2>
                  <p><?= $row['desksingkat']; ?></p>
              </div>
          </div>
      <?php
        }
      } ?>
   </div>
   <script src="assets/js/visitor_page.js"></script>
</body>
<?php
mysqli_close($conn);
include 'includes/footer.php';
?>