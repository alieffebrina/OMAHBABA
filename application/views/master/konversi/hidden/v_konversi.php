<!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper"> -->
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>
        Data Konversi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_konversi'); ?>">Data Master</a></li>
        <li class="active">Data Konversi</li>
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
    </div> -->
    <!-- Main content -->
    <!-- <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Konversi</h3>
            </div> -->
            <!-- /.box-header -->
<!-- 
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Satuan Awal</th>
                  <th>Quantity Awal</th>
                  <th>Satuan Konversi</th>
                  <th>Quantity Konversi</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($konversi as $konversi) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $konversi->satuan_awal; ?></td>
                  <td><?php echo $konversi->qttawal;?></td>
                  <td><?php echo $konversi->satuan_konversi; ?></td>
                  <td><?php echo $konversi->qttkonversi;?></td>
                  
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_konversi/view/'.$konversi->id_konversi); ?>"><button type="button" class="btn btn-success">Lihat</button></a>
                      <a href="<?php echo site_url('C_konversi/edit/'.$konversi->id_konversi); ?>"><button type="button" class="btn btn-info">Edit</button></a>
                      <a href="<?php echo site_url('C_konversi/hapus/'.$konversi->id_konversi); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                    </div>
                  </td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
              <a href="<?php echo site_url('C_konversi/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div> -->
            <!-- /.box-body -->
          <!-- </div> -->
          <!-- /.box -->
       <!--  </div> -->
        <!-- /.col -->
     <!--  </div> -->
      <!-- /.row -->
   <!--  </section> -->
    <!-- /.content -->
  <!-- </div> -->