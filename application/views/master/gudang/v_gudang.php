<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Gudang
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_gudang'); ?>">Data Master</a></li>
        <li class="active">Data Gudang</li>
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
              <h3 class="box-title">Data Gudang</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-header">
              <a href="<?php echo site_url('C_gudang/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div>

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Gudang</th>
                  <th>Provinsi</th>
                  <th>Kabupaten/kota</th>
                  <th>Kecamatan</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <!-- <th>Status</th> -->
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($gudang as $gudang) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $gudang->gudang; ?></td>
                  <td><?php echo $gudang->name_prov;?></td>
                  <td><?php echo $gudang->name_kota;?></td>
                  <td><?php echo $gudang->kecamatan;?></td>
                  <td><?php echo $gudang->alamat;?></td>
                  <td><?php echo $gudang->tlf;?></td>
                  <td><?php echo $gudang->email;?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_gudang/view/'.$gudang->id_gudang); ?>"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-search"></i></button></a>
                      <a href="<?php echo site_url('C_gudang/edit/'.$gudang->id_gudang); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <a href="<?php echo site_url('C_gudang/hapus/'.$gudang->id_gudang); ?>" onclick="return confirm('Yakin Hapus?')"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
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