<?php
include_once("konfigurasi.php");
$dta["error"] = '1';

if (isset($_POST["txNIK"])) {
    $dta["error"] = '2';

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
            WHERE nik = '$nik';";

    $hasil = mysqli_query($koneksi, $sql);
    $jAfrow = mysqli_affected_rows($koneksi);

    if ($jAfrow > 0) {
        $dta["error"] = '0';
    }

    mysqli_close($koneksi);
}

header("Content-type: application/json");
echo json_encode($dta);
?>
