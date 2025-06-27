<?php
include_once("konfigurasi.php");

$hsl = ["error" => 1];

if (
    isset($_POST["txNIK"]) &&
    isset($_POST["txNAMA"]) &&
    isset($_POST["txALAMAT"]) &&
    isset($_POST["txTGL"])
) {
    $NIK = mysqli_real_escape_string($koneksi, $_POST["txNIK"]);
    $NAMA = mysqli_real_escape_string($koneksi, $_POST["txNAMA"]);
    $ALAMAT = mysqli_real_escape_string($koneksi, $_POST["txALAMAT"]);
    $TGL = mysqli_real_escape_string($koneksi, $_POST["txTGL"]);

    $sql = "INSERT INTO penduduk (nik, nama, alamat, tanggal_lahir) 
            VALUES ('$NIK', '$NAMA', '$ALAMAT', '$TGL');";

    $hsl["sql"] = $sql;

    $hasil = mysqli_query($koneksi, $sql);
    $hsl["affectedrows"] = mysqli_affected_rows($koneksi);

    if ($hasil) {
        $hsl["error"] = 0;
    }
}

header("Content-type: application/json; charset=utf-8");
echo json_encode($hsl);
?>
