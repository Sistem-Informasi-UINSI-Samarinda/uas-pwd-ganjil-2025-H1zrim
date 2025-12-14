<?php
include 'config/db.connection.php';

$username = "admin";
$email = "admin@gmail.com";
$password = password_hash("852741", PASSWORD_DEFAULT);
$nama_lengkap = "Hizbullah";

$query =   "
            INSERT INTO users(username, email, password, nama_lengkap)
            VALUES('$username', '$email', '$password', '$nama_lengkap')
            ";

if (mysqli_query($conn, $query)){
    echo "akunnya udah selesai";
} else{
    echo "gagal bosku", mysqli_error($conn);
}

?>