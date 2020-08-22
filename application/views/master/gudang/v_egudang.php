 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Gudang
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Data Master</a></li>
        <li><a href="<?php echo site_url('C_gudang'); ?>">Data Gudang</a></li>
        <li class="active">Edit Data Gudang</li>
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
              <h3 class="box-title">Edit Data Gudang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_gudang/editgudang')?>">
              <div class="box-body">
                <?php foreach ($gudang as $gudang) { ?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Gudang</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="gudang" name="gudang" value="<?php echo $gudang->gudang ?>">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $gudang->id_gudang ?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="prov" name="prov" style="width: 100%;">
                      <option value="<?php echo $gudang->id_provinsi ?>"><?php echo $gudang->name_prov ?></option>
                      <?php foreach ($provinsi as $provinsi) { ?>
                      <option value="<?php echo $provinsi->id_provinsi ?>"><?php echo $provinsi->name_prov ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kota/Kabupaten</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kota" name="kota" style="width: 100%;">
                      <option value="<?php echo $gudang->id_kota ?>"><?php echo $gudang->name_kota ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kecamatan" name="kecamatan" style="width: 100%;">
                      <option value="<?php echo $gudang->id_kecamatan ?>"><?php echo $gudang->kecamatan ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="alamat" name="alamat"><?php echo $gudang->alamat ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Telepon</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tlf" name="tlf" placeholder="Telepon"  maxlength="12" minlength="12" value="<?php echo $gudang->tlf ?>">
                  </div>
                </div>
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $gudang->email ?>">
                  </div>
                </div>
              </div>
              <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('C_gudang'); ?>" class="btn btn-default">Batal</a>
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