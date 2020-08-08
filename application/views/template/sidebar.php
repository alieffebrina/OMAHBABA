
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">&nbsp;
          <img src="<?php echo base_url() ?>assets/images/administrator.jpg" class="img-circle" alt="User Image">
        </div>
        <p>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama');
          $id = $this->session->userdata('id_user') ?></p>
          <a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-circle text-success"></i> Online</a>
        </div></p>
      </div>
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">MAIN NAVIGATION</li> -->
        <li><a href="<?php echo site_url('Welcome'); ?>"><i class="fa fa-book"></i> <span>Dashboard</span></a></li>
        <?php foreach ($menu as $menu) { 
          $a = $menu->id_menu; 
          ?>
          <li class="treeview">
            <a href="#">
              <i class="<?php echo $menu->icon; ?>"></i> <span><?php echo $menu->menu; ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php $submenus = $this->db->query("select * from tb_akses INNER JOIN tb_submenu on tb_submenu.id_submenu = tb_akses.id_submenu where tb_submenu.id_menus = '$a' and tb_akses.view = '1' and tb_akses.id_user = $id and tb_submenu.statusmenu = 'aktif' "); 
              foreach ($submenus->result() as $submenu) { ?>
              <li><a href="<?php echo site_url($submenu->linksubmenu); ?>"><i class="fa fa-circle-o"></i> <?php echo $submenu->submenu; ?></a></li>    
              <?php } ?>    
            </ul>
          </li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>