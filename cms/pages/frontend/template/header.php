<?php
session_start();
if ($_SESSION['id'] == "") header("Location:../signin");
include '../../connection/connection.php';
$sql = "select * from users where user_id='" . $_SESSION['id'] . "'";
$result = mysqli_query($conn, $sql);
$usernames = "";
$photo = "";
$access_level = "";
$province = "";
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $usernames = $row["username"];
    $photo = $row["photo"];
    $access_level = $row["access_level"];
    $province = $row["province"];
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project Management and Notification System</title>

  <link href="../../uploads/logo.png" rel="icon">
  <link href="../../uploads/logo.png" rel="apple-touch-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/highcharts/highcharts.css">

  <!-- Highcharts -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/modules/drilldown.js"></script>

  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

  <style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

/* Body styling */
body {
  background-color: #eeeeee;
  font-family: 'Open Sans', serif;
}

/* Container styling */
.container {
  margin-top: 5px;
  margin-bottom: 10px;
}

/* Track styling */
.track {
  position: relative;
  background-color: #ddd;
  height: 7px;
  display: flex;
  margin-bottom: 60px;
  margin-top: 50px;
}

.track .step {
  flex-grow: 1;
  width: 25%;
  margin-top: -18px;
  text-align: center;
  position: relative;
}

/* Modify active step to be green */
.track .step.active:before {
  background: #4CAF50; /* Green color */
}

.track .step::before {
  height: 7px;
  position: absolute;
  content: "";
  width: 100%;
  left: 0;
  top: 18px;
}

/* Modify icon color for active step to be green */
.track .step.active .icon {
  background: #4CAF50; /* Green color */
  color: #fff;
}

.track .icon {
  display: inline-block;
  width: 40px;
  height: 40px;
  line-height: 40px;
  position: relative;
  border-radius: 100%;
  background: #ddd;
}

/* Modify text color for active step to be dark */
.track .step.active .text {
  font-weight: 400;
  color: #000;
}

.track .text {
  display: block;
  margin-top: 7px;
}

/* Itemside styling */
.itemside {
  position: relative;
  display: flex;
  width: 100%;
}

.itemside .aside {
  position: relative;
  flex-shrink: 0;
}

.img-sm {
  width: 80px;
  height: 80px;
  padding: 7px;
}

ul.row, ul.row-sm {
  list-style: none;
  padding: 0;
}

.itemside .info {
  padding-left: 15px;
  padding-right: 7px;
}

.itemside .title {
  display: block;
  margin-bottom: 5px;
  color: #212529;
}

</style>



</head>

<body class="hold-transition sidebar-mini" 
<?php 
      if (isset($_GET['s']) && $_GET['s'] == '1') { 
          echo "onload='successEdit()'";
      } 
      ?>
