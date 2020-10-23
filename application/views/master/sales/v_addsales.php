 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Sales
        <small>Tambah</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i>Data Master</a></li>
        <li><a href="<?php echo site_url('C_sales'); ?>">Data Sales</a></li>
        <li class="active">Tambah Data Sales</li>
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
              <h3 class="box-title">Tambah Data Sales</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_sales/tambah')?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No Pegawai</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nopegawai" name="nopegawai" placeholder="No Pegawai" value="<?php echo $kode ?>" onkeyup="cek_saleskode()">
                  <span id="pesankodeSales"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namasales" name="namasales" placeholder="Nama Sales">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Cabang</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="namacabang" name="namacabang" style="width: 100%;">
                      <option value="">--Pilih--</option>
                      <?php foreach ($cabang as $cabang) { ?>
                      <option value="<?php echo $cabang->id_cabang ?>"><?php echo $cabang->namacabang ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="prov" name="prov" style="width: 100%;">
                      <option value="">--Pilih--</option>
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
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-9">
                  <select class="form-control select2" id="kecamatan" name="kecamatan" style="width: 100%;">
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="alamat" name="alamat"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Telepon</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Telepon" maxlength="12" minlength="6" onkeypress="return Angkasaja(event)">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan Pegawai">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tipe Sales</label>
                  <div class="col-sm-9">
                  <div class="input-group input-group-sm">
                    <select class="form-control select2" id="tipeuser" name="tipeuser" style="width: 100%;">
                      <option value="">--Pilih--</option>
                      <?php foreach ($tipeuser as $tipeuser) { ?>
                      <option value="<?php echo $tipeuser->id_tipeuser?>"><?php echo $tipeuser->tipeuser ?></option>
                      <?php } ?>
                    </select>
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modaltipeuser">
                            Tambah
                          </button>
                        </span>
                  </div>
                    
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('C_sales/index'); ?>" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-info">Tambah Data</button>
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