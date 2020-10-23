<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Voucher
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Data Master</a></li>
        <li><a href="<?php echo site_url('C_voucher'); ?>">Data Voucher</a></li>>
        <li class="active">Lihat Data Voucher</li>
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
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Lihat Data Voucher</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_voucher/editvoucher')?>">
              <div class="box-body">
                <?php foreach ($voucher as $voucher) { ?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Voucher</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="kodevoucher" name="kodevoucher" readonly value="<?php echo $voucher->kodevoucher ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Voucher</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="namavoucher" name="nama" value="<?php echo $voucher->nama ?>">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $voucher->id_voucher ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="ket" name="ket"><?php echo $voucher->ket ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Min. Pembelian</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="rupiah" name="rupiah" value=" Rp. <?php echo number_format($voucher->minpembelian,0,",","."); ?>">
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Mulai</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tglmulai" name="tglmulai" value="<?php echo date($voucher->tglmulai); ?>">
                    <!-- <input type="date" class="form-control" id="tglmulai" name="tglmulai" value="<?php echo date('d-m-Y')?>"> -->
                  <!--</div>
                </div>-->
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Berlaku Sampai</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="tglakhir" name="tglakhir" value="<?php echo date($voucher->tglakhir)?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">DisKon</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="rupiahh" name="rupiahh" value=" Rp. <?php echo number_format($voucher->discount,0,",","."); ?>">
                  </div>
                </div>
              </div>
              <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <a href="<?php echo site_url('C_voucher/index'); ?>" class="btn btn-default">Batal</a>
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