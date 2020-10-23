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
        <li><a href="<?php echo site_url('C_pelanggan'); ?>">Data Master</a></li>
        <li class="active">Data Pelanggan</li>
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pelanggan</h3>
            </div>
            <div class="box-header">
              <a href="<?php echo site_url('C_pelanggan/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Pelanggan</th>
                  <th>Nama pPelanggan</th>
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
                  <td><?php echo $pelanggan->nopelanggan; ?></td>
                  <td><?php echo $pelanggan->nama; ?></td>
                  <td><?php echo $pelanggan->alamat.', '.$pelanggan->kecamatan.', '.$pelanggan->name_kota.', '.$pelanggan->name_prov;?></td>
                  <td><?php echo $pelanggan->tlp;?></td>
                  <td>Rp. <?php echo number_format($pelanggan->limit,0,",","."); ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_pelanggan/view/'.$pelanggan->id_pelanggan); ?>"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-search"></i></button></a>
                      <a href="<?php echo site_url('C_pelanggan/edit/'.$pelanggan->id_pelanggan); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <a href="<?php echo site_url('C_pelanggan/hapus/'.$pelanggan->id_pelanggan); ?>" onclick="return confirm('Yakin Hapus?')"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
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