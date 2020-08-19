<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Harga Jual
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Data Master</a></li>
        <li><a href="<?php echo site_url('C_harga'); ?>">Data Harga Jual</a></li>>
        <li class="active">Lihat Data Harga Jual</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Lihat Data Harga Jual</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_harga/editharga')?>">
              <div class="box-body">
                <?php foreach ($harga as $harga) { ?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Id Barang</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="id_barang" name="id_barang" value="<?php echo $harga->id_barang ?>" readonly>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $harga->id_harga ?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $harga->barang.' / '.$harga->jenisbarang ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga Jual</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="rupiah" name="rupiah" value=" Rp. <?php echo number_format($harga->harga,0,",","."); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Min. Quantity</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="minqtt" name="minqtt" placeholder="Min. Quantity" value="<?php echo $harga->minqtt ?>">
                  </div>
                </div>
                
              </div>
              <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('C_harga/index'); ?>" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-info">Simpan Data</button>
                  </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>