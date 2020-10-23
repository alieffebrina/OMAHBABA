  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lihat Data Mutasi Barang
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('C_mutasibarang'); ?>"><i class="fa fa-dashboard"></i>Mutasi Barang</a></li>
        <li><a href="<?php echo site_url('C_mutasibarang'); ?>">Mutasi Barang</a></li>
        <li class="active"><a href="<?php echo site_url('C_mutasibarang'); ?>">Lihat Data Mutasi Barang</a></li>
      </ol>
    </section>
<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Mutasi Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach ($mutasibarang as $key) { ?>
            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">No Mutasi Barang</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nonota" name="nonota" value="<?php echo $key->id_mutasibarang; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">Tanggal Mutasi</label>

                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl" name="tgl" value="<?php echo $key->tglmutasi?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">Dari Gudang</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="gudang" name="gudang" value="<?php echo $key->id_gudang; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">Ke Gudang</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="gudang" name="gudang" value="<?php echo $key->gudangmutasi; ?>" readonly>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">Dari Cabang</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="cabang" name="cabang" value="<?php echo $key->id_cabang; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">Ke Cabang</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="cabang" name="cabang" value="<?php echo $key->cabangmutasi; ?>" readonly>
                  </div>
                </div>

               
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-1 control-label">Status Mutasi</label>
                  <div class="col-sm-10">
                  <input type="radio" name="statusmutasi" <?php if($key->statusmutasi == "proses"){ echo 'checked="checked"'; }?> disabled> Proses
                  <input type="radio" name="statusmutasi" <?php if($key->statusmutasi == "diterima"){ echo 'checked="checked"'; }?> disabled> Diterima
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <!-- /.box-footer -->
            </div>
          </div>

          <!-- Form Element sizes -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">List Barang</h3>
            </div>
            <div class="row">
              <div class="col-xs-12 table-responsive">
                <table class="table table-striped" id="tabelku">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Qtt</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Sub Total</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; 
                      $sub = 0;
                    foreach ($dtljual as $dtl) {
                      $subtotal = (($dtl->qtt*$dtl->harga)-$dtl->diskon); 
                      $sub = $sub + $subtotal; ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $dtl->barang ?></td>
                        <td><?php echo $dtl->qtt ?></td>
                        <td><?php echo $dtl->satuan ?></td>
                        <td><?php echo number_format($dtl->harga) ?></td>
                        <td><?php echo number_format($dtl->diskon) ?></td>
                        <td><?php echo number_format($subtotal); ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>

                </table><p>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">Total</label>

                    <input type="hidden" class="form-control"  name="barangall" id="barangall" readonly>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="subtotalbawah" id="subtotalbawah" value="<?php echo 'Rp. '.number_format($sub) ?>"readonly>
                  </div>
                </div>
                  <a href="<?= site_url('C_penjualan');?>" class="btn btn-default">Kembali</a><p>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <?php $this->load->view('master/setting/terbilang'); ?>
        <!-- <div class="col-md-6">
          <div class="box box-danger">
            <div class="col-xs-12">
              <p class="lead" style="text-align: center;"><b>Total :</b></p>
                  <div class="bg-maroon disable color-palette" ><h1 style="text-align: center;" id="totalfix"><?php echo 'Rp. '. number_format($key->total); ?></h1></div></br >
                  <input type="hidden" id="totalfix" name="total" value="<?php echo $key->total; ?> ">
              <p class="lead">Terbilang :</p>
              <h3 class="text-muted well well-sm no-shadow" id="terbilang" style="text-align: center;"><?php echo (terbilang($key->total))." rupiah"?></h3>
            </div>
          </div>
        </div> -->
        <!-- <div class="col-md-12">
          <div class="box box-danger">
            <div class="col-xs-18">
              
              <p class="lead" style="text-align: center;"><b> Sub Total</b> </p>

              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Sub Total</label>

                    <input type="hidden" class="form-control"  name="barangall" id="barangall" readonly>
                  <div class="col-sm-9">
                    <input type="text" class="form-control"  name="subtotalbawah" id="subtotalbawah" value="<?php echo 'Rp. '.number_format($sub) ?>"readonly>
                  </div>
                </div> -->
                <!-- 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Diskon</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="diskonbawah" name="diskonbawah" value="<?php echo 'Rp. '.number_format($key->diskon) ?>">
                    <span id="nilaidiskonbawah"></span>
                  </div>
                </div> -->
                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Biaya Kirim</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="biayalain" name="biayalain"value="<?php echo 'Rp. '.number_format($key->ongkir) ?>" >
                  </div>
                </div> -->
              </div>
            </div>
            <?php } ?>
            <!-- /.box-body -->
          </div>
        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
