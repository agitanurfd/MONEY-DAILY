<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = md5(mysqli_real_escape_string($koneksi, $_POST['password']));

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "select * from user where email='$email' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $sesi = mysqli_query($koneksi, "select * from user where email='$email' and password='$password'");
    $sesi = mysqli_fetch_assoc($sesi); //mengambil data
    $_SESSION['id'] = $sesi['id'];
    $_SESSION['name'] = $sesi['name'];
    $_SESSION['status'] = "login";
    header("location:index.php");
} else {
    header("location:LoginRegister.php?pesan=Email atau Password Salah");
}
