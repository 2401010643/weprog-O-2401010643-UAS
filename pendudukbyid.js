function caridata(){
    let params = new URLSearchParams(window.location.search);
    let id = params.get("id");

    let urltarget = "server/pendudukbyid.php";
    let dta = `id=${id}`;
    $.ajax({
        url: urltarget,
        type: 'GET',
        dataType: 'json',
        data: dta,
        success: function(dt){
            if(dt.error === '0'){
                $("#txNIK").val(dt["nik"]);
                $("#txNAMA").val(dt["nama"]);
                $("#txTGL").val(dt["tanggal_lahir"]);
                $("#txALAMAT").val(dt["alamat"]);
            } else {
                $("#gagal").show();
            }
        },
        error: function(){
            $("#gagal").show();
        }
    });
}
