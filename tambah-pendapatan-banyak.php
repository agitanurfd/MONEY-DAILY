<?php
// include('dbconnected.php');
include('koneksi.php');

session_start();

$tgl_pemasukan3 = $_POST['tgl_pemasukan3'];
$jumlah3 = $_POST['jumlah3'];
$sumber3 = $_POST['sumber3'];
$deskripsi3 = $_POST['deskripsi3'];
$id = $_SESSION['id'];


$query1 = mysqli_query($koneksi, "INSERT INTO `pemasukan` (`id_pemasukan`, `tgl_pemasukan`, `jumlah`, `id_sumber`, `deskripsi`, `id_user`) VALUES (NULL, '$tgl_pemasukan3', '$jumlah3', '$sumber3', '$deskripsi3', '$id')");

//query update

if ($query1) {
    header("location:pendapatan.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}

//mysql_close($host);
