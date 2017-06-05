<script type="text/javascript">
$(document).ready(function(){
   $("#kode_nopol").keyup(function(e){
        var isi = $(e.target).val();
        $(e.target).val(isi.toUpperCase()); 
    });

    $("#nopol").keypress(function(data){
        if (data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)) {
            return false;
        }
    });
});
</script>

<div class="widget categories box box-danger container">
    <div class="row">
        <div class="panel center">
            <h3 class="media-heading" style="margin-top:10px">PAJAK KENDARAAN</h3>
            <p>INFO PAJAK KENDARAAN BERMOTOR</p>

            <div class="container">
                <div style="margin-top:0px;" >
                    <div class="panel panel-info">
                        <br>
                        <center>
                            <form class="form-inline" id="my-form" name="my-form">
                                <div class="form-group">
                                    <label for="form-field-1">NOPOL</label>
                                    <input type="text" class="form-control" id="nopol" name="nopol" style="width:58px"  maxlength="4">
                                    <input type="text" class="form-control" id="kode_nopol" name="kode_nopol" style="width:44px"  maxlength="2">
                                    
                                    <h5><i>Masukkan Nomor Polisi Tanpa KH</i></h5>
                                </div>
                            </form>
                        </center>
                    </div>
                        <button type="button" id="proses" name="proses" class="btn btn-default">SUBMIT</button>
                </div>
            </div>
        </div>
    </div>
</div>