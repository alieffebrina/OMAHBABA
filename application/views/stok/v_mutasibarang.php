<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Barang Mutasi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_mutasibarang'); ?>">Daftar Barang Mutasi </a></li>
        <li class="active">Lihat Data</li>
      </ol>
    </section>
   <!--  <div class="box-body">
    <?php if ($this->session->flashdata('SUKSES')) { ?>
       <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-check"></i> SUKSES!</h5>
          Data berhasil di perbarui.
        </div>                 
      <?php } ?>
    </div> -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-6" style="padding-right:7px">
        <!-- <div class="col-md-6"style="padding-right:2px"> -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Barang</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
                <div class="box-tools pull-right">
                <input type='text' class='form-control' id='search_catalog' placeholder='Ketik untuk mencari'>
              </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <!-- <div class="direct-chat-messages" style="height: 500px" > -->
              <div class='row' id='catalog'>

                <!-- <div class='col-lg-8' style="border-right: 1px solid #333;"> -->


                <?php 
                  $no=1;

                  foreach ($barang as $key=>$barang) { ?>
                  <a href="javascript:void(0)" onclick='add_to_cartmutasi(<?= $key; ?>)'>
                  <div class='col-12 col-md-6 col-lg-4' id='<?= $key; ?>'> <br>
                    <center><img src="<?php echo base_url().'/uploadgambar/'.$barang->fotobarang?>" class='img-thumbnail' style='width:100px;height:130px;'></center>
                    
                    <!-- <label>Barcode : </label>&nbsp;&nbsp;&nbsp;<?php echo $barang->barcode; ?>
                    <br>
                    <label>Tanggal Expaid : </label>&nbsp;&nbsp;&nbsp;<?php echo $barang->expaid; ?>
                    <br> -->
                    <center><?php echo $barang->merk.' / '.$barang->warna.' / '.$barang->ukuran.' '.$barang->satuan; ?></center>
                    <center>Harga : Rp. <?php echo number_format($barang->hargabeli,0,",","."); ?></center>
                    <center>Stok : <?php echo $barang->stok; ?>
                    <!-- <button type="button" class="btn btn-warning" id='butsendpenjualan' >Beli</button> --></center>
                    <input type="hidden" id="id_barang<?= $key; ?>" value="<?php echo $barang->id_barang; ?>">
                    <input type="hidden" id="barcode<?= $key; ?>" value="<?php echo $barang->barcode; ?>">
                    <input type="hidden" id="nama_barang<?= $key; ?>" value="<?php echo $barang->barang; ?>">
                    <input type="hidden" id="merk<?= $key; ?>" value="<?php echo $barang->merk; ?>">
                    <input type="hidden" id="warna<?= $key; ?>" value="<?php echo $barang->warna; ?>">
                    <input type="hidden" id="ukuran<?= $key; ?>" value="<?php echo $barang->ukuran; ?>">
                    <input type="hidden" id="satuan<?= $key; ?>" value="<?php echo $barang->satuan; ?>">
                    <input type="hidden" id="stok<?= $key; ?>" value="<?php echo $barang->stok; ?>">
                    <input type="hidden" id="cabang<?= $key; ?>" value="<?php echo $barang->id_cabang; ?>">
                    <!-- <span>Quantity : </span>&nbsp;&nbsp;&nbsp;<input class='form-control' type="text" id="qtt<?= $key; ?>" value=""> -->
                  </div>
                </a>
                  <?php }?>
                <!-- </div> -->
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class='col-lg-6'  style="padding-left:7px">
        <!-- <div class="col-md-6" style="padding-right:2px"> -->
          <form class="form-horizontal" method="POST" action="<?php echo site_url('C_mutasibarang/tambah')?>" id='formpenjualan'>
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Data Mutasi Barang</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
             
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">No Mutasi Barang</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nonota" name="nonota" value="<?php echo $kode; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">TanggalMutasi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tgl" name="tgl" value="<?php echo date('d-m-Y h:i')?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Ke Cabang</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" id="cabang" name="cabangmutasi" style="width: 100%;">
                        <option value="">--Pilih--</option>
                        <?php foreach ($cabangmutasi as $cabang1) { ?>
                        <option value="<?php echo $cabang1->id_cabang ?>"><?php echo $cabang1->namacabang ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Ke Gudang</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" id="gudang" name="gudangmutasi" style="width: 100%;">
                        <option value="">--Pilih--</option>
                        <?php foreach ($gudangmutasi as $gudang1) { ?>
                        <option value="<?php echo $gudang1->id_gudang ?>"><?php echo $gudang1->gudang ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  
                  
                  <!-- <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Status Mutasi</label>
                    <div class="col-sm-10">
                    <input type="radio" id="proses" name="statusmutasi" value="proses" checked> Proses
                    <input type="radio" id="diterima" name="statusmutasi" value="diterima"> Diterima
                    </div>
                  </div> -->
                </div>
                <!-- /.box-body -->
                <!-- /.box-footer -->
            </div>
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Keranjang Barang Mutasi</h3>

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
                      <th width='20%'><center>Barcode</center></th>
                      <th width='45%'><center>Barang</center></th>
                      <th width='25%'> <center>Qtt</center></th>
                      <!-- <th width='20%'> <center>Diskon</center></th>
                      <th width='25%'><center>Sub Total</center></th> -->
                      <th width='10%'><center></center></th>

                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  
                  </table>
                  <p>

                <div class="form-group">
                  <h4><label for="inputEmail3" class="col-sm-4 control-label">Total Barang Mutasi</label></h4>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="totalmutasi" name='totalmutasi' readonly value="0">
                  </div>
                </div>

                <!-- <div class="form-group">
                  <h4><label for="inputEmail3" class="col-sm-1 control-label">Terbilang</label></h4>
                  <div class="col-sm-12">
                    <textarea class="form-control" id="terbilang" readonly></textarea>
                  </div>
                </div> -->

                <a href="<?= site_url('C_penjualan');?>" class="btn btn-default pull-right">Cancel</a>
                <input type='submit' class="btn btn-info pull-right" name="simpan" value='Simpan'> &nbsp;
                <input type='submit' class="btn btn-primary pull-right" name="cetak" value='Cetak'>
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
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>