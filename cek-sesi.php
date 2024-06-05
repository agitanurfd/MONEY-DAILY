	<!-- cek apakah sudah login -->
	<?php
	session_start(); //session_start() berfungsi untuk mengeksekusi session (functions.php) pada server kemudian menyimpannya pada browser. Session untuk menyimpan informasi user untuk digunakan di beberapa halaman.
	require 'koneksi.php';
	if ($_SESSION['status'] != "login") { //untuk menyimpan data kedalam server yang bisa digunakan diberbagai halaman dan sifatnya sementara.  
		header("location:LoginRegister.php?pesan=belum login");
	}
	?>