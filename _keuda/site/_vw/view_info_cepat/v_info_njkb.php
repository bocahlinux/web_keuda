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
            url     : "<?php echo site_url(); ?>site/Pg_info_cpt/cari_merk",
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
            url     : "<?php echo site_url(); ?>site/Pg_info_cpt/cari_type",
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
            url     : "<?php echo site_url(); ?>site/Pg_info_cpt/cari_thbuat",
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
            url     : "<?php echo base_url(); ?>site/Pg_info_cpt/cari_dt_njkb",
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

<section id="blog" class="container">
    <div class="row">
        <div class="col-sm-12 col-sm-4 center">
            <div class="blog">
                <div class="blog-item">
                    <h3 class="media-heading" style="padding-top: 35px">INFO CEPAT</h3>
                    <p>INFO NILAI JUAL KENDARAAN BERMOTOR</p>
                    
                    <form class="form-horizontal" id="frm_njkb" name="frm_njkb" style="padding-bottom: 35px" >  
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
    </div>
</section>

<center>
    <img id="loading" src="<?php echo base_url(); ?>assets/images/loading.gif" hidden="true"/>
</center>

<div id="view_detail" class="container"></div>


