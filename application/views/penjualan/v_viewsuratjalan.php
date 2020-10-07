  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lihat Surat Jalan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('C_suratjalan'); ?>"><i class="fa fa-dashboard"></i>Surat Jalan</a></li>
        <li><a href="<?php echo site_url('C_suratjalan'); ?>">Transaksi Surat Jalan</a></li>
        <li class="active"><a href="<?php echo site_url('C_suratjalan'); ?>">Lihat Surat Jalan</a></li>
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
              <h3 class="box-title">Identitas Pelanggan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php foreach ($suratjalan as $key) { ?>
            <div class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">No Surat Jalan</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_suratjalan" name="id_suratjalan" value="<?php echo $key->id_suratjalan; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">Tanggal Kirim</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tglkirim" name="tglkirim" value="<?php echo $key->tglkirim?>" readonly>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">No PO</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="nopojual" name="nopojual" value="<?php echo $key->id_penjualan; ?>" readonly>
                  </div>
                </div>

               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">Nama Pelanggan</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="nonota" name="nonota" value="<?php echo $key->nama; ?>" readonly>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-1 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea name="alamat" class="form-control" id="alamat" readonly><?php echo $key->alamat ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">Nama Pengirim</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="namapengrim" name="namapengirim" value="<?php echo $key->namapengirim; ?>" readonly>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">Alamat Pengirim</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamatkirim" name="alamatkirim" value="<?php echo $key->alamatkirim; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-1 control-label">Status Pengiriman</label>
                  <div class="col-sm-10">
                  <input type="radio" name="pengiriman" <?php if($key->status == '1'){ echo 'checked="checked"'; }?> disabled> Terkirim
                  <input type="radio" name="pengiriman" <?php if($key->status == '0'){ echo 'checked="checked"'; }?> disabled> Belum Dikirim
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
                    foreach ($dtlpenjualan as $dtl) {
                      $subtotal = (($dtl->qtt*$dtl->harga)-$dtl->diskon); 
                      $sub = $sub + $subtotal; ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $dtl->barang?></td>
                        <td><?php echo $dtl->qtt ?></td>
                        <td><?php echo $dtl->satuan ?></td>
                        <td><?php echo number_format($dtl->harga) ?></td>
                        <td><?php echo number_format($dtl->diskon) ?></td>
                        <td><?php echo number_format($subtotal); ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>

                <?php $this->load->view('master/setting/terbilang'); ?>

                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">Total</label>
                    <input type="hidden" id="totalfixruppiah" name="total" value="<?php echo $key->total; ?> ">
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="totalfix" id="totalfix" value="<?php echo 'Rp. '.number_format($sub) ?>"readonly>
                  </div>
                </div> -->

                &nbsp;&nbsp;&nbsp;<a href="<?= site_url('C_suratjalan');?>" class="btn btn-default">Kembali</a><p>

                <!--  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">Terbilang</label>
                  <div class="col-sm-11">
                    <h5 class="text-muted well well-sm no-shadow" id="terbilang"><b><?php echo (terbilang($key->total))." rupiah"?></b></h5>
                  </div>
                </div> -->
        <!-- left column -->
            <!-- /.box-body -->
          </div>
        </div>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        <!-- <div class="col-md-6">
          <div class="box box-danger">
            <div class="col-xs-18">
              
              <p class="lead" style="text-align: center;"><b> Sub Total</b> </p>

              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Sub Total</label>

                    <input type="hidden" class="form-control"  name="barangall" id="barangall" readonly>
                  <div class="col-sm-9">
                    <input type="text" class="form-control"  name="subtotalbawah" id="subtotalbawah" value="<?php echo number_format($sub) ?>"readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Diskon</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="diskonbawah" name="diskonbawah" value="<?php echo number_format($key->diskon) ?>">
                    <span id="nilaidiskonbawah"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Biaya Kirim</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="biayalain" name="biayalain"value="<?php echo number_format($key->biayalain) ?>" >
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- /.box-body -->
         <!--  </div>
        </div> -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
