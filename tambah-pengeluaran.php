<?php
//include('dbconnected.php');
include('koneksi.php');

session_start();

$tgl_pengeluaran = $_POST['tgl_pengeluaran'];
$jumlah = $_POST['jumlah'];
$sumber = $_POST['sumber'];
$jumlah1 = $_POST['jumlah1'];
$sumber1 = $_POST['sumber1'];
$jumlah2 = $_POST['jumlah2'];
$sumber2 = $_POST['sumber2'];
$deskripsi = $_POST['deskripsi'];
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
$keluar = $jumlahkeluar + $jumlah + $jumlah1 + $jumlah2;

if ($keluar <= $jumlahmasuk) {

    $query = mysqli_query($koneksi, "INSERT INTO `pengeluaran` (`id_pengeluaran`, `tgl_pengeluaran`, `jumlah`, `id_sumber`, `deskripsi`, `id_user`) VALUES (NULL, '$tgl_pengeluaran', '$jumlah', '$sumber', '$deskripsi', '$id'), (NULL, '$tgl_pengeluaran', '$jumlah1', '$sumber1', '$deskripsi', '$id'), (NULL, '$tgl_pengeluaran', '$jumlah2', '$sumber2', '$deskripsi', '$id')");
    if ($query) {
        # credirect ke page index
        header("location:pengeluaran.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
} else {
    header("location:pengeluaran.php?pesan=saldo anda tidak cukup");
}

//mysql_close($host);
