<?php
include_once("konfigurasi.php");

$response = ["error" => 1];

if (isset($_POST["txNIK"])) {
    $nik           = mysqli_real_escape_string($koneksi, $_POST["txNIK"]);
    $nama          = mysqli_real_escape_string($koneksi, $_POST["txNAMA"]);
    $alamat        = mysqli_real_escape_string($koneksi, $_POST["txALAMAT"]);
    $tgl_lahir     = mysqli_real_escape_string($koneksi, $_POST["txTGL"]);
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST["txJK"]);

    $sql = "UPDATE penduduk SET
                nama = '$nama',
                alamat = '$alamat',
                tanggal_lahir = '$tgl_lahir',
                jenis_kelamin = '$jenis_kelamin'
            WHERE nik = '$nik'";

    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        $affectedRows = mysqli_affected_rows($koneksi);
        if ($affectedRows > 0) {
            $response["error"] = 0;
        } else {
            // Data tidak berubah atau nik tidak ditemukan
            $response["error"] = 1;
            $response["msg"] = "Tidak ada data yang diubah atau NIK tidak ditemukan.";
        }
    } else {
        $response["error"] = 1;
        $response["msg"] = "Error query: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}

header("Content-Type: application/json; charset=utf-8");
echo json_encode($response);
exit;
