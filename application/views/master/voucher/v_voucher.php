<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Voucher
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_voucher'); ?>">Data Master</a></li>
        <li class="active">Data Voucher</li>
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Voucher</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-header">
              <a href="<?php echo site_url('C_voucher/add'); ?>"><button type="button" class="btn btn-warning" >Tambah Data</button></a>
            </div>

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Voucher</th>
                  <th>Nama Voucher</th>
                  <th>Keterangan</th>
                  <th>Min. Pembelian</th>
                  <!-- <th>Tanggal Mulai</th> -->
                  <th>Tanggal Berlaku Sampai</th>
                  <th>Diskon</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($voucher as $voucher) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $voucher->kodevoucher; ?></td>
                  <td><?php echo $voucher->nama; ?></td>
                  <td><?php echo $voucher->ket; ?></td>
                  <td>Rp. <?php echo number_format($voucher->minpembelian,0,",","."); ?></td>
                  <!-- <td><?php echo $voucher->tglmulai; ?></td> -->
                  <td><?php echo $voucher->tglakhir; ?></td>
                  <td>Rp. <?php echo number_format($voucher->discount,0,",","."); ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_voucher/view/'.$voucher->id_voucher); ?>"><button type="button" class="btn btn-success"><i class="fa fa-fw fa-search"></i></button></a>
                      <a href="<?php echo site_url('C_voucher/edit/'.$voucher->id_voucher); ?>"><button type="button" class="btn btn-info"><i class="fa fa-fw fa-pencil-square-o"></i></button></a>
                      <a href="<?php echo site_url('C_voucher/hapus/'.$voucher->id_voucher); ?>" onclick="return confirm('Yakin Hapus?')"><button type="button" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button></a>
                    </div>
                  </td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>