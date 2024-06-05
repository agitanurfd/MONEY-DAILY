<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$mother_name = mysqli_real_escape_string($koneksi, $_POST['mother_name']);
$password = md5(mysqli_real_escape_string($koneksi, $_POST['password']));

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "select * from user where email='$email' and mother_name='$mother_name'");
// mysqli_query untuk menjalankan instruksi ke mysql.

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
//untuk mengetahui beberapa jumlah baris di dalam tabel database

if ($cek > 0) {
    $sesi = mysqli_query($koneksi, "UPDATE `user` SET `password` = '$password' where email='$email'");
    header("location:LoginRegister.php?pesan=Berhasil Ganti Password");
} else {
    header("location:ForgotPassword.php?pesan=Email atau Mother Name salah");
}
