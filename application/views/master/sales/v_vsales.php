<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data sales
        <small>Lihat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Data Master</a></li>
        <li><a href="<?php echo site_url('C_sales'); ?>">Data sales</a></li>>
        <li class="active">Lihat Data sales</li>
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
              <h3 class="box-title">Lihat Data sales</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_sales')?>">
              <div class="box-body">
                <?php foreach ($sales as $sales) { ?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama sales</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namasales" name="namasales" value="<?php echo $sales->namasales ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Cabang</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namacabang" name="namacabang" value="<?php echo $sales->namacabang ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_sales" name="nama_sales" value="<?php echo $sales->name_prov ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kota/Kabupaten</label>
                  <div class="col-sm-9"><input type="text" class="form-control" id="nama_sales" name="nama_sales" value="<?php echo $sales->name_kota ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-9"><input type="text" class="form-control" id="nama_sales" name="nama_sales" value="<?php echo $sales->kecamatan ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="alamat" name="alamat" readonly><?php echo $sales->alamat ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Telepon</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tlp" name="tlp" maxlength="12" minlength="12" value="<?php echo $sales->tlp ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $sales->jabatan ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tipe User</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tipeuser" name="tipeuser" value="<?php echo $sales->tipeuser ?>" readonly>
                  </div>
                </div>
              </div>
              <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('C_sales/index'); ?>" class="btn btn-default">Kembali</a>
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