<?php
include_once("konfigurasi.php");

$response = ["error" => 1];

if (
    isset($_POST["txNIK"]) &&
    isset($_POST["txNAMA"]) &&
    isset($_POST["txALAMAT"]) &&
    isset($_POST["txTGL"]) &&
    isset($_POST["txJK"])
) {
    $nik           = mysqli_real_escape_string($koneksi, $_POST["txNIK"]);
    $nama          = mysqli_real_escape_string($koneksi, $_POST["txNAMA"]);
    $alamat        = mysqli_real_escape_string($koneksi, $_POST["txALAMAT"]);
    $tgl_lahir     = mysqli_real_escape_string($koneksi, $_POST["txTGL"]);
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST["txJK"]);

    $sql = "INSERT INTO penduduk (nik, nama, alamat, tanggal_lahir, jenis_kelamin)
            VALUES ('$nik', '$nama', '$alamat', '$tgl_lahir', '$jenis_kelamin')";

    $response["sql"] = $sql;

    if (mysqli_query($koneksi, $sql)) {
        $response["error"] = 0;
        $response["affectedrows"] = mysqli_affected_rows($koneksi);
    } else {
        $response["error_msg"] = mysqli_error($koneksi);
    }
}

header("Content-Type: application/json; charset=utf-8");
echo json_encode($response);
exit;
