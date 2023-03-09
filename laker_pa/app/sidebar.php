<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nama'].' | '.$_SESSION['level'];?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?php 
      if($_SESSION['level'] == 'superadmin'){
        include('menu/superadmin.php');
      }
      else if($_SESSION['level'] == 'admin'){
        include('menu/admin.php');
      }
      else if($_SESSION['level'] == 'petugas'){
        include('menu/petugas.php');
      }
      else if($_SESSION['level'] == 'masyarakat'){
        include('menu/masyarakat.php');
      }
      else{
        include('menu/operator.php');
      }
      ?>
      <!-- /.sidebar-menu -->
    </div>