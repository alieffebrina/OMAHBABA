<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Barang Garam
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_baranggaram'); ?>">Data Master</a></li>
        <li class="active">Data Barang Garam</li>
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
              <h3 class="box-title">Data Barang Garam</h3>
            </div>
            <div class="box-header">
              <a href="<?php echo site_url('C_baranggaram/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data Barang Garam</button></a>
             <!--  <a href="<?php echo site_url('C_gudang/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Gudang</button></a> -->
              <a href="<?php echo site_url('C_satuangaram/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Satuan</button></a>
              <a href="<?php echo site_url('C_kategorigaram/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Kategori</button></a>
              <a href="<?php echo site_url('C_warnagaram/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Warna</button></a>
              <a href="<?php echo site_url('C_konversi/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Konversi</button></a>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Barcode</th>
                  <th>Expaid</th>
                  <th>Lokasi</th>
                  <!-- <th>Gudang</th>
                  <th>Cabang</th> -->
                  <th>Satuan</th>
                  <th>Keterangan</th>
                  <!-- <th>Warna</th>
                  <th>Ukuran</th>
                  <th>Merk</th> -->
                  <th>Stok</th>
                  <th>Stok Min.</th>
                  <th>Harga Beli</th>
                  <th>Konversi Satuan</th>
                  <th>Hasil Konversi</th>
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
                  <td><?php echo $barang->gudang.' / '.$barang->namacabang;?></td>
                  <!-- <td><?php echo $barang->gudang; ?></td>
                  <td><?php echo $barang->namacabang; ?></td> -->
                  <td><?php echo $barang->nama_satuan; ?></td>
                  <td><?php echo $barang->kategori.' / '.$barang->merk.' / '.$barang->warna; ?></td>
                  <!-- <td><?php echo $barang->warna; ?></td>
                  <td><?php echo $barang->ukuran; ?></td>
                  <td><?php echo $barang->merk; ?></td> -->
                  <td><?php echo $barang->stok;?></td>
                  <td><?php echo $barang->stokmin;?></td>
                  <td>Rp. <?php echo number_format($barang->hargabeli,0,",","."); ?></td>
                  <td><?php echo $barang->satuan_konversi;?></td>
                  <td><?php echo $barang->hasil_konversi;?></td>
                  
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_baranggaram/view/'.$barang->id_barang); ?>"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-search"></i></button></a>
                      <a href="<?php echo site_url('C_baranggaram/edit/'.$barang->id_barang); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <a href="<?php echo site_url('C_baranggaram/hapus/'.$barang->id_barang); ?>" onclick="return confirm('Yakin Hapus?')"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
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