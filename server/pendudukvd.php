<?php
global $koneksi;
include_once("konfigurasi.php");

$sql = "SELECT 
            nik, 
            nama, 
            alamat, 
            tanggal_lahir, 
            jenis_kelamin
        FROM penduduk;";

$ps = mysqli_query($koneksi, $sql);
$h = [];

while ($res = mysqli_fetch_assoc($ps)) {
    $h[] = array(
        'nik'           => $res["nik"],
        'nama'          => $res["nama"],
        'alamat'        => $res["alamat"],
        'tanggal_lahir' => $res["tanggal_lahir"],
        'jenis_kelamin' => $res["jenis_kelamin"],
    );
}

header("Content-type: application/json");
echo json_encode($h);
