


        <?php 
        foreach($data->result_array() as $dt){ 
        } ?>

<div id="njkb_cuy" class="modal fade bs-example-modal-sm" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="min-width: 500px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title center">Nilai Jual Kendaraan</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-5 control-label">Jenis</label>
                <div class="col-sm-6">
                    <label class="control-label pull-left">
                        <?php echo $dt['JENIS'];?>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">MERK</label>
                <div class="col-sm-6">
                    <label class="control-label pull-left">
                        <?php echo $dt['MERK'];?>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">TIPE</label>
                <div class="col-sm-6">
                    <label class="control-label pull-left">
                        <?php echo $dt['TIPE'];?>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">TAHUN BUAT</label>
                <div class="col-sm-6">
                    <label class="control-label pull-left">
                        <?php echo $dt['TH_BUAT'];?>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">NILAI JUAL</label>
                <div class="col-sm-6">
                    <label class="control-label pull-left">
                        <?php echo "Rp. ". number_format($dt['NILAI_JUAL'],0,',','.');;?>
                    </label>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>