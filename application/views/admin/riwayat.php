<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?php echo $judul;  ?> <a><?php echo $sub_judul;  ?></a></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="datatable-fixed-header" class="table table-striped table-bordered">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Cuti</th>
                                    <th>Lama Cuti</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>

                                    <?php
                                    $no = 1;
                                    foreach ($pegawai as $pgw) {
                                        ?>
                                    <?php $a = date_create($pgw->tanggal_mulai);
                                    	  $b = date_create($pgw->tanggal_akhir);
                                    	  $c = date_diff($a,$b); ?>

                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $pgw->jenis_cuti; ?></td>
                                        <td><?php echo $c->days; ?> Hari </td>
                                    </tr>

                                <?php } ?>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>