<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Surat Jalan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_suratjalan'); ?>">Data Surat Jalan</a></li>
        <li class="active">Lihat Data</li>
      </ol>
    </section>
    <div class="box-body">
    <?php if ($this->session->flashdata('SUKSES')) { ?>
       <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-check"></i> SUKSES!</h5>
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
              <h3 class="box-title">Data Surat Jalan</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Surat Jalan</th>
                  <th>Tanggal Surat Jalan</th>
                  <th>No PO</th>
                  <th>Nama Pelanggan</th>
                  <th>Alamat</th>
                  <th>Nama Pengirim</th>
                  <th>Alamat Kirim</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($suratjalan as $suratjalan) {
                    if($suratjalan ->status == '0'){ ?>

                <tr style="color: red">

                    <?php } else { ?>
                      <tr>
                    <?php }
                    ?>
                <!-- <tr> -->
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $suratjalan->id_suratjalan; ?></td>
                  <td><?php echo $suratjalan->tglkirim;?></td>
                  <td><?php echo $suratjalan->id_penjualan;?></td>
                  <td><?php echo $suratjalan->nama; ?></td>
                  <td><?php echo $suratjalan->alamat;?></td>
                  <td><?php echo $suratjalan->namapengirim;?></td>
                  <td><?php echo $suratjalan->alamatkirim; ?></td>
                  <td><?php if($suratjalan->status == '1'){ echo "Terkirim";} else {echo "Belum Dikirim"; }?></td>
                  
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_suratjalan/view/'.$suratjalan->id_suratjalan); ?>"><button type="button" class="btn btn-success">Lihat</button></a>
                      <a href="<?php echo site_url('C_suratjalan/cetaksuratjalan/'.$suratjalan->id_suratjalan); ?>"><button type="button" class="btn btn-info">Cetak</button></a>
                      <a href="<?php echo site_url('C_returpenjualan/add/'.$suratjalan->id_penjualan); ?>"><button type="button" class="btn btn-danger">Retur</button></a>
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