<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Pemasukan.xls");
?>
<h3>Data Pemasukan</h3>
<table border="1" cellpadding="5">
	<tr>
		<th>ID Pemasukan</th>
		<th>Tgl Pemasukan</th>
		<th>Jumlah</th>
		<th>ID Sumber</th>
	</tr>
	<?php
	// Load file koneksi.php  
	include "koneksi.php";
	include "cek-sesi.php";
	$id = $_SESSION['id'];

	// Buat query untuk menampilkan semua data siswa 
	$query = mysqli_query($koneksi, "SELECT * FROM pemasukan where id_user = '$id'");
	// Untuk penomoran tabel, di awal set dengan 1 
	while ($data = mysqli_fetch_array($query)) {
		// Ambil semua data dari hasil eksekusi $sql 
		echo "<tr>";
		echo "<td>" . $data['id_pemasukan'] . "</td>";
		echo "<td>" . $data['tgl_pemasukan'] . "</td>";
		echo "<td>" . $data['jumlah'] . "</td>";
		echo "<td>" . $data['id_sumber'] . "</td>";

		echo "</tr>";
	}  ?>
</table>
<br>
<br>

<h3>Sisa Uang</h3>
<table border="1" cellpadding="5">
	<tr>
		<th>Sisa Uang</th>
	</tr>
	<?php
	//SISA UANG

	$arraymasuk = [0];
	$pemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan where id_user = '$id'");
	while ($masuk = mysqli_fetch_array($pemasukan)) {
		array_push($arraymasuk, $masuk['jumlah']);
	}
	$jumlahmasuk = array_sum($arraymasuk);

	$arraykeluar = [0];
	$pengeluaran = mysqli_query($koneksi, "SELECT * FROM pengeluaran where id_user = '$id'");
	while ($keluar = mysqli_fetch_array($pengeluaran)) {
		array_push($arraykeluar, $keluar['jumlah']);
	}
	$jumlahkeluar = array_sum($arraykeluar);

	//SISA UANG
	$uang = $jumlahmasuk - $jumlahkeluar;

	// Buat query untuk menampilkan semua data siswa 

	// Untuk penomoran tabel, di awal set dengan 1 

	// Ambil semua data dari hasil eksekusi $sql 
	echo "<tr>";
	echo "<td>" . $uang . "</td>";
	echo "</tr>";
	?>
</table>

<br>
<br>