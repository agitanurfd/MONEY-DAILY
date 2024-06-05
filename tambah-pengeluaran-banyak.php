<?php
//include('dbconnected.php');
include('koneksi.php');

session_start();

$tgl_pengeluaran3 = $_POST['tgl_pengeluaran3'];
$jumlah3 = $_POST['jumlah3'];
$sumber3 = $_POST['sumber3'];
$deskripsi3 = $_POST['deskripsi3'];
$id = $_SESSION['id'];
//query update

$arraymasuk = [0];
$pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE id_user = '$id'");
while ($masuk = mysqli_fetch_array($pemasukan)) {
    array_push($arraymasuk, $masuk['jumlah']);
}
$jumlahmasuk = array_sum($arraymasuk);

$arraykeluar = [0];
$pengeluaran = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE id_user = '$id'");
while ($keluar = mysqli_fetch_array($pengeluaran)) {
    array_push($arraykeluar, $keluar['jumlah']);
}
$jumlahkeluar = array_sum($arraykeluar);
$keluar = $jumlahkeluar + $jumlah3;

if ($keluar <= $jumlahmasuk) {

    $query1 = mysqli_query($koneksi, "INSERT INTO `pengeluaran` (`id_pengeluaran`, `tgl_pengeluaran`, `jumlah`, `id_sumber`, `deskripsi`, `id_user`) VALUES (NULL, '$tgl_pengeluaran3', '$jumlah3', '$sumber3', '$deskripsi3', '$id')");
    if ($query1) {
        # credirect ke page index
        header("location:pengeluaran.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
} else {
    header("location:pengeluaran_banyak.php?pesan=saldo anda  tidak cukup");
}


//mysql_close($host);
