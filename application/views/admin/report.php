<div class="right_col" role="">

    <div class="" style="margin-top: 80px">
        <div class="col-md-6">
            <div class="tile-stats" style="padding: 15px 0 20px 10px">
                <h3>Cetak Laporan</h3>
                <br>    

                <form class="form-horizontal" action="<?= base_url(); ?>index.php/admin/report/print" method="POST">
                    <div class="from-group" style="margin-top: 10px;">
                        <label for="from_date" class="control-label col-md-4">Tanggal Mulai Cuti</label>
                        <div class="col-md-5" style="margin-bottom: 20px">
                            <input type="date" class="form-control" id="from_date" name="from_date" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="to_date" class="control-label col-md-4">Tanggal Akhir Cuti</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" id="to_date" name="to_date" required>
                        </div>
                    </div>

                    <button type="submit" target="_blank" class="btn btn-success" style="float:right; margin-right: 138px; margin-top: 25px;">Buat Laporan</button>

                </form>

            </div>
        </div>
    </div>

</div>


