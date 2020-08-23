<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Warna Barang
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_warna'); ?>">Data Master</a></li>
        <li class="active">Data Warna Barang</li>
      </ol>
    </section>
    <div class="box-body">
    <?php if ($this->session->flashdata('Sukses')) { ?>
       <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-check"></i>Sukses!</h5>
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
              <h3 class="box-title">Data Warna Barang</h3>
            </div>

            <div class="box-header">
              <a href="<?php echo site_url('C_warna/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($warna as $warna) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $warna->warna; ?></td>
                  <td>
                    <div class="btn-group">
                      <!--<a href="<?php echo site_url('C_warna/view/'.$jenisbarang->id_jenisbarang); ?>"><button type="button" class="btn btn-success">Lihat</button></a>-->
                      <a href="<?php echo site_url('C_warna/edit/'.$warna->id_warna); ?>"><button type="button" class="btn btn-info">Edit</button></a>
                      <a href="<?php echo site_url('C_warna/hapus/'.$warna->id_warna); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                    </div>
                  </td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
              <a href="<?php echo site_url('C_barang/view'); ?>"><button type="submit" class="btn btn-default">Kembali</button></a>
              <!--<a href="<?php echo site_url('C_jenisbarang/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>-->
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