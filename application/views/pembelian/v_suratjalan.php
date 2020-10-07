
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <section class="content-header">
      <h1>
        Data Surat Jalan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('C_suratjalan'); ?>"><i class="fa fa-dashboard"></i>Daftar Surat Jalan</a></li>
        <li class="active"><a href="<?php echo site_url('C_penjualan'); ?>">Transaksi Surat Jalan</a></li>
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
                  foreach ($suratjalan as $suratjalan) {
                    
                    ?>

                <tr>
                  <!-- <td><?php echo $no++; ?></td> -->
                  <td><?php echo $suratjalan->barcode; ?></td>
                  <td><?php echo $suratjalan->barang.' / '.$suratjalan->merk.' / '.$suratjalan->ukuran.' '.$suratjalan->satuan;?></td>
                  <td><?php echo $suratjalan->qtt;?></td>
                  <td><?php echo $suratjalan->diskon;?></td>
                  <td><?php echo $suratjalan->subtotal; ?></td>
                </tr>
                <?php }?>
                    </tbody>
                  
                  </table>
              
            </div>
            <br>
            <div class="box box-danger">
                <div class="col-xs-18">
                  
                      <!-- <p class="lead" style="text-align: center;"><b> Grand Total</b> </p> -->

                      <div class="box-body">

                      <a href="<?= site_url('C_suratjalan');?>" class="btn btn-default">Cancel</a> &nbsp;&nbsp;
                      <input type='submit' class="btn btn-primary" name="simpan" value='Simpan Dan Cetak'>
                      <!-- <input type='submit' class="btn btn-info" name="simpan" value='Simpan'> &nbsp;&nbsp; -->
                      
              
                      </div>
                </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
        <!-- <div class="col-md-6" style="padding-right:2px"> -->
          <form class="form-horizontal" method="POST" action="<?php echo site_url('C_suratjalan/tambah')?>" >
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Identitas Pelanggan</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
             
                <div class="box-body">

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No SJ</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_suratjalan" name="id_suratjalan" value="<?php echo $kode; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Kirim</label>
                  <div class="col-sm-10">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="datepicker form-control" id="tglkirim" name="tglkirim" value="<?php echo date('d-m-Y')?>">
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Pengirim</label>
                  <div class="col-sm-10" id="namapengirim">
                    <input type="text" class="form-control" name="namapengirim" name="namapengirim">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat Kirim</label>
                  <div class="col-sm-10" id="alamatkirim">
                    <input type="text" class="form-control" name="alamatkirim" name="alamatkirim">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Pengiriman</label>
                  <div class="col-sm-10">
                  <input type="radio" id="Dikirim" name="pengiriman" value="Dikirim"> Dikirim
                  <input type="radio" id="Diambil" name="pengiriman" value="Belum" checked> Belum dikirim
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
    