<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Dashboard 3</title>

	<!-- select2 -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css') ?>" type="text/css"/>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PBB</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2 h-100" style="width:50px;" alt="User Image">
        </div>
        <div class="info">
          <a href="#!" class="d-block"><?= user()['username'] ?></a>
          <a href="#!" class="d-block text-sm"><?= user()['role_description'] ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
							<a href="<?php echo base_url('main/beranda'); ?>" class="nav-link active">
								<i class="fas fa-tachometer-alt nav-icon"></i>
								<p>Beranda</p>
							</a>
					</li>
          <?php if(user()['role_name'] == 'master_admin' || user()['role_name'] == 'admin_receiving' ): ?>
          <li class="nav-item has-treeview">
            <a href="#!" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <?php if(user()['role_name'] == 'master_admin'): ?>
                <!-- <li class="nav-item">
                  <a href="<?php echo base_url('main/penerimaan_bahan_baku'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Penerimaan Bahan Baku</p>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="<?php echo base_url('main/pengajuan_dp'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengajuan DP</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('main/formUser'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('main/formArea'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah Area</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('main/formHarga'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah Harga</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('main/formSuplier'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tambah Suplier</p>
                  </a>
                </li>
              <?php endif; ?>
            </ul>
            <li class="nav-item">
                <a href="<?php echo base_url('main/adminUser'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Bahan Baku</p>
                </a>
              </li>
          </li>
          <?php endif; ?>
          <?php if(user()['role_name'] == 'master_admin' || user()['role_name'] == 'sortir'): ?>
					<li class="nav-item">
							<a href="<?php echo base_url('main/sortir'); ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Sortir</p>
							</a>
					</li>
          <?php endif; ?>
          <?php if(user()['role_name'] == 'master_admin' || user()['role_name'] == 'tl_bahan_baku'): ?>
					<li class="nav-item">
                <a href="<?php echo base_url('main/aproval_tl_bb') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Approval TL BB
                    <?php
                      if(user()['role_name'] == 'master_admin') {
                        $this->db->where('tbl_daging.status', '0');
                        $this->db->join('tbl_supplier', 'tbl_supplier.kode_supplier = tbl_daging.supplier', 'left');
                        $daging = $this->db->get('tbl_daging')->result_array();
                      } else {
                        $this->db->where_in('tbl_supplier.id_area', user()['wilayah']);
                        $this->db->where('tbl_daging.status', '0');
                        $this->db->join('tbl_supplier', 'tbl_supplier.kode_supplier = tbl_daging.supplier', 'left');
                        $daging = $this->db->get('tbl_daging')->result_array();
                      }
                      $count = count($daging);
                    ?>
                    <?php if($count): ?>
                      <span class="badge badge-info right"><?= $count ?></span>
                    <?php endif; ?>
                  </p>
                </a>
          </li>
          <?php endif; ?>
          <?php if(user()['role_name'] == 'master_admin' || user()['role_name'] == 'tl_sortir'): ?>
					<li class="nav-item">
                <a href="<?php echo base_url('main/aproval_sortir') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Approval Sortir
                    <?php
                      if(user()['role_name'] == 'master_admin') {
                        $bahanbaku = $this->Main_model->getBahanBakuWithStatus('0,1');
                      } else {
                        $val = '0,1';
                        $wil = implode(',', user()['wilayah']);
                        $bahanbaku = $this->db->query(
                          "select td.*, td.keterangan as keterangan_bahan_baku, td.id as id_bahan_baku,
                          ts.id as id_sortir, ts.* from tbl_daging td
                          left join tbl_sortir ts on td.id = ts.id_bb
                          left join tbl_supplier sup on sup.kode_supplier = ts.kode_supplier
                          where ts.status in(".$val.")
                          and sup.id_area in(".$wil.")
                          and is_corection = 0
                          order by ts.id desc"
                        )->result_array();
                      }
                      $count = count($bahanbaku);
                    ?>
                    <?php if($count): ?>
                      <span class="badge badge-info right"><?= $count ?></span>
                    <?php endif; ?>
                  </p>
                </a>
          </li>
          <li class="nav-item">
							<a href="<?php echo base_url('main/sortir'); ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Sortir</p>
							</a>
					</li>
          <?php endif; ?>
          <?php if(user()['role_name'] == 'master_admin' || user()['role_name'] == 'manager_produksi'): ?>
					<li class="nav-item">
                <a href="<?php echo base_url('main/approval_produksi_bb') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Approval Produksi
                    <?php
                      if(user()['role_name'] == 'master_admin') {
                        $this->db->where('tbl_daging.status','<=', '3');
                        $this->db->join('tbl_supplier', 'tbl_supplier.kode_supplier = tbl_daging.supplier', 'left');
                        $daging = $this->db->get('tbl_daging')->result_array();
                      } else {
                        $this->db->where_in('tbl_supplier.id_area', user()['wilayah']);
                        $this->db->where('tbl_daging.status','<=', '3');
                        $this->db->join('tbl_supplier', 'tbl_supplier.kode_supplier = tbl_daging.supplier', 'left');
                        $daging = $this->db->get('tbl_daging')->result_array();
                      }
                      $count = count($daging);
                    ?>
                    <?php if($count): ?>
                      <span class="badge badge-info right"><?= $count ?></span>
                    <?php endif; ?>
                  </p>
                </a>
          </li>
          <?php endif; ?>
          <?php if(user()['role_name'] == 'master_admin' || user()['role_name'] == 'manager_produksi'): ?>
					<li class="nav-item">
                <a href="<?php echo base_url('main/approval_produksi') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Approval Produksi Sortir
                    <?php
                      if(user()['role_name'] == 'master_admin') {
                        $bahanbaku = $this->Main_model->getBahanBakuWithStatus('2');
                      } else {
                        $val = '2';
                        $wil = implode(',', user()['wilayah']);
                        $bahanbaku = $this->db->query(
                          "select td.*, td.keterangan as keterangan_bahan_baku, td.id as id_bahan_baku,
                          ts.id as id_sortir, ts.*, ts.status as status_sortir, td.status as status_daging
                          from tbl_daging td
                          left join tbl_sortir ts on td.id = ts.id_bb
                          left join tbl_supplier sup on sup.kode_supplier = ts.kode_supplier
                          where ts.status in(".$val.")
                          and sup.id_area in(".$wil.")
                          and is_corection = 0
                          order by ts.id desc"
                        )->result_array();
                      }
                      $count = count($bahanbaku);
                    ?>
                    <?php if($count): ?>
                      <span class="badge badge-info right"><?= $count ?></span>
                    <?php endif; ?>
                  </p>
                </a>
          </li>
          <?php endif; ?>
          <?php if(user()['role_name'] == 'master_admin' || user()['role_name'] == 'departement_coasting'): ?>
					<li class="nav-item">
                <a href="<?php echo base_url('main/approval_coasting') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Approval Coasting
                    <?php
                      if(user()['role_name'] == 'master_admin') {
                        $bahanbaku = $this->Main_model->getBahanBakuWithStatus('3');
                      } else {
                        $val = '3';
                        $wil = implode(',', user()['wilayah']);
                        $bahanbaku = $this->db->query(
                          "select td.*, td.keterangan as keterangan_bahan_baku, td.id as id_bahan_baku,
                          ts.id as id_sortir, ts.* from tbl_daging td
                          left join tbl_sortir ts on td.id = ts.id_bb
                          left join tbl_supplier sup on sup.kode_supplier = ts.kode_supplier
                          where ts.status in(".$val.")
                          and sup.id_area in(".$wil.")
                          and is_corection = 0
                          order by ts.id desc"
                        )->result_array();
                      }
                      $count = count($bahanbaku);
                    ?>
                    <?php if($count): ?>
                      <span class="badge badge-info right"><?= $count ?></span>
                    <?php endif; ?>
                  </p>
                </a>
          </li>
          <?php endif; ?>
          <?php if(user()['role_name'] == 'master_admin' || user()['role_name'] == 'departement_coasting'): ?>
					<li class="nav-item">
                <a href="<?php echo base_url('main/upload_coasting') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Upload Coasting
                    <?php
                      $file = $this->db->query('select * from tbl_file where status = -1')->result_array();
                      $count = count($file);
                    ?>
                    <?php if($count): ?>
                      <span class="badge badge-info right"><?= $count ?></span>
                    <?php endif; ?>
                  </p>
                </a>
          </li>
          <?php endif; ?>
          <?php if(user()['role_name'] == 'master_admin'): ?>
					<li class="nav-item">
                <a href="<?php echo base_url('main/approval_gm') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Approval GM/PBB
                    <?php
                      $bahanbaku = $this->Main_model->getBahanBakuWithStatus('4');
                      $count = count($bahanbaku);
                    ?>
                    <?php if($count): ?>
                      <!--span class="badge badge-info right"><?= $count ?></span-->
                    <?php endif; ?>
                  </p>
                </a>
          </li>
        
          <?php endif; ?>
          <?php if(user()['role_name'] == 'master_admin' || user()['role_name'] == 'general_manager' || user()['role_name'] == 'manager_pbb'): ?>
					<li class="nav-item">
                <a href="<?php echo base_url('main/file_gm') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Approval Laporan Root
                    <?php
                      $file = $this->db->query('select * from tbl_file where status = 0')->result_array();
                      $count = count($file);
                    ?>
                    <?php if($count): ?>
                      <span class="badge badge-info right"><?= $count ?></span>
                    <?php endif; ?>
                  </p>
                </a>
          </li>
          <li class="nav-item">
                <a href="<?php echo base_url('main/pengajuan_gm') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Approval Pengajuan DP
                    <?php
                      $data = $this->db->query('SELECT * FROM tbl_pengajuan WHERE status = 0')->result_array();
                      $count = count($data);
                    ?>
                    <?php if($count): ?>
                      <span class="badge badge-info right"><?= $count ?></span>
                    <?php endif; ?>
                  </p>
                </a>
          </li>
          <li class="nav-item">
                <a href="<?php echo base_url('main/file_bb') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Approval Form Bahan Baku
                    <?php
                      $data = $this->db->query('select * from tbl_file_2 where status = 0')->result_array();
                      $count = count($data);
                    ?>
                    <?php if($count): ?>
                      <span class="badge badge-info right"><?= $count ?></span>
                    <?php endif; ?>
                  </p>
                </a>
          </li>
      
					<li class="nav-item">
                <a href="<?php echo base_url('main/pengajuan_gm') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Pengajuan DP </p>
                </a>
          </li>
      
          <?php endif; ?>
          <!-- <?php if(user()['role_name'] == 'master_admin'): ?>
					<li class="nav-item">
                <a href="<?php echo base_url('main/pengajuan_mt') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Pengajuan MT </p>
                </a>
          </li>
          <?php endif; ?> -->
        
          <?php if(user()['role_name'] == 'master_admin' || user()['role_name'] == 'Audit'): ?>
					<li class="nav-item">
                <a href="<?php echo base_url('main/pengajuan_audit') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approval Pengajuan Audit </p>
                </a>
          </li>
          <?php endif; ?>
					<!-- <li class="nav-item">
                <a href="<?php echo base_url('main/memo_subsidi') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Memo Subsidi </p>
                </a>
          </li> -->
          <?php if(user()['role_name'] == 'master_admin' || user()['role_name'] == 'departement_coasting'): ?>
					<li class="nav-item">
                <a href="<?php echo base_url('main/penerimaan_bahan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penerimaan Bahan </p>
                </a>
          </li>
          <?php endif; ?>
          <?php if(user()['role_name'] == 'master_admin' || user()['role_name'] == 'admin_bahan_baku'): ?>
					<li class="nav-item">
                <a href="<?php echo base_url('main/penerimaan_bahan_admin_bb') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pelunasan </p>
                </a>
          </li>
          <li class="nav-item">
                <a href="<?php echo base_url('main/upload_bb') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Upload Bahan Baku
                    <?php
                      $data = $this->db->query('select * from tbl_file_2 where status = -1')->result_array();
                      $count = count($data);
                    ?>
                    <!-- <?php if($count): ?>
                      <span class="badge badge-info right"><?= $count ?></span>
                    <?php endif; ?> -->
                  </p>
                </a>
          </li>

          <li class="nav-item">
                <a href="<?php echo base_url('main/lap_bulananbb') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Laporan Bulanan
                    <?php
                      $data = $this->db->query('select * from tbl_file_2 where status = -1')->result_array();
                      $count = count($data);
                    ?>
                    <?php if($count): ?>
                      <span class="badge badge-info right"><?= $count ?></span>
                    <?php endif; ?>
                  </p>
                </a>
          </li>
          <?php endif; ?>
          <?php if(user()['role_name'] == 'master_admin' || user()['role_name'] == 'departement_coasting'): ?>
					<li class="nav-item">
                <a href="<?php echo base_url('main/laporan_root') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Root</p>
                </a>
          </li>
          <?php endif; ?>
					<li class="nav-item">
							<a href="<?php echo base_url('main/logout'); ?>" class="nav-link">
								<i class="nav-icon fas fa-sign-out-alt"></i>
								<p> Logout</p>
							</a>
			    </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $title ?? '' ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
		<div class="ml-3">
        

