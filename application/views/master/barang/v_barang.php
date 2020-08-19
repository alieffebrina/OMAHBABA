<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Barang
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_barang'); ?>">Data Master</a></li>
        <li class="active">Data Barang</li>
      </ol>
    </section>

        <!-- <div class="box-body">
    <?php if ($this->session->flashdata('Sukses')) { ?>
       <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-check"></i> Sukses!</h5>
          Data Berhasil Diperbarui.
        </div>                 
      <?php } ?>
    </div> -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Barang</h3>
            </div>

            <div class="box-header">
              <a href="<?php echo site_url('C_barang/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
              <a href="<?php echo site_url('C_satuan/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Satuan</button></a>
              <a href="<?php echo site_url('C_jenisbarang/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Jenis Barang</button></a>
              <a href="<?php echo site_url('C_konversi/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Konversi</button></a>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Satuan</th>
                  <th>Jenis Barang</th>
                  <!--<th>No. Urut/th>-->
                  <th>Stok</th>
                  <th>Stok Min.</th>
                  <?php if($this->session->userdata('id_user') != '8') { ; ?>
                  <th>Harga Beli</th>
                <?php } ?>
                  <th>Konversi</th>
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
                  <td><?php echo $barang->nama_satuan;?></td>
                  <td><?php echo $barang->jenisbarang;?></td>
                  <!-- <td><?php echo $barang->nourut;?></td> -->
                  <td><?php echo $barang->stok;?></td>
                  <td><?php echo $barang->stokmin;?></td>
                  <?php if($this->session->userdata('id_user') != '8') { ; ?>
                  <td>Rp. <?php echo number_format($barang->hargabeli,0,",","."); ?></td> <?php } ?>
                  <td><?php echo $barang->satuan_konversi;?></td>
                  <td><?php echo $barang->hasil_konversi;?></td>
                  
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