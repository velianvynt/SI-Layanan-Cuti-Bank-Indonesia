<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

        </div>

        <div class="clearfix"></div>

        <?php echo $this->session->flashdata('info'); ?>

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
                        <p class="text-muted font-13 m-b-30">
                            <a title="Tambah Pegawai" href="" class="btn btn-success" data-toggle="modal" data-target="#tambahpegawai"><i class="fa fa-plus"></i> Tambah</a>
                        </p>

                        <table id="datatable-fixed-header" class="table table-striped table-bordered">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Golongan</th>
                                    <th>Riwayat Cuti</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>

                                    <?php
                                    $no = 1;
                                    foreach ($pegawai as $pgw) {
                                    ?>

                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $pgw['pgw_nip']; ?></td>
                                        <td><?php echo $pgw['pgw_nama']; ?></td>
                                        <td><?php echo $pgw['pgw_jabatan']; ?></td>
                                        <td><?php echo $pgw['pgw_golongan']; ?></td>
                                        <td class="text-center"><a title="Riwayat Cuti" href="<?php echo base_url(); ?>index.php/admin/pegawai/riwayat/<?php echo $pgw['pgw_nip']; ?>" class="btn btn-success"><i class="fa fa-fw fa-search "></i></a> </td>
                                        <td style="width: 155px">

                                            <a title="Detail Pegawai" href="<?php echo base_url(); ?>index.php/admin/pegawai/detail/<?php echo $pgw['pgw_nip']; ?>" class="btn btn-primary"><i class="fa fa-fw fa-info"></i></a>

                                            <a title="Edit Pegawai" data-toggle="modal" data-target="#edit_pegawai<?php echo $pgw['pgw_nip'] ?>" class="btn btn-warning"><i class="fa fa-fw fa-pencil"></i></a>
                                            <?php if ($pgw['pgw_jabatan'] != 'Kepala Dinas') { ?>
                                                <a title="Hapus Pegawai" href="<?php echo base_url(); ?>index.php/admin/pegawai/hapus/<?php echo $pgw['pgw_nip'] ?>" class="btn btn-danger" onclick=" return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-fw fa-trash-o"></i></a>
                                            <?php } ?>
                                        </td>

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
<!-- /page content -->

<!-- Small modal -->

<div class="modal fade bs-example-modal-sm" id="tambahpegawai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="tambahpegawai">Tambah Data Pegawai</h4>
            </div>

            <form class="form-horizontal form-label-left" action="<?php echo base_url(); ?>admin/pegawai/tambah" method="post">

                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-1 col-xs-12">NIP</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input required type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" id="nip" name="nip" placeholder="NIP">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-1 col-xs-12">Nama Pegawai</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input required type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-1 col-xs-12">Tempat Lahir</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input required type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Tempat Lahir">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-1 col-xs-12">Tanggal Lahir</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input required type="date" class="form-control" id="tgllahir" name=tgllahir placeholder="Tanggal Lahir">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-1 col-xs-12">Jenis Kelamin</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" id="jk" name="jk" value="L">
                                <label class="form-check-label" for="inlineRadio1">Laki - Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" id="jk" name="jk" value="P">
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-1 col-xs-12">Jabatan</label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            <select required class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
                                <option value="" disabled selected>Pilih Jabatan</option>
                                <option value="Kepala Bidang Geologi dan Air Tanah">Kepala Bidang Geologi dan Air Tanah</option>
                                <option value="Kepala Seksi Konservasi Air dan Tanah">Kepala Seksi Konservasi Air dan Tanah</option>
                                <option value="Kepala Seksi Pengusahaan Air dan Tanah">Kepala Seksi Pengusahaan Air dan Tanah</option>
                                <option value="Kepala Seksi Pemetaan Geologi dan Air Tanah">Kepala Seksi Pemetaan Geologi dan Air Tanah</option>
                                <option value="Fungsional Penyelidik Bumi Muda">Fungsional Penyelidik Bumi Muda</option>
                                <option value="Penelaah Data Sumber Daya Alam">Penelaah Data Sumber Daya Alam</option>
                                <option value="Analis Potensi Sumber Air Tanah">Analis Potensi Sumber Air Tanah </option>
                                <option value="Analis Perencanaan, Evaluasi, dan Pelaporan">Analis Perencanaan, Evaluasi, dan Pelaporan</option>
                                <option value="Pengelola Data">Pengelola Data</option>
                                <option value="Pengadministrasian Persuratan">Pengadministrasian Persuratan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-1 col-xs-12">Golongan</label>
                        <div class="col-md-4 col-sm-9 col-xs-12">
                            <select id="golongan" name="golongan" class="form-control">
                                <option>Pilih Golongan</option>
                                <option value="II/b">II/b</option>
                                <option value="II/c">II/c</option>
                                <option value="II/d">II/d</option>
                                <option value="III/a">III/a</option>
                                <option value="III/b">III/b</option>
                                <option value="III/c">III/c</option>
                                <option value="III/d">III/d</option>
                                <option value="IV/a">IV/a</option>
                                <option value="IV/b">IV/b</option>
                                <option value="IV/c">IV/c</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-1 col-xs-12">Email</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input required type="text" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-1 col-xs-12">Masa Kerja</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input required type="number" class="form-control" id="masa" name="masa" placeholder="Masa Kerja">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-1 col-xs-12">Pendidikan Terakhir</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select required type="text" class="form-control" id="pendidikan terakhir" name="pendidikanterakhir" placeholder="Pendidikan Terakhir">
                                <option value="" disabled selected>Pilih Pendidikan</option>
                                <option value="SMA">SMA</option>
                                <option value="D1">D1</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-1 col-xs-12">Tahun lulus</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input required type="number" class="form-control" id="lulus" name="lulus" placeholder="Tahun lulus">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-1 col-xs-12">Usia</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input required type="number" class="form-control" id="usia" name="usia" placeholder="Usia">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-refresh"></i> Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>

<?php foreach ($pegawai as $list) { ?>
    <div class="modal fade bs-example-modal-sm" id="edit_pegawai<?php echo $list['pgw_nip'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="tambahpegawai">Edit Data Pegawai</h4>
                </div>

                <form class="form-horizontal form-label-left" action="<?php echo base_url(); ?>index.php/admin/pegawai/edit/<?php echo $list['pgw_nip'] ?>" method="post">

                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-1 col-xs-12">NIP</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required type="number" class="form-control" id="nip" name="nip" placeholder="NIP" value="<?php echo $list['pgw_nip'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-1 col-xs-12">Nama Pegawai</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input required type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?php echo $list['pgw_nama'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-1 col-xs-12">Tempat Lahir</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input required type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Tempat Lahir" value="<?php echo $list['pgw_tempatlahir'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-1 col-xs-12">Tanggal Lahir</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required type="date" class="form-control" id="tgllahir" name=tgllahir placeholder="Tanggal Lahir" value="<?php echo $list['pgw_tgllahir'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-1 col-xs-12">Jenis Kelamin</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-check form-check-inline">
                                    <input required class="form-check-input" type="radio" id="jk" name="jk" value="L">
                                    <label class="form-check-label" for="inlineRadio1">Laki - Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input required class="form-check-input" type="radio" id="jk" name="jk" value="P">
                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-1 col-xs-12">Nama Jabatan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required type="text" class="form-control" id="jabatan" <?php if ($list['pgw_jabatan'] == "Kepala Dinas") {
                                                                                                    echo "readonly";
                                                                                                } ?> name="jabatan" placeholder="Jabatan" value="<?php echo $list['pgw_jabatan'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-1 col-xs-12">Golongan</label>
                            <div class="col-md-4 col-sm-9 col-xs-12">
                                <select id="golongan" name="golongan" class="form-control">
                                    <option>Choose option</option>
                                    <option value="II/b">II/b</option>
                                    <option value="II/c">II/c</option>
                                    <option value="II/d">II/d</option>
                                    <option value="III/a">III/a</option>
                                    <option value="III/b">III/b</option>
                                    <option value="III/c">III/c</option>
                                    <option value="III/d">III/d</option>
                                    <option value="IV/a">IV/a</option>
                                    <option value="IV/b">IV/b</option>
                                    <option value="IV/c">IV/c</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-1 col-xs-12">Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required type="text" class="form-control" id="email" name="email" value="<?php echo $list['email'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-1 col-xs-12">Pendidikan Terakhir</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input required type="text" class="form-control" id="pendidikan terakhir" name="pendidikanterakhir" placeholder="Pendidikan Terakhir" value="<?php echo $list['pgw_PendidikanTerakhir'] ?>">
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-refresh"></i> Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Ubah</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
<?php } ?>
<!-- /modals -->