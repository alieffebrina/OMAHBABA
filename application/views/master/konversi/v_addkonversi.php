<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Konversi
        <small>Tambah</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Data Master</a></li>
        <li><a href="<?php echo site_url('C_konversi'); ?>">Data Konversi</a></li>>
        <li class="active">Tambah Data Konversi</li>
      </ol>
    </section>

    <div class="box-body">
    <?php if ($this->session->flashdata('Sukses')) { ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-check"></i> Sukses!</h5>
          <?=$this->session->flashdata('Sukses')?>.
        </div>                 
      <?php } ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Konversi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_konversi/tambah')?>">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Satuan Awal</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="id_satuan" name="id_satuan" style="width: 100%;">
                      <option value="">--Pilih--</option>
                      <?php foreach ($satuan as $satuan_awal) { ?>
                      <option value="<?php echo $satuan_awal->id_satuan ?>"><?php echo $satuan_awal->satuan ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Quantity Awal</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="qttawal" name="qttawal" placeholder="Quantity Awal">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Satuan Konversi</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="satuan" name="satuan" style="width: 100%;">
                      <option value="">--Pilih--</option>
                      <?php foreach ($satuan as $satuan_konversi) { ?>
                      <option value="<?php echo $satuan_konversi->id_satuan ?>"><?php echo $satuan_konversi->satuan ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Quantity Konversi</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="qttkonversi" name="qttkonversi" placeholder="Quantity Konversi">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('C_barang/index'); ?>" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-info">Simpan Data</button>
                  </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Konversi</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Satuan Awal</th>
                  <th>Quantity Awal</th>
                  <th>Satuan Konversi</th>
                  <th>Quantity Konversi</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($konversi as $konversi) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $konversi->satuan_awal; ?></td>
                  <td><?php echo $konversi->qttawal;?></td>
                  <td><?php echo $konversi->satuan_konversi; ?></td>
                  <td><?php echo $konversi->qttkonversi;?></td>
                  
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_konversi/view/'.$konversi->id_konversi); ?>"><button type="button" class="btn btn-success">Lihat</button></a>
                      <a href="<?php echo site_url('C_konversi/edit/'.$konversi->id_konversi); ?>"><button type="button" class="btn btn-info">Edit</button></a>
                      <a href="<?php echo site_url('C_konversi/hapus/'.$konversi->id_konversi); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                    </div>
                  </td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- <a href="<?php echo site_url('C_konversi/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </form>
    </section>
  </div>
    <!-- /.content -->
</div>