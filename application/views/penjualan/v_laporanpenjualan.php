<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Penjualan PO
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_penjualan/laporan'); ?>">Laporan Penjualan PO</a></li>
        <li class="active">Lihat Data Laporan Penjualan PO</li>
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
              <form action='<?= site_url("C_penjualan/laporan")?>' method='POST'>
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
              <h3 class="box-title">Laporan Penjualan PO</h3>
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
                  <!-- <th>Diskon</th>
                  <th>Biaya Kirim</th> -->
                  <th>Total</th>
                  <th>Tanggal Jatuh Tempo</th>
                  <th>Jenis Pembayaran</th>
                  <th>Status</th>
                  <th>No Pengiriman</th>
                  <th>Status Pengiriman</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($laporanpenjualan as $value_penjualan) {
                    if($value_penjualan->status == '0'){ ?>

                <tr style="color: red">

                    <?php } else { ?>
                      <tr>
                    <?php }
                    ?>

                <!--<tr>-->
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $value_penjualan->id_penjualan; ?></td>
                  <td><?php echo $value_penjualan->tglpojual;?></td>
                  <td>Rp. <?php echo number_format($value_penjualan->subtotal,0,",","."); ?></td>
                  <!-- <td>Rp. <?php echo number_format($value_penjualan->diskon,0,",","."); ?></td>
                  <td>Rp. <?php echo number_format($value_penjualan->ongkir,0,",","."); ?></td> -->
                  <td>Rp. <?php echo number_format($value_penjualan->total,0,",","."); ?></td>
                  <td><?php echo $value_penjualan->tgljatuhtempo;?></td>
                  <td><?php echo $value_penjualan->jenispembayaran; ?></td>
                  <td><?php if($value_penjualan->status == '1'){ echo "Lunas";} else {echo "Belum Lunas"; }?></td>
                  <td><?php echo (!empty($value_penjualan->id_suratjalan)?$value_penjualan->id_suratjalan:''); ?></td>
                  <td><?php if($value_penjualan->status_kirim == '1'){ echo "Dikirim";} else {echo "Belum Dikirim"; }?></td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Detail Penjualan</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              

              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Nota Penjualan</th>
                  <th>Tgl PO</th>
                  <th>Barcode</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Satuan</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Diskon</th>
                  <th>Sub Total</th>
                  <!-- <th>Action</th> -->
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($detaillaporanpenjualan as $value_detail_penjualan) {
                    if($value_detail_penjualan->status_penjualan == '0'){ ?>

                <tr style="color: red">

                    <?php } else { ?>
                      <tr>
                    <?php }
                    ?>

                <!--<tr>-->
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $value_detail_penjualan->id_penjualan; ?></td>
                  <td><?php echo $value_detail_penjualan->tglpojual;?></td>
                  <td><?php echo $value_detail_penjualan->barcode;?></td>
                  <td><?php echo $value_detail_penjualan->barang;?></td>
                  <td><?php echo $value_detail_penjualan->kategori;?></td>
                  <td><?php echo $value_detail_penjualan->satuan;?></td>
                  <td><?php echo $value_detail_penjualan->qtt;?></td>
                  <td>Rp. <?php echo number_format($value_detail_penjualan->harga,0,",","."); ?></td>
                  <td>Rp. <?php echo number_format($value_detail_penjualan->diskon,0,",","."); ?></td>
                  <td>Rp. <?php echo number_format($value_detail_penjualan->subtotal,0,",","."); ?></td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          <!-- /.box -->
        <!-- </div> -->
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>