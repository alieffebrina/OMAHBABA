
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Barang</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" style="height: 500px">
                    <!-- Message. Default to the left -->

                  <ul class="users-list clearfix">
                    <?php foreach ($barang as $barang) { ?>
                    <li>
                      <img src="<?php echo base_url() ?>uploadgambar/administrator.jpg" alt="User Image" style='height: 100px'>
                      <a class="users-list-name" href="#"><?php echo $barang->barang ?></a>
                      <span class="users-list-date"><?php echo 'Ukuran '.$barang->ukuran ?></span>
                      <span class="users-list-date"><?php echo 'Merk '.$barang->merk ?></span>
                      <span class="users-list-date"><?php echo 'Stok '.$barang->stok ?></span>
                    </li>

                    <?php } ?>

                    <li>
                      <img src="<?php echo base_url() ?>uploadgambar/administrator.jpg" alt="User Image" style='height: 100px'>
                      <a class="users-list-name" href="#"><?php echo 'tes' ?></a>
                      <span class="users-list-date"><?php echo 'Ukuran ' ?></span>
                      <span class="users-list-date"><?php echo 'Merk ' ?></span>
                      <span class="users-list-date"><?php echo 'Stok ' ?></span>
                    </li>
                    <li>
                      <img src="<?php echo base_url() ?>uploadgambar/administrator.jpg" alt="User Image" style='height: 100px'>
                      <a class="users-list-name" href="#"><?php echo 'tes' ?></a>
                      <span class="users-list-date"><?php echo 'Ukuran ' ?></span>
                      <span class="users-list-date"><?php echo 'Merk ' ?></span>
                      <span class="users-list-date"><?php echo 'Stok ' ?></span>
                    </li>
                    <li>
                      <img src="<?php echo base_url() ?>uploadgambar/administrator.jpg" alt="User Image" style='height: 100px'>
                      <a class="users-list-name" href="#"><?php echo 'tes' ?></a>
                      <span class="users-list-date"><?php echo 'Ukuran ' ?></span>
                      <span class="users-list-date"><?php echo 'Merk ' ?></span>
                      <span class="users-list-date"><?php echo 'Stok ' ?></span>
                    </li>
                    <li>
                      <img src="<?php echo base_url() ?>uploadgambar/administrator.jpg" alt="User Image" style='height: 100px'>
                      <a class="users-list-name" href="#"><?php echo 'tes' ?></a>
                      <span class="users-list-date"><?php echo 'Ukuran ' ?></span>
                      <span class="users-list-date"><?php echo 'Merk ' ?></span>
                      <span class="users-list-date"><?php echo 'Stok ' ?></span>
                    </li>
                    <li>
                      <img src="<?php echo base_url() ?>uploadgambar/administrator.jpg" alt="User Image" style='height: 100px'>
                      <a class="users-list-name" href="#"><?php echo 'tes' ?></a>
                      <span class="users-list-date"><?php echo 'Ukuran ' ?></span>
                      <span class="users-list-date"><?php echo 'Merk ' ?></span>
                      <span class="users-list-date"><?php echo 'Stok ' ?></span>
                    </li>
                    <li>
                      <img src="<?php echo base_url() ?>uploadgambar/administrator.jpg" alt="User Image" style='height: 100px'>
                      <a class="users-list-name" href="#"><?php echo 'tes' ?></a>
                      <span class="users-list-date"><?php echo 'Ukuran ' ?></span>
                      <span class="users-list-date"><?php echo 'Merk ' ?></span>
                      <span class="users-list-date"><?php echo 'Stok ' ?></span>
                    </li>
                    <li>
                      <img src="<?php echo base_url() ?>uploadgambar/administrator.jpg" alt="User Image" style='height: 100px'>
                      <a class="users-list-name" href="#"><?php echo 'tes' ?></a>
                      <span class="users-list-date"><?php echo 'Ukuran ' ?></span>
                      <span class="users-list-date"><?php echo 'Merk ' ?></span>
                      <span class="users-list-date"><?php echo 'Stok ' ?></span>
                    </li>
                  </ul>
                    <!-- /.direct-chat-msg -->
                  </div>
                  <!-- /.direct-chat-pane -->
                </div>
                <!-- /.box-body -->
                <!-- /.box-footer-->
              </div>
          <!-- /.box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Barang</h3>
            </div>
            <div class="box-body">
              
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" placeholder="Enter ...">
                </div>
                <div class="form-group">
                  <label>Ukuran</label>
                  <input type="text" class="form-control" placeholder="Enter ..." disabled>
                </div>
                <div class="form-group">
                  <label>Merk</label>
                  <input type="text" class="form-control" placeholder="Enter ..." disabled>
                </div>
                <div class="form-group">
                  <label>Qtt</label>
                  <input type="text" class="form-control" placeholder="Enter ..." disabled>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" class="form-control" placeholder="Enter ...">
                </div>

            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->

          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Suplier</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>Nama Suplier</label>
                  <input type="text" class="form-control" placeholder="Enter ...">
                </div>
                <div class="form-group">
                  <label>Nama Toko</label>
                  <input type="text" class="form-control" placeholder="Enter ..." disabled>
                </div>

                <!-- textarea -->
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Pembelian</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Kode Barang</th>
                    <th>Barang </th>
                    <th>Qtt</th>
                    <th>Harga</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-info">Processing</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                    <td>
                      <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                      <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                    </td>
                  </tr>
                  </tbody>
                </table>

                <div class="form-group">
                  <label>Total</label>
                  <input type="text" class="form-control" placeholder="Enter ..." disabled>
                </div>
                <div class="form-group">
                  <label>Terbilang</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Simpan</a> &nbsp;
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Simpan dan Cetak</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Batal</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->