<?php
define("DBHOST", "localhost");
define("DBUSERNAME", "root");
define("DBPASSWORD", "");
define("DBNAME", "dta_penduduk");  // Ubah dari 'mahasiswa' menjadi 'penduduk'
define("DBPORT", "3306");

global $koneksi;

$koneksi = mysqli_connect(DBHOST, DBUSERNAME, DBPASSWORD, DBNAME, DBPORT)
    or die("Koneksi ke database gagal: " . mysqli_connect_error());
?>
