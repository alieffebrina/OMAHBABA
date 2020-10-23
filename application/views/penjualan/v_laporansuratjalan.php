<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Surat Jalan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_suratjalan/laporan'); ?>">Laporan Surat Jalan</a></li>
        <li class="active">Lihat Data Laporan Surat Jalan</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class='col-lg-12'>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Filter</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <form action='<?= site_url("C_suratjalan/laporan")?>' method='POST'>
                <div class='row'>
                  <div class="col-lg-12">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>
                      <div class="col-sm-4">
                        <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="tanggalan form-control" id="tgl" name="tgl" value="<?php echo date('d-m-Y')?>">
                          </div>
                      </div>
                  </div>
                </div><br>
                <div class='row'>
                  <div class='col-lg-12'>
                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                    <div class="col-sm-3">
                      <button type="submit" name="btn_submit" class="btn btn-primary">Tampilkan</button>
                      <button type="submit" name="excel" id="btn_print" value="excel" class="btn btn-warning">Cetak Excel</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Surat Jalan</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Surat Jalan</th>
                  <th>No PO</th>
                  <th>Tanggal Kirim</th>
                  <th>Nama Pengirim</th>
                  <th>Alamat Kirim</th>
                  <th>Status</th>
                  <!-- <th>Action</th> -->
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($laporansuratjalan as $value_suratjalan) {
                    if($value_suratjalan->status == '0'){ ?>

                <tr style="color: red">

                    <?php } else { ?>
                      <tr>
                    <?php }
                    ?>

                <!--<tr>-->
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $value_suratjalan->id_suratjalan; ?></td>
                  <td><?php echo $value_suratjalan->id_penjualan;?></td>
                  <td><?php echo $value_suratjalan->tglkirim;?></td>
                  <td><?php echo $value_suratjalan->namapengirim;?></td>
                  <td><?php echo $value_suratjalan->alamatkirim;?></td>
                  <td><?php echo (!empty($value_suratjalan->id_suratjalan)?$value_suratjalan->id_suratjalan:''); ?></td>
                  <td><?php if($value_suratjalan->status_kirim == '1'){ echo "Dikirim";} else {echo "Belum Dikirim"; }?></td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>