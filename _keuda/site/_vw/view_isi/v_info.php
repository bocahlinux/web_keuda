<script type="text/javascript">
$(document).ready(function(){
    $("#kd_jenis").change(function()
    {
        $("#kd_merk").val('-PILIH-');
        $("#kd_type").val('-PILIH-');
        $("#th_buat").val('-PILIH-');
        cari_merk();
        $("#kd_merk").prop("disabled",true);
        $("#kd_type").prop("disabled",true);
        $("#th_buat").prop("disabled",true);
    });
    
    function cari_merk(){
        var kd_jenis = $("#kd_jenis").val();
        $.ajax({
            type    : 'POST',
            url     : "<?php echo site_url(); ?>site/Pg_home/cari_merk",
            data    : "kd_jenis="+kd_jenis,
            cache   : false,
            success : function(data)
            {
                $("#kd_merk").html(data);
                $("#kd_merk").prop("disabled",false);
                $("#kd_merk").focus();
            }
        });
    }

    $("#kd_merk").change(function(){
        $("#kd_type").val('-PILIH-');
        $("#th_buat").val('-PILIH-');
        cari_type();
        $("#kd_type").prop("disabled",true);
        $("#th_buat").prop("disabled",true);
    });
    function cari_type(){
        var kd_jenis = $("#kd_jenis").val();
        var kd_merk = $("#kd_merk").val();
        $.ajax({
            type    : 'POST',
            url     : "<?php echo site_url(); ?>site/Pg_home/cari_type",
            data    : "kd_merk="+kd_merk+"&kd_jenis="+kd_jenis,
            cache   : false,
            success : function(data){
                $("#kd_type").html(data);
                $("#kd_type").prop("disabled",false);
                $("#kd_type").focus();
            }
        });
    }

    $("#kd_type").change(function(){
        $("#th_buat").val('-PILIH-');
        cari_thbuat();
        $("#th_buat").prop("disabled",true);
    });
    function cari_thbuat(){
        var kd_jenis = $("#kd_jenis").val();
        var kd_merk = $("#kd_merk").val();
        var kd_type = $("#kd_type").val();
        $.ajax({
            type    : 'POST',
            url     : "<?php echo site_url(); ?>site/Pg_home/cari_thbuat",
            data    : "kd_merk="+kd_merk+"&kd_jenis="+kd_jenis+"&kd_type="+kd_type,
            cache   : false,
            success : function(data){
                $("#th_buat").html(data);
                $("#th_buat").prop("disabled",false);
                $("#th_buat").focus();
            }
        });
    }

    $("#reset").click(function(){
        $("#kd_merk").prop("disabled",true);
        $("#kd_type").prop("disabled",true);
        $("#th_buat").prop("disabled",true);
        $("#kd_jenis").focus();

        $("#view_detail").hide();
    });

    $("#view").click(function()
    {
        $("#view_detail").hide();
        cari_data();
        $('#loading').show();
    });
    
    function cari_data(){
        var kd_jenis = $("#kd_jenis").val();
        var kd_merk = $("#kd_merk").val();
        var kd_type = $("#kd_type").val();
        var th_buat = $("#th_buat").val();
        
        if(!$("#kd_jenis").val()){
            $("#kd_jenis").notify(
                "Jenis Kendaraan Harus dipilih",
                { 
                    elementPosition:"top right",
                    className: "error",
                    hideAnimation: "slideUp",
                    showAnimation: "slideDown",
                });
            $("#kd_jenis").focus();
            return false();
        }
        if(!$("#kd_merk").val()){
            $("#kd_merk").notify(
                "Merek Kendaraan Harus dipilih",
                { 
                    elementPosition:"top right",
                    className: "error",
                    hideAnimation: "slideUp",
                    showAnimation: "slideDown",
                });
            $("#kd_merk").focus();
            return false();
        }
        if(!$("#kd_type").val()){
            $("#kd_type").notify(
                "Type Kendaraan Harus dipilih",
                { 
                    elementPosition:"top right",
                    className: "error",
                    hideAnimation: "slideUp",
                    showAnimation: "slideDown",
                });
            $("#kd_type").focus();
            return false();
        }
        if(!$("#th_buat").val()){
            $("#th_buat").notify(
                "Tahun Buat Kendaraan Harus dipilih",
                { 
                    elementPosition:"top right",
                    className: "error",
                    hideAnimation: "slideUp",
                    showAnimation: "slideDown",
                });
            $("#th_buat").focus();
            return false();
        }

        $.ajax({
            type    : 'POST',
            url     : "<?php echo base_url(); ?>site/Pg_home/cari_dt_njkb",
            data    : "kd_merk="+kd_merk+"&kd_jenis="+kd_jenis+"&kd_type="+kd_type+"&th_buat="+th_buat,
            cache   : false,
            success : function(data){
                $('#loading').hide();
                $("#view_detail").show();
                $("#view_detail").html(data);
                $('#njkb_cuy').modal('show');


            }
        });
    }

    

});
</script>

