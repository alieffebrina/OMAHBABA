<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data sales
        <small>Edit</small>
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
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_sales/editsales')?>">
              <div class="box-body">
                <?php foreach ($sales as $sales) { ?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama sales</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namasales" name="namasales" value="<?php echo $sales->namasales ?>">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $sales->id_sales ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Cabang</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="namacabang" name="namacabang" style="width: 100%;">
                      <?php foreach ($cabang as $cabang) { ?>
                      <option value="<?php echo $cabang->id_cabang; ?>" <?php if ($cabang->id_cabang == $sales->id_cabang ){ echo "selected"; } ?> ><?php echo $cabang->namacabang ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="prov" name="prov" style="width: 100%;">
                      <?php foreach ($provinsi as $provinsi) { ?>
                      <option value="<?php echo $provinsi->id_provinsi; ?>" <?php if ($provinsi->id_provinsi == $sales->id_provinsi ){ echo "selected"; } ?> ><?php echo $provinsi->name_prov ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kota/Kabupaten</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kota" name="kota" style="width: 100%;">
                      <option value="<?php echo $sales->id_kota ?>"><?php echo $sales->name_kota ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kecamatan" name="kecamatan" style="width: 100%;">
                      <option value="<?php echo $sales->id_kecamatan ?>"><?php echo $sales->kecamatan ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="alamat" name="alamat"><?php echo $sales->alamat ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Telepon</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Telepon"  maxlength="12" minlength="12" value="<?php echo $sales->tlp ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $sales->jabatan ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tipe User</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="tipeuser" name="tipeuser" style="width: 100%;">
                      <?php foreach ($tipeuser as $tipeuser) { ?>
                      <option value="<?php echo $tipeuser->id_tipeuser; ?>" <?php if ($sales->id_tipeuser == $tipeuser->id_tipeuser ){ echo "selected"; } ?> ><?php echo $tipeuser->tipeuser ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('C_sales/index'); ?>" class="btn btn-default">Batal</a>
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