 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Setting Kode
        <small>Tambah</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_Setting/vkode'); ?>">Setting</a></li>
        <li class="active">Setting Kode</li>
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
              <h3 class="box-title">Setting Kode</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo site_url('C_Setting/tambahkode')?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Modul Transaksi</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="modultransaksi" name="modultransaksi" style="width: 100%;">
                      <option value=''>Pilih</option>
                      <option value='barang'>Barang</option>
                      <option value='penjualan'>Penjualan</option>
                      <option value='Surat Jalan'>Surat Jalan</option>
                      <option value='Retur Penjualan'>Retur Penjualan</option>
                      <option value='pembelian'>Pembelian</option>
                      <option value='Retur Pembelian'>Retur Pembelian</option>
                      <!-- <option value='invoice'>Invoice</option>
                      <option value='notapembayaranpo'>Nota Pembayaran Purchase Order</option>
                      <option value='notapembayaranso'>Nota Pembayaran Sales Order</option> -->
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Format 1</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <select class="form-control select2" id="kodeformat1" name="format1" class="btn btn-warning dropdown-toggle" onchange="embuh()">
                      <option value=''>Pilih</option>
                        <option value='huruf'>Huruf</option>
                        <option value='tanggal'>Tanggal</option>
                        <option value='no'>No Urut</option>
                      </select>

                    <input type="text" class="form-control" id="texthuruf1" name="texthuruf" style="visibility:hidden">
                    </div>
                    <!-- /btn-group -->
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Format 2</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <select class="form-control select2" id="format2" name="kota" class="btn btn-warning dropdown-toggle" onchange="embuhb()">
                      <option value=''>Pilih</option>
                        <option value='huruf'>Huruf</option>
                        <option value='tanggal'>Tanggal</option>
                        <option value='no'>No Urut</option>
                      </select>

                    <input type="text" class="form-control" id="texthuruf2" name="texthuruf" style="visibility:hidden">
                    </div>
                    <!-- /btn-group -->
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Format 3</label>
                  <div class="col-sm-9">
                  <div class="input-group">
                    <div class="input-group-btn">
                      <select class="form-control select2" id="format3" name="kota" class="btn btn-warning dropdown-toggle"  onchange="embuhc()">
                      <option value=''>Pilih</option>
                        <option value='huruf'>Huruf</option>
                        <option value='tanggal'>Tanggal</option>
                        <option value='no'>No Urut</option>
                      </select>

                    <input type="text" class="form-control" id="texthuruf3" name="texthuruf" style="visibility:hidden">
                    </div>
                    <!-- /btn-group -->
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Penghubung</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="penghubung" name="penghubung" style="width: 100%;" onchange="embuhhub()">
                      <option value=''>Pilih</option>
                      <option value='-'>-</option>
                      <option value='.'>.</option>
                      <option value=''>Tanpa Penghubung</option>
                    </select>
                  </div>
                </div>           
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kode Final</label>
                  <div class="col-sm-9">
                    <div id ="kodefinal"></div>
                    <input type="text" class="form-control" id="final" name="final" >
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="col-sm-10">
                    <button type="reset" class="btn btn-default">Cancel</button>
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