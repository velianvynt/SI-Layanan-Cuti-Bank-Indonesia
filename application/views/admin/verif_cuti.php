<!-- page content -->
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
                                    <th>Nip</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Jenis Cuti</th>
                                    <th>Dari</th>
                                    <th>Sampai</th>
                                    <th>File</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>

                                    <?php
                                    $no = 1;
                                    foreach ($pegawai as $pgw) :
                                        ?>

                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $pgw['pgw_nip']; ?></td>
                                        <td><?php echo $pgw['pgw_nama']; ?></td>
                                        <td><?php echo $pgw['pgw_jabatan']; ?></td>
                                        <td><?php echo $pgw['jenis_cuti']; ?></td>
                                        <td><strong><?php echo $pgw['tanggal_mulai']; ?></strong></td>
                                        <td><strong><?php echo $pgw['tanggal_akhir']; ?></strong></td>
                                        <td>
                                            <a href="<?php echo base_url('uploads/'.$pgw['file']) ?>" class="btn btn-success"><i class=""></i> File </a>
                                        </td>
                                        <td>
                                            <?php
                                            if ($pgw['status'] == 'Belum Diverifikasi') {
                                                echo '<h5 class="label label-warning">' . $pgw['status'] . '</h5>';
                                            } else if ($pgw['status'] == 'Disetujui') {
                                                echo '<h5 class="label label-primary">' . $pgw['status'] . '</h5>';
                                            } else {
                                                echo '<h5 class="label label-danger">' . $pgw['status'] . '</h5>';
                                            }
                                            ?>
                                        </td>
                                        <td style="width:100px">

                                            <a title="Verifikasi" type="button" href="<?php echo base_url(); ?>index.php/admin/verif_cuti/setuju/<?php echo $pgw['id_cuti']; ?>" class="btn btn-info <?php if ($pgw['status'] == 'Disetujui' || $pgw['status'] == 'Ditolak') {
                                                                                                                                                                                                            echo 'disabled';
                                                                                                                                                                                                        } ?>"><i class="fa fa-check"></i></a>

                                            <a title="Ditolak" href="<?php echo base_url(); ?>index.php/admin/verif_cuti/tolak/<?php echo $pgw['id_cuti']; ?>" class="btn btn-danger <?php if ($pgw['status'] == 'Disetujui' || $pgw['status'] == 'Ditolak') {
                                                                                                                                                                                            echo 'disabled';
                                                                                                                                                                                        } ?> "><i class="fa fa-times"></i></a>



                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->