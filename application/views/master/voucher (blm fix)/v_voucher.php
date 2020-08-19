<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pelanggan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_Pelanggan'); ?>">Data Master</a></li>
        <li class="active">Data Pelanggan</li>
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
              <h3 class="box-title">Data Pelanggan</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pelanggan</th>
                  <th>Provinsi</th>
                  <th>Kabupaten/Kota</th>
                  <th>Kecamatan</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Limit Piutang</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($pelanggan as $pelanggan) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $pelanggan->nama; ?></td>
                  <td><?php echo $pelanggan->name_prov;?></td>
                  <td><?php echo $pelanggan->name_kota;?></td>
                  <td><?php echo $pelanggan->kecamatan;?></td>
                  <td><?php echo $pelanggan->alamat;?></td>
                  <td><?php echo $pelanggan->tlp;?></td>
                  <td>Rp. <?php echo number_format($pelanggan->limit,0,",","."); ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_Pelanggan/view/'.$pelanggan->id_pelanggan); ?>"><button type="button" class="btn btn-success">Lihat</button></a>
                      <a href="<?php echo site_url('C_Pelanggan/edit/'.$pelanggan->id_pelanggan); ?>"><button type="button" class="btn btn-info">Edit</button></a>
                      <a href="<?php echo site_url('C_Pelanggan/hapus/'.$pelanggan->id_pelanggan); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                    </div>
                  </td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
              <a href="<?php echo site_url('C_Pelanggan/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
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