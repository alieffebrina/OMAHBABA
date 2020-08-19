<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Konversi
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Data Master</a></li>
        <li><a href="<?php echo site_url('C_konversi'); ?>">Data Konversi</a></li>>
        <li class="active">Lihat Data Konversi</li>
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
              <h3 class="box-title">Lihat Data Konversi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_konversi/editkonversi')?>">
              <div class="box-body">
                <?php foreach ($konversi as $konversi) { ?>
                
                <input hidden id='id_konversi' name='id_konversi' value=<?= $konversi->id_konversi; ?>>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Satuan Awal</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="id_satuan" name="id_satuan" style="width: 100%;">
                      <?php foreach ($satuan as $satuan_awal) { ?>
                      <option value="<?php echo $satuan_awal->id_satuan ?>" <?php if($satuan_awal->id_satuan==$konversi->id_satuan){echo 'selected';}else{echo '';}?>><?php echo $satuan_awal->satuan ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Quantity Awal</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="qttawal" name="qttawal" placeholder="Quantity Awal"  value="<?php echo $konversi->qttawal ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Satuan Konversi</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="satuan" name="satuan" style="width: 100%;">
                      <?php foreach ($satuan as $satuan_konversi) { ?>
                      <option value="<?php echo $satuan_konversi->id_satuan ?>"  <?php if($satuan_konversi->id_satuan==$konversi->satuan){echo 'selected';}else{echo '';}?>><?php echo $satuan_konversi->satuan ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Quantiy Konversi</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="qttkonversi" name="qttkonversi" placeholder="Quantity Konversi" value="<?php echo $konversi->qttkonversi ?>">
                  </div>
                </div>
              </div>
              <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('C_konversi/add'); ?>" class="btn btn-default">Batal</a>
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
  </div>
    <!-- /.content -->
</div>