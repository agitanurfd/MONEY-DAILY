<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$name = mysqli_real_escape_string($koneksi, $_POST['name']); //$_POST memanggil data yang telah diinputkan agar bisa ditampilkan di file action.
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = md5(mysqli_real_escape_string($koneksi, $_POST['password']));
$mother_name = mysqli_real_escape_string($koneksi, $_POST['mother_name']);

// Check email di db
$data = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if (mysqli_num_rows($data) == 0) {
    mysqli_query($koneksi, "INSERT INTO user (name, email, password, mother_name) VALUES('$name', '$email', '$password', '$mother_name')");
    header("location:LoginRegister.php");
} else {
    header("location:LoginRegister.php?pesan=Email Sudah Terdaftar");
}
