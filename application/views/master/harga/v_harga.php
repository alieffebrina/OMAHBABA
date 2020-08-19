<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Harga Jual
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_harga'); ?>">Data Master</a></li>
        <li class="active">Data Harga Jual</li>
      </ol>
    </section>
    <div class="box-body">
    <?php if ($this->session->flashdata('SUCCESS')) { ?>
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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Harga Jual</h3>
            </div>
            <div class="box-header">
              <a href="<?php echo site_url('C_harga/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Jenis Barang</th>
                  <th>Satuan</th>
                  <th>Min. Quantity</th>
                  <th>Harga Jual</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($harga as $harga) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $harga->barang; ?></td>
                  <td><?php echo $harga->jenisbarang; ?></td>
                  <td><?php echo $harga->satuan; ?></td>
                  <td><?php echo $harga->minqtt;?></td>
                  <td>Rp. <?php echo number_format($harga->harga,0,",","."); ?></td>
                  
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_harga/view/'.$harga->id_harga); ?>"><button type="button" class="btn btn-success">Lihat</button></a>
                      <a href="<?php echo site_url('C_harga/edit/'.$harga->id_harga); ?>"><button type="button" class="btn btn-info">Edit</button></a>
                      <a href="<?php echo site_url('C_harga/hapus/'.$harga->id_harga); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
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