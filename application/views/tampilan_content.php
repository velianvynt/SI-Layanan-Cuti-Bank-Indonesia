<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row tile_count">
    </div>

    <div class="row top_tiles">
        <div class="animated flipInY col-lg-4 col-md4 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-users"></i></div>
                <div class="count"><?php $query = $this->db->query("select * from tb_pegawai");
                                    echo $query->num_rows(); ?></div><br>
                <h3>Data Pegawai</h3>
                <p><a href="<?php echo base_url(); ?>admin/pegawai">Lihat Data</a></p>
            </div>
        </div>
        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-folder-open"></i></div>
                <div class="count"><?php $query = $this->db->query("select * from tb_cuti");
                                    echo $query->num_rows(); ?></div><br>
                <h3>Data Verifikasi Cuti</h3>
                <p><a href="<?php echo base_url(); ?>admin/verif_cuti">Lihat Data</a></p>
            </div>
        </div>
    </div>
</div>

