  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Retur Penjualan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('C_returpenjualan'); ?>"><i class="fa fa-dashboard"></i> Retur Penjualan</a></li>
        <li class="active"><a href="<?php echo site_url('C_penjualan'); ?>">Transaksi Retur Penjualan</a></li>
      </ol>
    </section>
<!-- Main content -->
    <section class="content">
       <form class="form-horizontal" method="POST" action="<?php echo site_url('C_returpenjualan/tambah')?>" id='formretur'>
      <input type="hidden" id="type" value='retur'>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Retur Penjualan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">No Retur Penjualan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_returpenjualan" name="id_returpenjualan" value="<?php echo $kode; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">Tanggal Retur</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tanggalretur" name="tanggalretur" value="<?php echo date('d-m-Y')?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">No PO</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nonota" name="nonota" value="<?php echo $penjualan->id_penjualan; ?>" readonly>
                  </div>
                </div>

                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">No PO</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" id="id_penjualan" name="id_penjualan" style="width: 100%;">
                      <option value=""></option>
                      <?php //foreach ($penjualan as $penjualan) { ?>
                      <option value="<?php //echo $penjualan->id_penjualan ?>"><?php //echo $penjualan->id_penjualan ?></option>
                      <?php// } ?>
                    </select>
                  </div>
                </div> -->

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-1 control-label">Nama Pelanggan</label>
                  <div class="col-sm-10">
                    <input type="hidden" id="id_pelanggan">
                    <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $penjualan->nama; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-1 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea name="alamat" class="form-control" id="alamat" readonly><?php echo $penjualan->alamat; ?></textarea>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="ketretur" class="col-sm-1 control-label">Keterangan Retur</label>
                  <div class="col-sm-10">
                    <textarea name="ketretur" class="form-control" id="ketretur"></textarea>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-1 control-label">Nama Pengirim</label>
                  <div class="col-sm-10" id="namapengirim">
                    <input type="text" class="form-control" name="namapengirim" name="namapengirim">
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-1 control-label">Jenis Retur</label>
                  <div class="col-sm-10">
                  <input type="radio" id="nota" name="jenisretur" value="Nota" checked onclick='change_jenis()'> Nota 
                  <input type="radio" id="barang" name="jenisretur" value="Barang" onclick='change_jenis()'> Barang
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->

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
                    <th>Barcode</th>
                    <th>Barang</th>
                    <th>Kategori</th>
                    <th>Qtt Beli</th>
                    <th>Harga Beli</th> 
                    <th>Qtt Retur</th>
                  </tr>
                  </thead>
                  <tbody>
                     <?php 
                  $no=1;
                  foreach ($returpenjualan as $key=>$returpenjualan) {
                    
                    ?>

                <tr id='<?= $key?>'>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $returpenjualan->barcode; ?></td>
                  <td><?php echo $returpenjualan->barang.' / '.$returpenjualan->merk.' / '.$returpenjualan->ukuran.' '.$returpenjualan->satuan;?></td>
                  <td><?php echo $returpenjualan->kategori;?></td>
                  <td><?php echo $returpenjualan->qtt;?></td>
                  <td><?php echo $returpenjualan->harga; ?></td>
                  <td>
                    <input type='hidden' value='<?php echo $returpenjualan->satuan; ?>' name="satuan[]" >
                    <input type='hidden' value='<?php echo $returpenjualan->id_detailpenjualan ; ?>' name="id_detailpenjualan[]" >
                    <input type='hidden' value='<?php echo $returpenjualan->id_barang; ?>' name="id_barang[]" >
                    <input type='hidden' id="qtt<?= $key?>" value='<?php echo $returpenjualan->qtt; ?>'>
                    <input type='hidden' id="harga<?= $key?>" value='<?php echo $returpenjualan->harga; ?>' name="harga[]">
                    <input type="text" name="jumlahretur[]" id="jumlahretur<?= $key?>" onkeyup="hitung_retur()"></td>
                </tr>
                <?php }?>
                  </tbody>
                </table>
                <!-- &nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-default">Cancel</button>&nbsp;&nbsp;&nbsp;
                <input type="submit" class="btn btn-info " value="Simpan">&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-info ">Cetak Nota</button> -->
                
                <div id='jenisretur'>
                  <div class="form-group">
                    <h4><label for="inputEmail3" class="col-sm-1 control-label">Total</label></h4>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="subtotalbawah" readonly value="0">
                      <input type="hidden" class="form-control" name="subtotalbawahrupiah" id="subtotalbawahrupiah">
                    </div>
                  </div>

                  <div class="form-group">
                    <h4><label for="inputEmail3" class="col-sm-1 control-label">Terbilang</label></h4>
                    <div class="col-sm-12">
                      <textarea class="form-control" id="terbilang" readonly></textarea>
                    </div>
                  </div>
                </div>
                <a href="<?= site_url('C_returpenjualan');?>" class="btn btn-default pull-right">Cancel</a>
                <input type='submit' class="btn btn-info pull-right" name="simpan" value='Simpan'> &nbsp;
                <input type='submit' class="btn btn-primary pull-right" name="cetak" value='Cetak'>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- left column -->
        </div>
        <!--/.col (right) -->
      </div>

            </form>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