>
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge"></span>
          </a>

        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge"></span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index.php" class="brand-link">
        <img src="../../uploads/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PMNS</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= "../../uploads/" . $photo; ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $usernames; ?> - <?php if($_SESSION['level']==0){ echo 'ADMIN'; } elseif($_SESSION['level']==1){ echo 'RO'; }else{ echo 'PSTO';} ?></a>
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
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="../../../cms" class="nav-link <?php if ($page == 'dashboard') {
                                                        echo "active";
                                                      } ?>"><i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <?php if($_SESSION['level']==1 ||$_SESSION['level']==0){ ?>
            <li class="nav-item menu-<?php if ($page == 'add_cestproj' || $page == 'add_giaproj' || $page == 'add_setupproj' || $page == 'add_sscpproj' || $page == 'add_training' || $page == 'add_consultancy') {
                                        echo "open";
                                      } else {
                                        echo "close";
                                      } ?>">
              <a href="#" class="nav-link <?php if ($page == 'add_cestproj' || $page == 'add_giaproj' || $page == 'add_setupproj' || $page == 'add_sscpproj' || $page == 'add_training' || $page == 'add_consultancy') {
                                            echo "active";
                                          } ?>">
                <i class="nav-icon fas fa-file-upload"></i>
                <p>
                  Enrollment
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="giacest_proj.php" class="nav-link <?php if ($page == 'add_giaproj') {
                                                                echo "active";
                                                              } ?>">
                    <i class="far fa-circle nav-icon">
                    </i> GIA
                  </a>
                </li>
                <li class="nav-item">
                  <a href="setup_proj.php" class="nav-link <?php if ($page == 'add_setupproj') {
                                                              echo "active";
                                                            } ?>"">
                    <i class=" far fa-circle nav-icon">
                    </i> SETUP
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cest_proj.php" class="nav-link <?php if ($page == 'add_cestproj') {
                                                            echo "active";
                                                          } ?>">
                    <i class="far fa-circle nav-icon">
                    </i> CEST
                  </a>
                </li>
                <li class="nav-item">
                  <a href="sscp_proj.php" class="nav-link <?php if ($page == 'add_sscpproj') {
                                                            echo "active";
                                                          } ?>">
                    <i class="far fa-circle nav-icon">
                    </i> SSCP
                  </a>
                </li>
                <li class="nav-item">
                  <a href="add_training.php" class="nav-link <?php if ($page == 'add_training') {
                                                                echo "active";
                                                              } ?>"><i class="far fa-circle nav-icon"></i>
                    <p>Technology Training</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="add_consultancy.php" class="nav-link <?php if ($page == 'add_consultancy') {
                                                                  echo "active";
                                                                } ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Consultancy</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php } ?>
            <li class="nav-item menu-<?php if ($page == 'gia_masterlist' || $page == 'setup_masterlist' || $page == 'cest_masterlist' || $page == 'sscp_masterlist' || $page == 'training_masterlist' || $page == 'consultancy_masterlist') { echo "open"; } else { echo "close"; } ?>">
      <a href="#" class="nav-link <?php if ($page == 'gia_masterlist' || $page == 'setup_masterlist' || $page == 'cest_masterlist' || $page == 'sscp_masterlist' || $page == 'training_masterlist' || $page == 'consultancy_masterlist') { echo "active"; } ?>">
        <i class="nav-icon fas fa-list-alt"></i>
        <p>Masterlist <i class="right fas fa-angle-left"></i></p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="gia_masterlist.php" class="nav-link <?php if ($page == 'gia_masterlist') { echo "active"; } ?>">
            <i class="far fa-circle nav-icon"></i> GIA
          </a>
        </li>
        <li class="nav-item">
          <a href="setup_masterlist.php" class="nav-link <?php if ($page == 'setup_masterlist') { echo "active"; } ?>">
            <i class="far fa-circle nav-icon"></i> SETUP
          </a>
        </li>
        <li class="nav-item">
          <a href="cest_masterlist.php" class="nav-link <?php if ($page == 'cest_masterlist') { echo "active"; } ?>">
            <i class="far fa-circle nav-icon"></i> CEST
          </a>
        </li>
        <li class="nav-item">
          <a href="sscp_masterlist.php" class="nav-link <?php if ($page == 'sscp_masterlist') { echo "active"; } ?>">
            <i class="far fa-circle nav-icon"></i> SSCP
          </a>
        </li>
        <li class="nav-item">
          <a href="training_masterlist.php" class="nav-link <?php if ($page == 'training_masterlist') { echo "active"; } ?>">
            <i class="far fa-circle nav-icon"></i> Technology Training
          </a>
        </li>
        <li class="nav-item">
          <a href="consultancy_masterlist.php" class="nav-link <?php if ($page == 'consultancy_masterlist') { echo "active"; } ?>">
            <i class="far fa-circle nav-icon"></i> Consultancy
          </a>
        </li>
      </ul>
    </li>
            <!-- <li class="nav-item">
              <a href="project_monitoring.php" class="nav-link <?php if ($page == 'project_monitoring') {
                                                                  echo "active";
                                                                } ?>">
                <i class="nav-icon fas fa-bullseye"></i>
                <p>
                  Monitoring
                </p>
              </a>
            </li> -->


            <li class="nav-item menu-<?php if ($page == "gia_monitoring" || $page == "setup_monitoring" || $page == "cest_monitoring" || $page == "sscp_monitoring") {
                                        echo "open";
                                      } else {
                                        echo "close";
                                      } ?>">
              <a href="#" class="nav-link <?php if ($page == "gia_monitoring" || $page == "setup_monitoring" || $page == "cest_monitoring" || $page == "sscp_monitoring") {
                                            echo "active";
                                          } ?>">
                <i class="nav-icon fas fa-bullseye"></i>
                <p>
                  Monitoring
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="gia_monitoring.php" class="nav-link <?php if ($page == 'gia_monitoring') {
                                                                  echo 'active';
                                                                } ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>GIA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="setup_monitoring.php" class="nav-link <?php if ($page == 'setup_monitoring') {
                                                                    echo "active";
                                                                  } ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>SETUP</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cest_monitoring.php" class="nav-link <?php if ($page == 'cest_monitoring') {
                                                                  echo "active";
                                                                } ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>CEST</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="sscp_monitoring.php" class="nav-link <?php if ($page == 'sscp_monitoring') {
                                                                  echo "active";
                                                                } ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>SSCP</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="signout.php" class="nav-link btn-danger">
                <i class="nav-icon fas fa-power-off"></i>
                <p>
                  Signout
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>