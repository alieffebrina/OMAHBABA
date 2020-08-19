<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Satuan
        <small>Tambah</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Data Master</a></li>
        <li><a href="<?php echo site_url('C_satuan'); ?>">Data Satuan</a></li>>
        <li class="active">Tambah Data Satuan</li>
      </ol>
    </section>

    <div class="box-body">
    <?php if ($this->session->flashdata('Sukses')) { ?>
       <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-check"></i> Sukses!</h5>
          <?=$this->session->flashdata('Sukses')?>.
        </div>                 
      <?php } ?>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Satuan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_satuan/tambah')?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Nama Satuan">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <!-- <button type="reset" class="btn btn-default">Batal</button> -->
                    <a href="<?php echo site_url('C_barang/index'); ?>" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-info">Simpan Data</button>
                    <!-- <a href="<?php echo site_url('C_satuan/view'); ?>" class="btn btn-info">Lihat</a> -->
                  </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
   <!--  </section> -->
    <!-- /.content -->

          
    
    <!-- Main content -->
    <!-- <section class="content"> -->
      <div class="row">
        <div class="col-xs-12">
          <form class="form-horizontal" method="POST" action="<?php echo site_url('C_satuan')?>">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Satuan</h3>
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
                  foreach ($satuan as $satuan) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $satuan->satuan; ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_satuan/view/'.$satuan->id_satuan); ?>"><button type="button" class="btn btn-success">Lihat</button></a>
                      <a href="<?php echo site_url('C_satuan/edit/'.$satuan->id_satuan); ?>"><button type="button" class="btn btn-info">Edit</button></a>
                      <a href="<?php echo site_url('C_satuan/hapus/'.$satuan->id_satuan); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                    </div>
                  </td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- a href="<?php echo site_url('C_satuan/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a> -->
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </form>
    </section>
    
    <!-- /.content -->
  </div>