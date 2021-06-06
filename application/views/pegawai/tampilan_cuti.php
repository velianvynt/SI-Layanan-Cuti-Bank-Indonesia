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
                    <?php
                    // Notif
                    if ($this->session->flashdata('sukses')) {
                      echo '<p class="alert alert-success">';
                      echo $this->session->flashdata('sukses');
                      echo '</div>';
                    } elseif ($this->session->flashdata('gagal')) {
                      echo '<p class="alert alert-danger">';
                      echo $this->session->flashdata('gagal');
                      echo '</div>';
                    } elseif ($this->session->flashdata('no')) {
                      echo '<p class="alert alert-danger">';
                      echo $this->session->flashdata('no');
                      echo '</div>';
                    } elseif ($this->session->flashdata('gag')) {
                      echo '<p class="alert alert-danger">';
                      echo $this->session->flashdata('gag');
                      echo '</div>';
                    } elseif ($this->session->flashdata('gal')) {
                      echo '<p class="alert alert-danger">';
                      echo $this->session->flashdata('gal');
                      echo '</div>';
                    }
                    ?>
                    <p class="text-muted font-13 m-b-30">
                      <a title="Tambah Cuti" href="" class="btn btn-success" data-toggle="modal" data-target="#tambahpegawai"><i class="fa fa-plus"></i> Tambah</a>
                    </p>

                    <table id="datatable-fixed-header" class="table table-striped table-bordered">

                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nip</th>
                          <th>Nama</th>
                          <th>Jenis Cuti</th>
                          <th>Dari</th>
                          <th>Sampai</th>
                          <th>Status</th>
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
                            <td><?php echo $pgw['jenis_cuti']; ?></td>
                            <td><?php echo $pgw['tanggal_mulai']; ?></td>
                            <td><?php echo $pgw['tanggal_akhir']; ?></td>
                            <td><?php echo $pgw['status']; ?></td>
                            <?php if ($pgw['status'] == 'Disetujui') { ?>
                              <td>
                                <a title="Cetak" target="blank" href="<?php echo base_url('pegawai/cuti/laporan/' . $pgw['id_cuti']) ?>" class="btn btn-primary"><i class="fa fa-print"></i> Cetak </a>
                              </td>
                            <?php } else { ?>
                              <td>
                                <!-- <a href="" class="btn btn-success" data-toggle="modal" data-target="#editpegawai<?php echo $pgw['id_cuti']; ?>"><i class="fa fa-plus"></i> Edit Data</a> -->
                              </td>
                            <?php } ?>

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
                <h4 class="modal-title" id="tambahpegawai">Tambah Data Cuti</h4>
              </div>

              <?php echo form_open_multipart('pegawai/cuti/tambah'); ?>

              <div class="modal-body">
                <div class="form-group">
                  <label for="formGroupExampleInput">Jenis Cuti</label>
                  <select required type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Cuti">
                    <option> -- Pilih Jenis Cuti -- </option>
                    <option value="1">Cuti Bersalin</option>
                    <option value="2">Cuti Bersalin Anak Ke-4/Lebih</option>
                    <option value="3">Cuti Besar</option>
                    <option value="4">Cuti Dalam Rangka Remise</option>
                    <option value="5">Cuti Ibadah Keagamaan</option>
                    <option value="6">Cuti Istri Pegawai Melahirkan</option>
                    <option value="7">Cuti Kematian Anggota Keluarga</option>
                    <option value="8">Cuti Kematian Menantu</option>
                    <option value="9">Cuti Kematian Orang Tua/Mertua</option>
                    <option value="10">Cuti Kematian Sdr/Istri/Suami</option>
                    <option value="11">Cuti Khitanan Anak</option>
                    <option value="12">Cuti PMP</option>
                    <option value="13">Cuti Pernikahan Anak Pegawai</option>
                    <option value="14">Cuti Tahunan</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="formGroupExampleInput">Mulai Tanggal</label>
                  <input type="date" class="form-control col-md-6" id="tanggal_mulai" name="tanggal_mulai" placeholder="Nama Lengkap" required>
                </div>

                <div class="form-group">
                  <label for="formGroupExampleInput">Sampai Tanggal</label>
                  <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" placeholder="Alamat" required onchange="getTanggal()">
                </div>

                <div class="form-group">
                  <label for="formGroupExampleInput">Jumlah Hari</label>
                  <input type="text" class="form-control" readonly placeholder="Jumlah Hari" name="jml" id="jml">
                </div>

                <?php if (empty($cek_file->pgw_file)) { ?>
                  <div class="form-group">
                    <label for="formGroupExampleInput">File Scan SK</label>
                    <input type="file" required class="form-control" id="file" name="file" placeholder="Alamat">
                  </div>
                <?php } ?>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
                </div>

                <?php echo form_close(); ?>

              </div>
            </div>
          </div>

          <!--   <?php foreach ($pegawai as $list) { ?>
                  <div class="modal fade bs-example-modal-sm" id="editpegawai<?php echo $list['id_cuti']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="editpegawai">Edit Cuti</h4>
                        </div>

                      <?php echo form_open_multipart('pegawai/cuti/edit/' . $list['id_cuti']); ?>

                      <div class="modal-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Jenis Cuti</label> 
                              <select type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Cuti" value="<?php echo $list['jenis_cuti']; ?>">
                                <option></option>
                                <option>Cuti Tahunan</option>
                                <option>Cuti Lahiran</option>
                                <option>Cuti Sakit</option>
                                <option>Cuti Alasan Penting</option>
                                <option>Cuti Besar</option>
                              </select>
                          </div>

                          <div class="form-group">
                            <label for="formGroupExampleInput">Mulai Tanggal</label> 
                              <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="Nama Lengkap" value="<?php echo $list['tanggal_mulai']; ?>">
                          </div>

                          <div class="form-group">
                            <label for="formGroupExampleInput">Sampai Tanggal</label> 
                              <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" placeholder="Alamat" value="<?php echo $list['tanggal_akhir']; ?>">
                          </div>

                          <div class="form-group">
                            <label for="formGroupExampleInput">File Scan SK</label> 
                              <input type="file" class="form-control" id="file" name="file" placeholder="Alamat" value="<?php echo $list['file']; ?>">
                          </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>  
                      </div>
                          
                        <?php echo form_close(); ?>
                      

                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <!-- /modals --> -->