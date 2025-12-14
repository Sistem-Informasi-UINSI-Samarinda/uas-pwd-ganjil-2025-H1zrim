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
    <h1>Layanan Pelanggan (Langkah 2/2)</h1>
    <div id="infoPelanggan">
        <!-- Informasi pelanggan akan ditampilkan di sini --> 
         <?php
         include 'includes/db.connection.php';
         $data_user = mysqli_query($conn, "SELECT * FROM user_layanan ORDER BY id_user DESC LIMIT 1");
            $user = mysqli_fetch_array($data_user);
            echo "<p><strong>Nama:</strong> " . $user['nama'] . "</p>";
            echo "<p><strong>Email:</strong> " . $user['email'] . "</p>";
         ?>
    </div>

    <form id="formService1" method="POST" action="">
        <label for="keluhan">Deskripsikan Keluhan Anda:</label>
            <textarea name="keluhan" required></textarea>

            <label for="saran">Berikan Saran (Opsional):</label>
            <textarea name="saran"></textarea>

            <label for="kritik">Berikan Kritik (Opsional):</label>
            <textarea name="kritik"></textarea>
            
            <button type="submit" name="submit">Kirim Layanan</button>
    </form>
   </div>
    <?php
    include 'config/db.connection.php';
    if (isset($_POST['submit'])) {
        // Ambil data dari form
        $id_user = $user['id_user'];
        $keluhan = $_POST['keluhan'];
        $saran = $_POST['saran'];
        $kritik = $_POST['kritik'];
        $created_at = date("Y-m-d H:i:s");

        // Proses penyimpanan data ke database atau pengiriman email bisa dilakukan di sini
        $query = "INSERT INTO lyn (id_user, keluhan, saran, kritik, created_at) VALUES ('$id_user', '$keluhan', '$saran', '$kritik', '$created_at')";
        // Redirect ke halaman berikutnya atau tampilkan pesan sukses
        if(mysqli_query($conn, $query)){
            echo "Layanan berhasil dikirim.";
            header('Location: index.php');
        exit();
        } else {
            echo "Mohon Diulang Kembali". mysqli_error($conn);
        }
        
    }
    ?>
</body>

<?php include 'includes/footer.php'; ?>