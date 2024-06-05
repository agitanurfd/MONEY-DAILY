<?php
session_start(); //untuk memulai ekseskusi session pada server kemudia menyimpannya di browser.
session_destroy(); //File session akan dihapus dari server, maksudnya adalah maka session akan berakhir dan user diminta untuk login kembali.
header("location:LoginRegister.php");
