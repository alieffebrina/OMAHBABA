<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Harga Jual
        <small>Lihat</small>
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
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_harga')?>">
              <div class="box-body">
                <?php foreach ($harga as $harga) { ?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Barang</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="id_barang" name="id_barang" value="<?php echo $harga->barang.' / '.$harga->jenisbarang ?>" readonly>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga Jual</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="rupiah" name="rupiah" value=" Rp. <?php echo number_format($harga->harga,0,",","."); ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Min. Quantity</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="minqtt" name="minqtt" value="<?php echo $harga->harga ?>" readonly>
                  </div>
                </div>

              </div>
              <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('C_harga/index'); ?>" class="btn btn-default">Kembali</a>
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