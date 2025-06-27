<?php
include_once("konfigurasi.php");

$sql = "SELECT nik, nama, alamat, tanggal_lahir FROM penduduk;";
$ps = mysqli_query($koneksi, $sql);

$h = [];  // pastikan array diinisialisasi

while ($res = mysqli_fetch_assoc($ps)) {
    $h[] = [
        "nik"       => $res["nik"],
        "nama"      => $res["nama"],
        "alamat"    => $res["alamat"],
        "tanggal_lahir" => $res["tanggal_lahir"]
    ];
}

header("Content-type: application/json");
echo json_encode($h);
?>
