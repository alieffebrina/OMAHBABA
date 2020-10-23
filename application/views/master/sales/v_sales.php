<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data sales
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_sales'); ?>">Data Master</a></li>
        <li class="active">Data sales</li>
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
              <h3 class="box-title">Data sales</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-header">
              <a href="<?php echo site_url('C_sales/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div>

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Pegawai</th>
                  <th>Nama</th>
                  <th>Cabang</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Jabatan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($sales as $sales) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $sales->nopegawai; ?></td>
                  <td><?php echo $sales->namasales; ?></td>
                  <td><?php echo $sales->namacabang; ?></td>
                  <td><?php echo $sales->alamat.', '.$sales->name_kota.', '.$sales->name_prov; ?></td>
                  <td><?php echo $sales->tlp; ?></td>
                  <td><?php echo $sales->jabatan; ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_sales/view/'.$sales->id_user); ?>"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-search"></i></button></a>
                      <a href="<?php echo site_url('C_sales/edit/'.$sales->id_user); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <a href="<?php echo site_url('C_sales/hapus/'.$sales->id_user); ?>" onclick="return confirm('Yakin Hapus?')"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
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