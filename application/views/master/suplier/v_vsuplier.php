<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Suplier
        <small>Lihat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Data Master</a></li>
        <li><a href="<?php echo site_url('C_suplier'); ?>">Data Suplier</a></li>>
        <li class="active">Lihat Data Suplier</li>
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
              <h3 class="box-title">Lihat Data Suplier</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_suplier')?>">
              <div class="box-body">
                <?php foreach ($suplier as $suplier) { ?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Suplier</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nosuplier" name="nosuplier" readonly value="<?php echo $suplier->nosuplier ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Toko</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="<?php echo $suplier->nama_toko ?>"readonly>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $suplier->id_suplier ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Suplier</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_suplier" name="nama_suplier" value="<?php echo $suplier->nama_suplier ?>" readonly>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-9">

                    <input type="text" class="form-control" id="nama_suplier" name="nama_suplier" value="<?php echo $suplier->name_prov ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kota/Kabupaten</label>
                  <div class="col-sm-9"><input type="text" class="form-control" id="nama_suplier" name="nama_suplier" value="<?php echo $suplier->name_kota ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="alamat" name="alamat" readonly><?php echo $suplier->alamat ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Telepon</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tlp" name="tlp" maxlength="12" minlength="12" value="<?php echo $suplier->tlp ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Limit</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="rupiah" name="rupiah" value=" Rp. <?php echo number_format($suplier->limit,0,",","."); ?>" readonly>
                  </div>
                </div>
              </div>
              <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('C_suplier/index'); ?>" class="btn btn-default">Kembali</a>
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