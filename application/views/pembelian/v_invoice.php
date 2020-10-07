
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <section class="content-header">
      <h1>
        Data Barang Invoice
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('C_invoice'); ?>"><i class="fa fa-dashboard"></i>Daftar Barang Invoice</a></li>
        <li class="active"><a href="<?php echo site_url('C_penjualan'); ?>">Transaksi Invoice</a></li>
        <li class="active">Lihat Data</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Daftar Barang Pre Order</h3>

                   <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                </div>
              <!-- /.box-header -->
              <!-- form start -->
             
                <div class="box-body">
                  <table class="table table-striped table-bordered" id="tabelku">
                    <thead>
                    <tr>
                      
                      <th hidden><center></center></th>
                      <th width='15%'><center>Barcode</center></th>
                      <th width='35%'><center>Barang</center></th>
                      <th width='10%'> <center>Qtt</center></th>
                      <th width='15%'> <center>Diskon</center></th>
                      <th width='20%'><center>Sub Total</center></th>
                      <!-- <th width='5%'><center></center></th> -->

                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                  $no=1;
                  foreach ($invoice as $invoice) {
                    
                    ?>

                <tr>
                  <!-- <td><?php echo $no++; ?></td> -->
                  <td><?php echo $invoice->barcode; ?></td>
                  <td><?php echo $invoice->barang.' / '.$invoice->merk.' / '.$invoice->ukuran.' '.$invoice->satuan;?></td>
                  <td><?php echo $invoice->qtt;?></td>
                  <td><?php echo $invoice->diskon;?></td>
                  <td><?php echo $invoice->subtotal; ?></td>
                </tr>
                <?php }?>
                    </tbody>
                  
                  </table>
              
            </div>
            <br>
            <div class="box box-danger">
                <div class="col-xs-18">
                  
                      <p class="lead" style="text-align: center;"><b> Grand Total</b> </p>

                      <div class="box-body">

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Total</label>

                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="subtotalbawah" readonly value="<?= $penjualan->subtotal; ?>">
                            <input type="hidden" class="form-control" name="subtotalbawahrupiah" id="subtotalbawahrupiah">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Diskon</label>

                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="diskonbawah" name="diskonbawah" value=""  onkeyup="Calculate_total()">
                            <span id="nilaidiskonbawah"></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Biaya Kirim</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="biayalain" name="biayalain" value=""  onkeyup="Calculate_total()"><p><p><p>
                          </div>
                        </div>

                      <div class="form-group">
                        <h4><label for="inputEmail3" class="col-sm-1 control-label">Total</label></h4>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="totalfix" readonly value="0">
                          <input type="hidden" class="form-control" name="total" id="total"><p>
                        </div>
                      </div>

                      <div class="form-group">
                        <h4><label for="inputEmail3" class="col-sm-1 control-label">Terbilang</label></h4>
                        <div class="col-sm-12">
                          <textarea class="form-control" id="terbilang" readonly></textarea><p>
                        </div>
                      </div>
                      
                      &nbsp;&nbsp;&nbsp;
                  
                      <a href="<?= site_url('C_penjualan/addcart');?>" class="btn btn-info">Tambah Barang</a>&nbsp;&nbsp;&nbsp;
                      <input type='submit' class="btn btn-primary" name="cetak" value='Simpan Dan Cetak'> &nbsp;&nbsp;&nbsp;
                      <a href="<?= site_url('C_invoice');?>" class="btn btn-default">Cancel</a>
                     <!--  <input type='submit' class="btn btn-info" name="simpan" value='Simpan'>  -->
                      
              
                      </div>
                </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
        <!-- <div class="col-md-6" style="padding-right:2px"> -->
          <form class="form-horizontal" method="POST" action="<?php echo site_url('C_invoice/tambah')?> " id='formpenjualan'>
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Identitas Pelanggan</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
             
                <div class="box-body">

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No Invoice</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_invoicejual" name="id_invoicejual" value="<?php echo $kode; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Invoice</label>
                  <div class="col-sm-10">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="datepicker form-control" id="tglinvoice" name="tglinvoice" value="<?php echo date('d-m-Y')?>">
                    </div>
                  </div>
                </div>

                <?php //foreach ($penjualan as $key) { ?>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No PO</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nonota" name="nonota" value="<?php echo $penjualan->id_penjualan; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" readonly value="<?php echo $penjualan->nama ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea name="alamat" class="form-control" id="alamat" readonly><?php echo $penjualan->alamat ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Cabang</label>
                  <div class="col-sm-10">
                    <input type="text" name="namacabang" class="form-control" id="namacabang" readonly value="<?php echo $penjualan->namacabang ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Sales</label>
                  <div class="col-sm-10">
                    <input type="text" name="namasales" class="form-control" id="namasales" readonly value="<?php echo $penjualan->namasales ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pembayaran</label>
                  <div class="col-sm-10">
                    <input type="text" name="jenispembayaran" class="form-control" id="jenispembayaran" readonly value="<?php echo $penjualan->jenispembayaran ?>">
                  </div>
                </div>
                <?php //} ?>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Voucher</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" id="kodevoucher" name="kodevoucher" style="width: 100%;">
                      <option value="">--Pilih--</option>
                      <?php foreach ($voucher as $voucher) { ?>
                        <option value="<?php echo $voucher->id_voucher ?>"><?php echo $voucher->kodevoucher ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Voucher</label>
                  <div class="col-sm-10">
                    <textarea name="namavoucher" class="form-control" id="namavoucher" readonly></textarea>
                  </div>
                </div>
                </div>
                <!-- /.box-body -->
                <!-- /.box-footer -->
            </div>
            <!-- <div class="box box-danger">
            <div class="col-xs-18">
              
              <p class="lead" style="text-align: center;"><b> Sub Total</b> </p>

              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Sub Total</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="subtotalbawah" readonly value="0">
                    <input type="hidden" class="form-control" name="subtotalbawahrupiah" id="subtotalbawahrupiah">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Diskon</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="diskonbawah" name="diskonbawah" value=""  onkeyup="Calculate_total()">
                    <span id="nilaidiskonbawah"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Biaya Kirim</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="biayalain" name="biayalain" value=""  onkeyup="Calculate_total()">
                  </div>
                </div>
              </div> -->
            </div>
            <!-- /.box-body -->
          </div>
          </form>
        </div>
      </div>
    </section>
          <!-- general form elements -->
              
        <!--/.col (left) -->
        <!-- right column -->
        
  </div>
    