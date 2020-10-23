<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Konversi
        <small>Lihat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Data Master</a></li>
        <li><a href="<?php echo site_url('C_konversi'); ?>">Data Konversi</a></li>>
        <li class="active">Lihat Data Konversi</li>
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
              <h3 class="box-title">Lihat Data Konversi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_konversi')?>">
              <div class="box-body">
                <?php foreach ($konversi as $konversi) { ?>
                
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Satuan Awal</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="satuan" name="satuan" value="<?php echo $konversi->satuan_awal ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Quantity Awal</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="qttawal" name="qttawal" value="<?php echo $konversi->qttawal ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Satuan Konversi</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="satuan" name="satuan" value="<?php echo $konversi->satuan_konversi ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Quantity Konversi</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="qttkonversi" name="qttkonversi" value="<?php echo $konversi->qttkonversi ?>" readonly>
                  </div>
                </div>
              </div>
              <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('C_konversi/add'); ?>" class="btn btn-default">Kembali</a>
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