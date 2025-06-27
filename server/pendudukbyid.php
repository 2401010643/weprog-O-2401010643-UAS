<?php
include_once("konfigurasi.php");

$dta = ["error" => '1'];

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]); // pastikan id aman
    $sql = "SELECT * FROM penduduk WHERE id=$id;";
    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) > 0) {
        $h = mysqli_fetch_assoc($hasil);
        $dta = [
            "id"             => $h["id"],
            "nik"            => $h["nik"],
            "nama"           => $h["nama"],
            "alamat"         => $h["alamat"],
            "tanggal_lahir"  => $h["tanggal_lahir"],
            "error"          => '0'
        ];
    } else {
        $dta["error"] = '2'; // data tidak ditemukan
    }

    mysqli_close($koneksi);
}

header("Content-type: application/json");
echo json_encode($dta);
?>
