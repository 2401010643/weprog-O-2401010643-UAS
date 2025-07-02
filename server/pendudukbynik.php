<?php
include_once("konfigurasi.php"); // Pastikan $koneksi sudah didefinisikan

$sql = "SELECT 
            id,
            nik, 
            nama, 
            alamat, 
            tanggal_lahir,
            jenis_kelamin
        FROM penduduk";

$result = mysqli_query($koneksi, $sql);

$h = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $h[] = array(
            'id'            => $row["id"],
            'nik'           => $row["nik"],
            'nama'          => $row["nama"],
            'alamat'        => $row["alamat"],
            'tanggal_lahir' => $row["tanggal_lahir"],
            'jenis_kelamin' => $row["jenis_kelamin"]
        );
    }
} else {
    $h = ["error" => 1];
}

header("Content-Type: application/json");
echo json_encode($h);
exit;  // Pastikan eksekusi berhenti setelah output JSON
?>
