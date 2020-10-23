<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Invoice
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_invoice'); ?>">Data Invoice</a></li>
        <li class="active">Lihat Data</li>
      </ol>
    </section>
    <div class="box-body">
    <?php if ($this->session->flashdata('SUKSES')) { ?>
       <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-check"></i> SUKSES!</h5>
          Data berhasil di perbarui.
        </div>                 
      <?php } ?>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Invoice</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Invoice</th>
                  <th>Tanggal Invoice</th>
                  <th>No PO</th>
                  <th>Nama Pelanggan</th>
                  <th>Alamat</th>
                  <th>No Voucher</th>
                  <th>Nama Voucher</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($invoice as $invoice) {
                    if($invoice ->status == '0'){ ?>

                <tr style="color: red">

                    <?php } else { ?>
                      <tr>
                    <?php }
                    ?>
                <!-- <tr> -->
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $invoice->id_invoicejual; ?></td>
                  <td><?php echo $invoice->tglinvoice;?></td>
                  <td><?php echo $invoice->id_penjualan;?></td>
                  <td><?php echo $invoice->nama; ?></td>
                  <td><?php echo $invoice->alamat;?></td>
                  <td><?php echo $invoice->id_voucher;?></td>
                  <td><?php echo $invoice->nama; ?></td>
                  <td><?php echo $invoice->total;?></td>
                  
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_invoice/view/'.$invoice->id_invoicejual); ?>"><button type="button" class="btn btn-success">Lihat</button></a>
                      <a href="<?php echo site_url('C_invoice/cetakinvoice/'.$invoice->id_invoicejual); ?>"><button type="button" class="btn btn-info">Cetak</button></a>
                    </div>
                  </td>
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