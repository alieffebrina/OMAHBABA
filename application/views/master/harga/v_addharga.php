<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Harga Jual
        <small>Tambah</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Data Master</a></li>
        <li><a href="<?php echo site_url('C_harga'); ?>">Data Harga Jual</a></li>>
        <li class="active">Tambah Data Harga Jual</li>
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
              <h3 class="box-title">Tambah Data Harga Jual</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_harga/tambah')?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Barang</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="id_barang" name="id_barang" style="width: 100%;">
                      <option value="">--Pilih--</option>
                      <?php foreach ($barang as $value) { ?>
                      <option value="<?php echo $value->id_barang ?>"><?php echo $value->barang.' / '.$value->jenisbarang.' / satuan '.$value->satuan ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga Jual</label>
                  <div class="col-sm-9">
                    <!-- <div class="input-group"> -->
                    <input type="text" class="form-control" id="rupiah" name="rupiah" >
                      <!-- <span class="input-group-addon" id="tampilsatuan"></span>
                    </div> -->
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Min. Quantity</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="minqtt" name="minqtt" placeholder="Min Quantity">
                  </div>
                </div>
                
              </div>
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