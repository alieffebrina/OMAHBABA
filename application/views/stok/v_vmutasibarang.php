<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Mutasi Barang
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_mutasibarang'); ?>">Data Mutasi Barang</a></li>
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
              <h3 class="box-title">Data Mutasi Barang</h3>
            </div>
            <div class="box-header">
              <a href="<?php echo site_url('C_mutasibarang/addcart'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Mutasi</th>
                  <th>Tanggal Mutasi</th>
                  <th>Dari Gudang</th>
                  <th>Ke Gudang</th>
                  <th>Dari Cabang</th>
                  <th>Ke Cabang</th>
                  <th>Status Mutasi</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($mutasibarang as $mutasibarang) {
                    if($mutasibarang->statusmutasi == '0'){ ?>

                <tr style="color: red">

                    <?php } else { ?>
                      <tr>
                    <?php }
                    ?>

                <!--<tr>-->
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $mutasibarang->id_mutasibarang; ?></td>
                  <td><?php echo $mutasibarang->tglmutasi;?></td>
                  <td><?php echo $mutasibarang->gudang;?></td>
                  <td><?php echo $mutasibarang->gudangmutasi;?></td>
                  <td><?php echo $mutasibarang->namacabang; ?></td>
                  <td><?php echo $mutasibarang->cabangmutasi;?></td>
                  <td><?php if($mutasibarang->statusmutasi == '1'){ echo "Lunas";} else {echo "Belum Lunas"; }?></td>
                  
                  <td>
                    <div class="btn-group">
                     <a href="<?php echo site_url('C_mutasibarang/view/'.$mutasibarang->id_mutasibarang); ?>"><button type="button" class="btn btn-success">Lihat</button></a>
                      <a href="<?php echo site_url('C_mutasibarang/cetakmutasi/'.$mutasibarang->id_mutasibarang); ?>"><button type="button" class="btn btn-info">Cetak</button></a>
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