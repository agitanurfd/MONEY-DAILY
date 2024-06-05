<?php
//include('dbconnected.php');
include('koneksi.php');

session_start();

$tgl_pemasukan = $_POST['tgl_pemasukan'];
$jumlah = $_POST['jumlah'];
$sumber = $_POST['sumber'];
$jumlah1 = $_POST['jumlah1'];
$sumber1 = $_POST['sumber1'];
$jumlah2 = $_POST['jumlah2'];
$sumber2 = $_POST['sumber2'];
$deskripsi = $_POST['deskripsi'];
$id = $_SESSION['id'];
//query update
$query = mysqli_query($koneksi, "INSERT INTO `pemasukan` (`id_pemasukan`, `tgl_pemasukan`, `jumlah`, `id_sumber`, `deskripsi`, `id_user`) VALUES (NULL, '$tgl_pemasukan', '$jumlah', '$sumber', '$deskripsi', '$id'), (NULL, '$tgl_pemasukan', '$jumlah1', '$sumber1', '$deskripsi', '$id'), (NULL, '$tgl_pemasukan', '$jumlah2', '$sumber2', '$deskripsi', '$id')");

if ($query) {
    # credirect ke page index
    header("location:pendapatan.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}

//mysql_close($host);
