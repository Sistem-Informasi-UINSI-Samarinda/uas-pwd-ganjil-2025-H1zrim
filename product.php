<?php

include 'includes/meta.php';
include 'includes/header.php';   
include 'config/db.connection.php';

// Fungsi bantu untuk menjalankan query
function getProductsByType($conn, $type) {
    // Menggunakan JOIN dan WHERE untuk memfilter berdasarkan nama jenis produk
    $sql = "SELECT produk.*, jenis_produk.nama_jenis FROM produk
            LEFT JOIN jenis_produk ON produk.id_jenis_produk = jenis_produk.id_jenis_produk
            WHERE jenis_produk.nama_jenis = '$type' 
            ORDER BY produk.id_produk ASC";
    
    // Periksa apakah query berhasil dijalankan
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        // Tampilkan error jika query gagal (untuk debugging)
        echo "Error fetching $type: " . mysqli_error($conn);
        return false;
    }
    return $result;
}

// Ambil data untuk masing-masing kategori
$coffee_result = getProductsByType($conn, 'Coffee');
$pastry_result = getProductsByType($conn, 'Pastry');
$milkshake_result = getProductsByType($conn, 'Milkshake');
$mocktail_result = getProductsByType($conn, 'Mocktail');

?>

<head><link rel="stylesheet" href="assets/css/visitor_style.css"></head>
<body>
    <div class="banner" id="myBanner">
        <img src="https://picsum.photos/1200/250" alt="Foto utama">
        <div class="text-overlay"><h1>Cafe It<br><p>Nikmati Waktumu dengan Produk Kami</p></h1></div>
    </div>
    
    <?php

    function displayProductSection($title, $result_set) {
        // Cek apakah ada data produk
        if ($result_set && mysqli_num_rows($result_set) > 0) {
            ?>
            <div><h1 style="text-align: center; margin-top: 30px; padding-bottom: 10px; border-bottom: 2px solid #333; display: inline-block; width: 90%; margin-left: 5%;"><?= $title ?></h1></div>
            <div class="foto-container" id="fotoSlider">
                <?php 
                // Loop untuk menampilkan semua produk dalam result set ini
                while($row = mysqli_fetch_assoc($result_set)){ ?>
                    <div class="foto">
                        <img src="uploads/<?= $row['foto_produk']; ?>" alt="<?= $row['nama_produk']; ?>">
                        <div class="text-overlay">
                            <h2><?= $row['nama_produk']?></h2>
                            <p><?= $row['desksingkat']; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php
        } else {
            // Tampilkan pesan jika tidak ada produk
            echo "<div><h1 style='text-align: center; margin-top: 30px;'>$title</h1></div>";
            echo "<p style='text-align: center; color: #888;'>Belum ada produk $title yang tersedia saat ini.</p>";
        }
    }
    ?>

    <?php 
    displayProductSection('Coffee', $coffee_result);

    displayProductSection('Pastry', $pastry_result);

    displayProductSection('Milkshake', $milkshake_result);

    displayProductSection('Mocktail', $mocktail_result);
    ?>

    <script src="assets/js/visitor_page.js"></script>
</body>

<?php 
// Tutup koneksi database setelah semua data diambil
mysqli_close($conn);
include 'includes/footer.php'; 
?>