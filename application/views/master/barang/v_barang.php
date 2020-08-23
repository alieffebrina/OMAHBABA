<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data barang
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_barang'); ?>">Data Master</a></li>
        <li class="active">Data barang</li>
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
              <h3 class="box-title">Data barang</h3>
            </div>
            <div class="box-header">
              <a href="<?php echo site_url('C_barang/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data Barang</button></a>
              <a href="<?php echo site_url('C_gudang/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Gudang</button></a>
              <a href="<?php echo site_url('C_satuan/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Satuan</button></a>
              <a href="<?php echo site_url('C_kategori/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Kategori</button></a>
              <a href="<?php echo site_url('C_warna/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Warna</button></a>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama barang</th>
                  <th>Barcode</th>
                  <th>Expaid</th>
                  <th>Gudang</th>
                  <th>Cabang</th>
                  <th>Satuan</th>
                  <th>Kategori</th>
                  <th>Merk</th>
                  <th>Harga Beli</th>
                  <th>Ukuran</th>
                  <th>Warna</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($barang as $barang) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $barang->barang; ?></td>
                  <td><?php echo $barang->barcode; ?></td>
                  <td><?php echo $barang->expaid; ?></td>
                  <td><?php echo $barang->gudang; ?></td>
                  <td><?php echo $barang->namacabang; ?></td>
                  <td><?php echo $barang->satuan; ?></td>
                  <td><?php echo $barang->kategori; ?></td>
                  <td><?php echo $barang->merk; ?></td>
                  <td>Rp. <?php echo number_format($voucher->hargabeli,0,",","."); ?></td>
                  <td><?php echo $barang->ukuran; ?></td>
                  <td><?php echo $barang->warna; ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_barang/view/'.$barang->id_barang); ?>"><button type="button" class="btn btn-success">Lihat</button></a>
                      <a href="<?php echo site_url('C_barang/edit/'.$barang->id_barang); ?>"><button type="button" class="btn btn-info">Edit</button></a>
                      <a href="<?php echo site_url('C_barang/hapus/'.$barang->id_barang); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
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