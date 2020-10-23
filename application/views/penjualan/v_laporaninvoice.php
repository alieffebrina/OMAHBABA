<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Invoice
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_invoice/laporan'); ?>">Laporan Invoice</a></li>
        <li class="active">Lihat Data Laporan Invoice</li>
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
              <form action='<?= site_url("C_invoice/laporan")?>' method='POST'>
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
              <h3 class="box-title">Laporan Invoice</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Invoice</th>
                  <th>No PO</th>
                  <th>Tanggal Invoice</th>
                  <th>Voucher</th>
                  <th>Diskon</th>
                  <th>Biaya Kirim</th>
                  <th>Total</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($laporaninvoice as $value_invoice) {
                  ?>

                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $value_invoice->id_invoicejual; ?></td>
                  <td><?php echo $value_invoice->id_penjualan; ?></td>
                  <td><?php echo $value_invoice->tglinvoice;?></td>
                  <td><?php echo $value_invoice->voucher;?></td>
                  <td>Rp. <?php echo number_format($value_invoice->subtotal,0,",","."); ?></td>
                  <td>Rp. <?php echo number_format($value_invoice->diskon,0,",","."); ?></td>
                  <td>Rp. <?php echo number_format($value_invoice->ongkir,0,",","."); ?></td>
                  <td>Rp. <?php echo number_format($value_invoice->total,0,",","."); ?></td>
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