<!--
<section id="services" style="
    background: -webkit-linear-gradient(top, #00c60e 0%,rgba(255,255,255,0) 100%);
    background: -moz-linear-gradient(top, #00c60e 0%,rgba(255,255,255,0) 100%);
    background: -o-linear-gradient(top, #00c60e 0%,rgba(255,255,255,0) 100%);
    background: linear-gradient(top, #00c60e 0%,rgba(255,255,255,0) 100%);
    ">
-->
<section id="info" style="margin-bottom: -50px">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="center media-heading" style="margin-top: -25px">
                    <b style="color: #cd5200">QUICK INFO </b>
                </h3>
                <p class="center"> 
                    <h3 class="center" style="margin-top: -10px; margin-bottom: 20px"> 
                        <b style="color: #0048ff"><?php echo $jdl_pg;?> </b>
                    </h3>
                </p>
            </div>
        </div>

        <section id="info">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-md-4 col-sm-6">
                        <div class="media">
                            <div class="portfolio-item">
                                <div class="panel panel-info center" style="min-height:390px">
                                    <center>
                                        <i class="fa fa-tachometer icon-md" style="margin-top:10px"> </i>
                                    </center>
                                    <h3 class="media-heading" style="margin-top:10px">PAJAK KENDARAAN</h3>
                                    <p>INFO PAJAK KENDARAAN BERMOTOR</p>

                                    <div class="container">
                                        <div style="margin-top:10px;" >
                                            <div class="panel panel-info">
                                                <br>
                                                <center>
                                                    <form class="form-inline" id="my-form" name="my-form" style="height:100px">
                                                        <div class="form-group">
                                                            <label for="form-field-1">NOPOL</label>
                                                            
                                                            <!-- 
                                                            <input fieldset disabled type="text" class="form-control" name="kh" style="width:46px" id="kh" placeholder="KH">
                                                            -->
                                                            
                                                            <input type="text" class="form-control" id="nopol" name="nopol" style="width:58px"  maxlength="4">
                                                            <input type="text" class="form-control" id="kode" name="kode" style="width:44px"  maxlength="2">
                                                    <h5><i>Masukkan Nomor Polisi Tanpa KH</i></h5>
                                                        </div>
                                                    </form>
                                                </center>
                                            </div>
                                                <button type="button" id="info_pjk" name="info_pjk" class="btn btn-default">SUBMIT</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="media">
                            <div class="panel panel-info center" style="min-height:390px">
                                <center>
                                    <i class="fa fa-laptop icon-md" style="margin-top:10px"></i>
                                <h3 class="media-heading" style="margin-top:5px">NJKB</h3>
                                <p>INFO NILAI JUAL KENDARAAN BERMOTOR</p>
                                </center>
                                
                                <form class="form-horizontal" id="frm_njkb" name="frm_njkb" >  
                                <div class="container">                             
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label for="form-field-1">JENIS</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="kd_jenis" id="kd_jenis" class="form-control" required="">
                                                <option value="" selected="selected">-- PILIH JENIS --</option>
                                                <?php
                                                    echo $njkb_jenis;
                                                 ?>
                                             </select>
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <div class="col-md-3">
                                            <label for="form-field-1">MERK</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="kd_merk" id="kd_merk" class="form-control" disabled="">
                                                <option value="" selected="selected">-- PILIH MERK --</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <div class="col-md-3">
                                            <label for="form-field-1">TYPE</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="kd_type" id="kd_type" class="form-control" disabled="">
                                                <option value="kosong" selected="selected">-- PILIH TYPE --</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <div class="col-md-3">
                                            <label for="form-field-1">TAHUN</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="th_buat" id="th_buat" class="form-control" disabled="">
                                                <option value="" selected="selected">-- PILIH TAHUN --</option>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="button" name="view" id="view" class="btn btn-mini btn-primary">
                                        <i class="fa fa-bars"></i> Lihat Data
                                    </button>
                                    <button type="reset" name="reset" id="reset" class="btn btn-mini btn-danger">
                                        <i class="fa fa-refresh"></i> Reset
                                    </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="media">
                            <div class="portfolio-item">
                                <div class="panel panel-success center" style="height:390px">
                                    <center>
                                        <i class="fa fa-map-marker icon-md" style="margin-top:10px"></i>
                                    </center>
                                    <h3 class="media-heading" style="margin-top:10px">SAMSAT TERDEKAT</h3>
                                    <p>INFO LOKASI SAMSAT TERDEKAT</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</section> 

<center>
    <img id="loading" src="<?php echo base_url(); ?>assets/images/loading.gif" hidden="true"/>
</center>

<div id="view_detail" class="container"></div>

<hr>

