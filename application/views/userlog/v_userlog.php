<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Log
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('C_User/userlog'); ?>">Setting</a></li>
        <li class="active">User Log</li>
      </ol>
    </section>
    <div class="box-body">
    <?php if ($this->session->flashdata('SUCCESS')) { ?>
       <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fa fa-check"></i> Success!</h5>
          Data berhasil di perbarui.
        </div>                 
      <?php } ?>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User Log</h3>
            </div>

            <div class="box-header">
              <a href="<?php echo site_url('C_User/hapusalllog'); ?>"><button type="button" class="btn btn-warning" >Hapus All</button></a>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal dan waktu</th>
                  <th>Nama</th>
                  <th>Menu</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($user as $user) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $user->waktu; ?></td>
                  <td><?php echo $user->nama; ?></td>
                  <?php if($user->id_submenu != '0'){
                      $submenus = $this->db->query("select * from tb_submenu INNER JOIN tb_menu on tb_submenu.id_submenu = tb_menu.id_submenu where tb_submenu.id_menu = '$user->id_submenu'"); 
                      foreach ($submenus->result() as $submenu) { ?>
                        <td><?php echo $submenus->menu.' - '.$submenus->submenu; ?></td>
                      <?php }  
                  } ?>
                  <td><?php echo 'LOGIN'; ?></td>
                  <td><?php echo $user->ket; ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="<?php echo site_url('C_User/hapuslog/'.$user->id_user); ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
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