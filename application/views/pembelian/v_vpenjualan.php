<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Penjualan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_penjualan'); ?>">Data Penjualan</a></li>
        <li class="active">Lihat Data</li>
      </ol>
    </section>
    <div class="box-body">
    <?php if ($this->session->flashdata('SUKSES')) { ?>
       <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-check"></i> Success!</h5>
          Data berhasil di perbarui.
        </div>                 
      <?php } ?>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Penjualan</h3>
            </div>
            <div class="box-header">
              <a href="<?php echo site_url('C_penjualan/addcart'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No PO</th>
                  <th>Tanggal PO</th>
                  <th>Pelanggan / Alamat</th>
                  <th>Cabang / Sales</th>
                  <th>Jenis Pembayaran</th>
                  <th>Tgl Jatuh Tempo</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($penjualan as $penjualan) {
                    if($penjualan->status == '0'){ ?>

                <tr style="color: red">

                    <?php } else { ?>
                      <tr>
                    <?php }
                    ?>

                <!--<tr>-->
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $penjualan->id_penjualan; ?></td>
                  <td><?php echo $penjualan->tglpojual;?></td>
                  <td><?php echo $penjualan->nama.' / '.$penjualan->alamat;?></td>
                  <td><?php echo $penjualan->namacabang.' / '.$penjualan->namasales;?></td>
                  <td><?php echo $penjualan->jenispembayaran; ?></td>
                  <td><?php echo $penjualan->tgljatuhtempo;?></td>
                  <td><?php if($penjualan->status == '1'){ echo "Lunas";} else {echo "Belum Lunas"; }?></td>
                  
                  <td>
                    <div class="btn-group">
                     <a href="<?php echo site_url('C_penjualan/view/'.$penjualan->id_penjualan); ?>"><button type="button" class="btn btn-success">Lihat</button></a>
                      <a href="<?php echo site_url('C_penjualan/cetakpenjualan/'.$penjualan->id_penjualan); ?>"><button type="button" class="btn btn-info">Cetak</button></a>
                      <a href="<?php echo site_url('C_invoice/add/'.$penjualan->id_penjualan); ?>"><button type="button" class="btn btn-danger">Invoice</button></a>
                      <?php if ($penjualan->status == '1') { ?>
                      <a href="<?php echo site_url('C_suratjalan/add/'.$penjualan->id_penjualan); ?>"><button type="button" class="btn btn-danger">Surat Jalan</button></a>
                      <?php } ?>

                      <?php if ($penjualan->status == '0') { ?>
                      <a href="<?php echo site_url('C_penjualan/bayar/'.$penjualan->id_penjualan); ?>"><button type="button" class="btn btn-primary">Bayar</button></a>
                      <?php } ?>
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