<?php

include 'includes/meta.php';
include 'includes/header.php';   

?>

<head>
    <link rel="stylesheet" href="assets/css/visitor_style.css">
    <style>
      body{
         margin: 0;
         padding: 0;
         display: block;
         min-height: 100vh;
         align-items: flex-start;
         justify-content: center;
      }

      .form-container{
         width: 100%;
         max-width: 400px;
         height: auto;
         margin-top: 50px;
         margin-left: auto;
         margin-right: auto;
         margin-bottom: 50px;
         padding: 20px;
         border: 1px solid #000;
         border-radius: 8px;
      }

      label{
         display: block;
         margin-top: 10px;
         font-weight: bold;
      }

      input[type="text"], input[type="email"], select{
         width: 100%;
         padding: 8px;
         margin-top: 5px;
         border: 1px solid #000;
         border-radius: 4px;
         box-sizing: border-box;
      }

      button{
         background-color: #ae9f8c;
         color: black;
         padding: 10px 15px;
         border: none;
         border-radius: 4px;
         cursor: pointer;
         margin-top: 20px;
      }

      button:hover{
         background-color: rgb(16, 119, 85);
      }
   </style>
</head>
<body>
   <div class="form-container">
        <h1>Layanan Pelanggan (Langkah 1/2)</h1>
        <form id="formService" method="POST" action="">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="layanan">Sampaikan Keluhan :</label>
            <select name="layanan" required>
               <option value="layanan kami">Layanan kami</option>
               <option value="produk kopi">Produk Kopi</option>
               <option value="produk pastry">Produk Pastry</option>
               <option value="produk milkshake">Produk Milkshake</option>
            </select>
            
            <button type="submit" name="lanjut">Lanjut ke Deskripsi Keluhan</button>
        </form>
    </div>
    <?php
    include 'config/db.connection.php';
    if (isset($_POST['lanjut'])) {
        // Tangani data formulir di sini
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $layanan = $_POST['layanan'];

        // Simpan data
         $query = "INSERT INTO user_layanan (nama, email, layanan) VALUES ('$nama', '$email', '$layanan')";
         if(mysqli_query($conn, $query)){
            echo "Data layanan berhasil disimpan.";
         } else {
            echo "Gagal menambahkan data". mysqli_error($conn);
         }
        // Redirect ke halaman berikutnya atau tampilkan pesan sukses
        header('Location: service_up.php');
        exit();
    }else
    ?>
</body>

<?php include 'includes/footer.php'; ?>