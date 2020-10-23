<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Piutang
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_penjualan/lpiutang'); ?>">Laporan Piutang</a></li>
        <li class="active">Lihat Data Laporan Piutang</li>
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
              <form action='<?= site_url("C_penjualan/lpiutang")?>' method='POST'>
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
                      <button type="button" id="btn_print" class="btn btn-warning">Cetak</button>
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
              <h3 class="box-title">Laporan Piutang</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Nota Penjualan</th>
                  <th>Tgl Nota</th>
                  <th>Sub Total</th>
                  <th>Diskon</th>
                  <th>Biaya Kirim</th>
                  <th>Total</th>
                  <th>Tanggal Jatuh Tempo</th>
                  <th>Jenis Pembayaran</th>
                  <th>Status</th>
                  <!-- <th>No Pengiriman</th>
                  <th>Status Pengiriman</th> -->
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($laporanpiutang as $value_piutang) {
                    if($value_piutang->status == '0'){ ?>

                <tr style="color: red">

                    <?php } else { ?>
                      <tr>
                    <?php }
                    ?>

                <!--<tr>-->
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $value_piutang->id_penjualan; ?></td>
                  <td><?php echo $value_piutang->tglnota;?></td>
                  <td>Rp. <?php echo number_format($value_piutang->subtotal,0,",","."); ?></td>
                  <td>Rp. <?php echo number_format($value_piutang->diskon,0,",","."); ?></td>
                  <td>Rp. <?php echo number_format($value_piutang->ongkir,0,",","."); ?></td>
                  <td>Rp. <?php echo number_format($value_piutang->total,0,",","."); ?></td>
                  <td><?php echo $value_piutang->tgljatuhtempo;?></td>
                  <td><?php echo $value_piutang->pembayaran; ?></td>
                  <td><?php if($value_piutang->status == '1'){ echo "Lunas";} else {echo "Belum Lunas"; }?></td>
                  <!-- <td><?php echo (!empty($value_penjualan->id_suratjalan)?$value_penjualan->id_suratjalan:''); ?></td>
                  <td><?php if($value_penjualan->status_kirim == '1'){ echo "Dikirim";} else {echo "Belum Dikirim"; }?></td> -->
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>