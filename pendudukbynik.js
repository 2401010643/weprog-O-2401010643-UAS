function caridata(){
    let a = window.location.search;
    let urla = new URLSearchParams(a);
    let nik = urla.get("nik"); 

    let urltarget = "server/pendudukbynik.php"; 
    let dta = `nik=${encodeURIComponent(nik)}`;
    $.ajax({
        url: urltarget,
        type: 'GET',
        dataType: 'json',
        data: dta,
        success:function(dt){
            $("#txNIK").val(dt["isi"]["nik"]);
            $("#txNAMA").val(dt["isi"]["nama"]);
            $("#txALAMAT").val(dt["isi"]["alamat"]);
            $("#txTGL").val(dt["isi"]["tanggal_lahir"]);
            $("#txJK").val(dt["isi"]["jenis_kelamin"]);
        },
        error:function(){
            $("#gagal").show();
        }
    });
}
