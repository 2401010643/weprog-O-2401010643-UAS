<?php
include_once("konfigurasi.php");

$dta = ["error" => '1'];

if (isset($_GET["nik"])) {
    $nik = mysqli_real_escape_string($koneksi, $_GET["nik"]); // aman dari SQL injection
    $sql = "SELECT * FROM penduduk WHERE nik='$nik';";
    $hasil = mysqli_query($koneksi, $sql);

    if ($hasil && mysqli_num_rows($hasil) > 0) {
        $h = mysqli_fetch_assoc($hasil);
        $dta = [
            "nik"           => $h["nik"],
            "nama"          => $h["nama"],
            "alamat"        => $h["alamat"],
            "tanggal_lahir" => $h["tanggal_lahir"],
            "jenis_kelamin" => $h["jenis_kelamin"],
            "error"         => '0'
        ];
    } else {
        $dta["error"] = '2'; // data tidak ditemukan
    }

    mysqli_close($koneksi);
}

header("Content-type: application/json");
echo json_encode($dta);
?>
