<div class="right_col" role="">

    <div class="" style="margin-top: 80px">
        <div class="col-md-6">
            <div class="tile-stats" style="padding: 15px 0 20px 10px">
                <h3>Cetak Laporan</h3>
                <br>    

                <form class="form-horizontal" action="" method="POST">
                    <div class="from-group" style="margin-top: 10px;">
                        <label for="from_date" class="control-label col-md-4">Dari Tanggal</label>
                        <div class="col-md-5" style="margin-bottom: 20px">
                            <input type="date" class="form-control" id="from_date" name="from_date" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="to_date" class="control-label col-md-4">Sampai Tanggal</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" id="to_date" name="to_date" required>
                        </div>
                    </div>
<!--                     
                    <div class="form-group">
                        <div class="col-sm-4" style="float: right;">
                            <br><br>
                            &emsp;&emsp;&emsp;&emsp;&emsp;
                            <button class="btn btn-success" name="submit" type="submit" style="margin-right: 5px;">
                                <i class="fa fa-save"></i> Save</button>

                            <a href="<?php echo base_url(); ?>admin/listStudent" class="btn btn-danger" name="reset" type="reset">
                                <i class="fa fa-times"></i> Back</a>
                        </div>
                    </div> -->
                    <!-- <div class="form-group"> -->
                        <!-- <div style="float: right;"> -->
                    <button type="submit" class="btn btn-success" style="float:right; margin-right: 138px; margin-top: 30px;" target="_blank">Create Report</button>
                    <!-- </div> -->
                    <!-- </div> -->
                </div>
                </form>

            </div>
        </div>
    </div>
</div>


