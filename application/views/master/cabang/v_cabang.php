<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Cabang
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_cabang'); ?>">Data Master</a></li>
        <li class="active">Data Cabang</li>
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
              <h3 class="box-title">Data cabang</h3>
            </div>
            <div class="box-header">
              <a href="<?php echo site_url('C_cabang/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
              <a href="<?php echo site_url('C_gudang/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Gudang</button></a>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Cabang</th>
                  <th>Nama Gudang</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($cabang as $cabang) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $cabang->namacabang; ?></td>
                  <td><?php echo $cabang->gudang; ?></td>
                  <td><?php echo $cabang->alamat.', Kec. '.$cabang->kecamatan.', '.$cabang->name_kota.', '.$cabang->name_prov;?></td>
                  <td><?php echo $cabang->tlf;?></td>
                  <td><?php echo $cabang->email;?></td>
                  <td>
                    <div class="btn-group">
                       <a href="<?php echo site_url('C_cabang/view/'.$cabang->id_cabang); ?>"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-search"></i></button></a>
                      <a href="<?php echo site_url('C_cabang/edit/'.$cabang->id_cabang); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <a href="<?php echo site_url('C_cabang/hapus/'.$cabang->id_cabang); ?>" onclick="return confirm('Yakin Hapus?')"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
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