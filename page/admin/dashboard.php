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
    <header>
      <h1>Selamat Datang, <?php echo $_SESSION['nama_lengkap']; ?>!</h1>
      <p>Anda sedang berada di halaman dashboard utama.</p>
      <!-- <button>☰ Menu</button> -->
    </header>
<body>
    <section class="cards">
      <div class="card">
        <h3>Total Pengunjung</h3>
        <p>120</p>
      </div>
      <div class="card">
        <h3>Total Pesanan</h3>
        <p>45</p>
      </div>
      <div class="card">
        <h3>Total </h3>
        <p>82</p>
      </div>
     
    </section>
  </div>

<?php include 'footer.php' ?>
</html>