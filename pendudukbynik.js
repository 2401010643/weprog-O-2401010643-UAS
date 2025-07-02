function caridata() {
    const params = new URLSearchParams(window.location.search);
    const nik = params.get("nik");

    if (!nik) {
        $("#gagal").show().text("Parameter NIK tidak ditemukan.");
        return;
    }

    $.ajax({
        url: "server/pendudukbynik.php",
        type: 'GET',
        dataType: 'json',
        data: { nik: nik },
        success: function(dt) {
            if (dt && !dt.error) {
                $("#txNIK").val(dt.nik);
                $("#txNAMA").val(dt.nama);
                $("#txALAMAT").val(dt.alamat);
                $("#txTGL").val(dt.tanggal_lahir);
                $("#txJK").val(dt.jenis_kelamin);
            } else {
                $("#gagal").show().text("Data tidak ditemukan atau terjadi kesalahan.");
            }
        },
        error: function() {
            $("#gagal").show().text("Gagal mengambil data dari server.");
        }
    });
}
