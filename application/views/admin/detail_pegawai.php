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

               <table class="table table-bordered" style="max-width: 45%">

                            <thead>
                                <tr>
                                    <th>NAMA</th>
                                    <th><?php echo $pegawai['pgw_nama']; ?></th>
                                </tr>
                                <tr>
                                    <th>NIP</th>
                                    <th><?php echo $pegawai['pgw_nip']; ?></th>
                                </tr>
                                <tr>
                                    <th>TEMPAT LAHIR</th>
                                    <th><?php echo $pegawai['pgw_tempatlahir']; ?></th>
                                </tr>
                                <tr>
                                    <th>TANGGAL LAHIR</th>
                                    <th><?php echo $pegawai['pgw_tgllahir']; ?></th>
                                </tr>
                                <tr>
                                    <th>JABATAN</th>
                                    <th><?php echo $pegawai['pgw_jabatan']; ?></th>
                                </tr>
                                <tr>
                                    <th>GOLONGAN</th>
                                    <th><?php echo $pegawai['pgw_golongan']; ?></th>
                                </tr>
                                <tr>
                                <tr>
                                    <th>PENDIDIKAN TERAKHIR</th>
                                    <th><?php echo $pegawai['pgw_PendidikanTerakhir']; ?></th>
                                </tr>
                                <tr>

                            </thead>
                        </table>
                        
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->