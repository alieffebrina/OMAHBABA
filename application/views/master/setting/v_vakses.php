 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hak Akses Login
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_Setting'); ?>">Setting</a></li>
        <li class="active">Hak Akses Login</li>
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
                  <?php foreach ($user as $user) { ?>
              <h1 class="box-title"><?php echo $user->nama; ?></h1> 
                  <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
                <form class="form-horizontal" method="POST" action="<?php echo site_url('C_Setting/edit')?>">
            <div class="box-body">
              <table class="table">
                <thead>
                <tr>
                  <th>Menu &nbsp; <input type="checkbox" onClick='toggle(this)'> Pilih Semua</th>
                  <!-- <th>All</th> -->
                  <th>View</th>
                  <th>Add</th>
                  <th>Edit</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no =1;
                  foreach ($akses as $akses) { ?>
                <tr>
                  <td>
                  <input type="hidden" name="id" value="<?php echo $akses->id_user ?>">
                  <input type="hidden" name="submenu[]" value="<?php echo $akses->id_submenu ?>">
                  <?php echo $akses->submenu; ?></td>
                  <td><input type="checkbox" class="icheckbox_flat-green" name="view[]" value="<?php echo $akses->id_submenu ?>" <?php if($akses->view == '1'){ echo "checked"; } ?>> </td>
                  <td><input type="checkbox" class="icheckbox_flat-green" name="add[]" value="<?php echo $akses->id_submenu ?>" <?php if($akses->add == '1'){ echo "checked"; } ?> ></td>
                  <td><input type="checkbox" class="icheckbox_flat-green"  name="edit[]" value="<?php echo $akses->id_submenu ?>" <?php if($akses->edit == '1'){ echo "checked"; } ?> ></td>
                  <td><input type="checkbox" class="icheckbox_flat-green" name="delete[]" value="<?php echo $akses->id_submenu ?>" <?php if($akses->delete == '1'){ echo "checked"; } ?> ></td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
              <button type="submit" class="btn btn-warning" name="save" >Simpan</button>
            </div>
                </form>
            <!-- /.box-body -->
          </div>
          </div>
          <!-- /.box -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <!-- <?php echo $akses->id_user.'/'.$akses->id_submenu ; ?> -->
  <!-- <?php echo $akses->id_submenu ?> -->