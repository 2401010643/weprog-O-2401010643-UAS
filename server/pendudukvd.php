<?php
include_once("konfigurasi.php");

$sql = "SELECT 
            nik, 
            nama, 
            alamat, 
            tanggal_lahir, 
            jenis_kelamin
        FROM penduduk";

$result = mysqli_query($koneksi, $sql);

$data = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [
            'nik'           => $row['nik'],
            'nama'          => $row['nama'],
            'alamat'        => $row['alamat'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'jenis_kelamin' => $row['jenis_kelamin'],
        ];
    }
} else {
    $data = ['error' => mysqli_error($koneksi)];
}

header("Content-Type: application/json; charset=utf-8");
echo json_encode($data);
exit;
