<?php 
require_once('php/dbHandler.php');
include('php/session.php');
// Card Data
$sql = "SELECT departments.dept_code,sp_index_v2.* FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code";
$total_projects = pg_query(DBCON, $sql);
$sql1 = "SELECT departments.dept_code,sp_index_v2.* FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE layers !='' and layers IS NOT NULL and created_time IS NOT NULL";
$mis_gis_data = pg_query(DBCON,$sql1);
$sql2 = "SELECT departments.dept_code,sp_index_v2.* FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE (layers = '' OR layers IS NULL) and (created_time IS NOT NULL)";
$mis_data = pg_query(DBCON, $sql2);
$sql3 = "SELECT departments.dept_code,sp_index_v2.* FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE (layers = '' OR layers IS NULL) and (created_time IS NULL)";
$no_data = pg_query(DBCON,$sql3);
// Deptartment List
$departments = array();
$department_code = array();
$sql4 = "SELECT * FROM departments order by short_name asc";
$all_dept = pg_query(DBCON, $sql4);
if(pg_num_rows($all_dept)>0){
  $raw_data = pg_fetch_all($all_dept);
  for($i = 0;$i<count($raw_data);$i++){
    $dept_code = $raw_data[$i]["dept_code"];
    $dept_name = $raw_data[$i]["short_name"];
    array_push($departments,'"'.$dept_name.'"');
    array_push($department_code,$dept_code);
  }
}
// no_data List
$no_project_data = array();
if(count($department_code)>0){
  foreach($department_code as $depts_code){
    $sql5 = "SELECT departments.dept_code,sp_index_v2.* FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE (departments.dept_code='$depts_code') and (layers = '' OR layers IS NULL) and (created_time IS NULL)";
    $get_no_data = pg_query(DBCON,$sql5);
    array_push($no_project_data,pg_num_rows($get_no_data));
  }
}
// only mis_data
$only_mis_data = array();
if(count($department_code)>0){
  foreach($department_code as $depts_code){
    $sql6 = "SELECT departments.dept_code,sp_index_v2.* FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE (departments.dept_code='$depts_code') and (layers = '' OR layers IS NULL) and (created_time IS NOT NULL)";
    $get_only_mis_data = pg_query(DBCON,$sql6);
    array_push($only_mis_data,pg_num_rows($get_only_mis_data));
  }
}

// both_mis_gis_data
$both_mis_gis_data = array();
if(count($department_code)>0){
  foreach($department_code as $depts_code){
    $sql7 = "SELECT departments.dept_code,sp_index_v2.* FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE departments.dept_code='$depts_code' and layers !='' and layers IS NOT NULL and created_time IS NOT NULL";
    $get_only_mis_data = pg_query(DBCON,$sql7);
    array_push($both_mis_gis_data,pg_num_rows($get_only_mis_data));
  }
}

// Card time overrun status
$sql8 = "SELECT departments.dept_code,sp_index_v2.* FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE present_status = '' OR present_status IS NULL";
$overdue_data = pg_query(DBCON,$sql8);
$sql9 = "SELECT departments.dept_code,sp_index_v2.* FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE present_status = 'In progress'";
$inprogress_data = pg_query(DBCON,$sql9);
$sql10 = "SELECT departments.dept_code,sp_index_v2.* FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE present_status like '%completed%'";
$completed_data = pg_query(DBCON,$sql10);
// chart overdue data
$overdue_department_data = array();
if(count($department_code)>0){
  foreach($department_code as $depts_code){
    $sql11 = "SELECT departments.dept_code,sp_index_v2.* FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE departments.dept_code='$depts_code' and (present_status = '' OR present_status IS NULL)";
    $overdue_dept_data = pg_query(DBCON,$sql11);
    array_push($overdue_department_data,pg_num_rows($overdue_dept_data));
  }
}
// chart Inprogress data
$inprogress_department_data = array();
if(count($department_code)>0){
  foreach($department_code as $depts_code){
    $sql12 = "SELECT departments.dept_code,sp_index_v2.* FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE departments.dept_code='$depts_code' and present_status = 'In progress'";
    $inprogress_dept_data = pg_query(DBCON,$sql12);
    array_push($inprogress_department_data,pg_num_rows($inprogress_dept_data));
  }
}
// chart completed data
$completed_department_data = array();
if(count($department_code)>0){
  foreach($department_code as $depts_code){
    $sql13 = "SELECT departments.dept_code,sp_index_v2.* FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE departments.dept_code='$depts_code' and present_status like '%completed%'";
    $completed_dept_data = pg_query(DBCON,$sql13);
    array_push($completed_department_data,pg_num_rows($completed_dept_data));
  }
}

// Card Updation status
$sql14 = "SELECT departments.dept_code,sp_index_v2.updated_time FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE updated_time = date_trunc('month', current_date)";
$less1 = pg_query(DBCON,$sql14);
$sql15 = "SELECT departments.dept_code,sp_index_v2.updated_time FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE updated_time >= date_trunc('month', current_date-interval '3' month) AND updated_time < date_trunc('month', current_date)";
$oneto3 = pg_query(DBCON,$sql15);
$sql16 = "SELECT departments.dept_code,sp_index_v2.updated_time FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE updated_time < date_trunc('month', current_date-interval '3' month) OR updated_time IS NULL";
$less3 = pg_query(DBCON,$sql16);
// chart less1
$less1_data = array();
if(count($department_code)>0){
  foreach($department_code as $depts_code){
    $sql17 = "SELECT departments.dept_code,sp_index_v2.updated_time FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE departments.dept_code='$depts_code' and updated_time = date_trunc('month', current_date)";
    $less1_dept_data = pg_query(DBCON,$sql17);
    array_push($less1_data,pg_num_rows($less1_dept_data));
  }
}
// chart oneto3
$oneto3_data = array();
if(count($department_code)>0){
  foreach($department_code as $depts_code){
    $sql18 = "SELECT departments.dept_code,sp_index_v2.updated_time FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE departments.dept_code='$depts_code' and updated_time >= date_trunc('month', current_date-interval '3' month) AND updated_time < date_trunc('month', current_date)";
    $oneto3_dept_data = pg_query(DBCON,$sql18);
    array_push($oneto3_data,pg_num_rows($oneto3_dept_data));
  }
}
// chart less3
$less3_data = array();
if(count($department_code)>0){
  foreach($department_code as $depts_code){
    $sql19 = "SELECT departments.dept_code,sp_index_v2.updated_time FROM departments LEFT JOIN sp_index_v2 ON departments.dept_code = sp_index_v2.dept_code WHERE departments.dept_code='$depts_code' and (updated_time < date_trunc('month', current_date-interval '3' month) OR updated_time IS NULL)";
    $less3_dept_data = pg_query(DBCON,$sql19);
    array_push($less3_data,pg_num_rows($less3_dept_data));
  }
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Major Infrastructure Projects of Tamil Nadu</title>
  <link rel="shortcut icon" type="image/png" href="images/logo2.png" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.css">
  <link rel="stylesheet" href="css/apex.css">
  <!-- map CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css">
  <link rel="stylesheet" type="text/css" href="css/olExt.css">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <!-- <img src="images/logo2.png" alt="Major Infrastructure" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Major Infrastructure</span> -->
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Projects</li>
          <li class="nav-item">
            <a href="projects.php" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                MIS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="gis_map.php" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                GIS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="search.php" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Search
              </p>
            </a>
          </li>
          <li class="nav-header">Reports</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Project Abstract
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Project Details
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Causes of Delay
              </p>
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
        <div class="row">
          <div class="col-sm-12">
            <div class="d-flex justify-content-center">
              <h4 href="#"> <img src="<?php echo DOMAIN . 'images/logo.png'; ?>" width="70" height="70" class="d-inline-block align-top" alt=""> Major Infrastructure Projects of Tamil Nadu-Dashboard <img src="<?php echo DOMAIN . 'images/logo2.png'; ?>" width="70" height="70" class="" alt="">
              </h4>
            </div>
          </div>
        </div>
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card" style="display: block !important;">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Total Projects:<span style="font-size: 1.5rem;padding-left: 10px;"><a href="<?php echo DOMAIN . 'projects.php'; ?>" style="color: #000;">
                    <?php  echo pg_num_rows($total_projects) ?>
                  </a></span></h3>
                </div>
              </div>
              <div class="card-body" style="padding-bottom: 1px !important;padding-top: 27px !important;">
                <div class="position-relative mb-4">
                    <div class="row">
                      <div class="col-xs-12 col-3">
                        <div style="padding-top: 35px;">
                          <h6>Data Availability</h6> 
                        </div>
                      </div>
                      <div class="col-xs-12 col-3">
                        <div class="small-box bg-success">
                          <div class="inner">
                            <a href="<?php echo DOMAIN . 'projects.php'; ?>" style="color: #fff;">
                              <h3><?php  echo pg_num_rows($mis_gis_data) ?></h3>
                            </a>
                            <p>Both MIS & GIS</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-3">
                        <div class="small-box bg-warning" style="color: #fff !important">
                          <div class="inner">
                            <a href="<?php echo DOMAIN . 'projects.php'; ?>" style="color: #fff;">
                              <h3><?php  echo pg_num_rows($mis_data) ?></h3>
                            </a>
                            <p>Only MIS Data</p>
                          </div>
                          <!-- <a href="#" class="small-box-footer" style="color:#fff !important">More Details <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                      </div>
                      <div class="col-xs-12 col-3">
                        <div class="small-box bg-danger">
                          <div class="inner">
                            <a href="<?php echo DOMAIN . 'projects.php'; ?>" style="color: #fff;">
                              <h3><?php  echo pg_num_rows($no_data) ?></h3>
                            </a>
                            <p>No Data</p>
                          </div>
                          <!-- <a href="#" class="small-box-footer">More Detaials <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-3">
                        <div style="padding-top: 35px;">
                          <h6>Data Updation</h6> 
                        </div>
                      </div>
                      <div class="col-xs-12 col-3">
                        <div class="small-box bg-lesser">
                          <div class="inner">
                            <a href="<?php echo DOMAIN . 'projects.php'; ?>" style="color: #fff;">
                              <h3><?php  echo pg_num_rows($less1) ?></h3>
                            </a>
                            <p> <1 Month</p>
                          </div>
                          <!-- <a href="#" class="small-box-footer">More Detaials <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                      </div>
                      <div class="col-xs-12 col-3">
                        <div class="small-box bg-onetothree">
                          <div class="inner">
                            <a href="<?php echo DOMAIN . 'projects.php'; ?>" style="color: #fff;">
                              <h3><?php  echo pg_num_rows($oneto3) ?></h3>
                            </a>
                            <p>1-3 Months</p>
                          </div>
                          <!-- <a href="#" class="small-box-footer" style="color:#fff !important">More Details <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                      </div>
                      <div class="col-xs-12 col-3">
                        <div class="small-box bg-greater">
                          <div class="inner">
                            <a href="<?php echo DOMAIN . 'projects.php'; ?>" style="color: #fff;">
                              <h3><?php  echo pg_num_rows($less3) ?></h3>
                            </a>
                            <p>>3 Months</p>
                          </div>
                          <!-- <a href="#" class="small-box-footer">More Details <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-3">
                        <div style="padding-top: 35px;">
                          <h6>Time Overrun</h6> 
                        </div>
                      </div>
                      <div class="col-xs-12 col-3">
                        <div class="small-box bg-completed">
                          <div class="inner">
                            <a href="<?php echo DOMAIN . 'projects.php'; ?>" style="color: #fff;">
                              <h3><?php  echo pg_num_rows($completed_data) ?></h3>
                            </a>
                            <p>Completed</p>
                          </div>
                          <!-- <a href="#" class="small-box-footer">More Detaials <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                      </div>
                      <div class="col-xs-12 col-3">
                        <div class="small-box bg-inprogress" style="color: #fff !important">
                          <div class="inner">
                            <a href="<?php echo DOMAIN . 'projects.php'; ?>" style="color: #fff;">
                              <h3><?php  echo pg_num_rows($inprogress_data) ?></h3>
                            </a>
                            <p>In-progress</p>
                          </div>
                          <!-- <a href="#" class="small-box-footer" style="color:#fff !important">More Details <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                      </div>
                      <div class="col-xs-12 col-3">
                        <div class="small-box bg-overdue">
                          <div class="inner">
                            <a href="<?php echo DOMAIN . 'projects.php'; ?>" style="color: #fff;">
                              <h3><?php  echo pg_num_rows($overdue_data) ?></h3>
                            </a>
                            <p>Delayed</p>
                          </div>
                          <!-- <a href="#" class="small-box-footer">More Details <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                      </div>
                    </div>  
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <div class="position-relative mb-4" style="padding-bottom: 25px;">
                  <h3 class="card-title" style="padding-bottom: 25px;">Data Availability</h3>
                  <div id="chart1">
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <div class="position-relative mb-4">
                  <h3 class="card-title">Data Updation</h3>
                  <div id="chart2">
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <div class="position-relative mb-4">
                  <h3 class="card-title">Time Overrun</h3>
                  <div id="chart3">
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        <!-- Map -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Causes Of Delay</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th style="transform: rotate(-45deg);font-size: smaller;">Department</th>
                    <th style="transform: rotate(-45deg);font-size: smaller;">Land Acquisition</th>
                    <th style="transform: rotate(-45deg);font-size: smaller;">Contractor Termination</th>
                    <th style="transform: rotate(-45deg);font-size: smaller;">Slow Work</th>
                    <th style="transform: rotate(-45deg);font-size: smaller;">Government Clearance</th>
                    <th style="transform: rotate(-45deg);font-size: smaller;">Techinical Reason</th>
                    <th style="transform: rotate(-45deg);font-size: smaller;">Court Cases</th>
                    <th style="transform: rotate(-45deg);font-size: smaller;">No LA Unit</th>
                    <th style="transform: rotate(-45deg);font-size: smaller;">Other</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Energy</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>Highways & Minor Ports</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>Housing & Urban Development</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>Industries</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>MAWS</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                    <tr>
                      <td>PWD</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                      <td>0</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                  <h3 class="card-title">
                    GIS
                  </h3>
                  <div class="card-tools">
                  <a href="gis_map.php" class="btn btn-tool btn-sm">
                    <i class="fas fa-expand"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <!-- <div id="world-map" style="height: 250px; width: 100%;"></div> -->
                <div id="map" style="height: 71vh; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy;tnega.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.1
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
<script src="assets/js/apex.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.15/lodash.min.js"></script> -->
<!-- map js -->
<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>
<script src="js/ol-popup.js"></script>
<script src="js/olExt.js"></script>
<script type="text/javascript">
      var departments = [<?php echo implode(', ', $departments); ?>];
      var no_project_data = [<?php echo implode(', ', $no_project_data); ?>];
      var only_mis_data = [<?php echo implode(', ', $only_mis_data); ?>];
      var both_mis_gis_data = [<?php echo implode(', ', $both_mis_gis_data); ?>];
      console.log(departments);
      
      var options = {
        series: [
          {
            name: 'Both MIS & GIS Data',
            data: both_mis_gis_data
          },{
            name: 'Only MIS Data',
            data: only_mis_data
          },{
            name: 'No Data',
            data: no_project_data
          } 
        ],
        colors : ['#28a745', '#ffc107','#dc3545'],
        chart: {
          type: 'bar',
          height: 350,
          stacked: true,
          toolbar: {
            show: true
          },
          zoom: {
            enabled: true
          },
          events :{
           click(event, chartContext,config) {
              // console.log(chartContext, config);
              var chart_table1 = (config.config.xaxis.categories[config.dataPointIndex]);
              // alert(chart_table1);
              location.href = "projects.php";
              // alert(config.config.series[config.seriesIndex].name);
              // alert(config.config.series[config.seriesIndex].data[config.dataPointIndex]);
            }
         }
        },
        dataLabels: {
          // enabled: true,
          // offsetY: -20,
          // style: {
          //   fontSize: '12px',
          //   colors: ["#304758"]
          // },
          // formatter: function(value, { seriesIndex, dataPointIndex, w}) {
          //   let indices = w.config.series.map((item, i) => i);
          //   indices = indices.filter(i => !w.globals.collapsedSeriesIndices.includes(i) && _.get(w.config.series, `${i}.data.${dataPointIndex}`) > 0);
          //   if (seriesIndex == _.max(indices))
          //     return w.globals.stackedSeriesTotals[dataPointIndex];
          //   return '';
          // }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
              position: 'bottom',
              offsetX: -10,
              offsetY: 0
            }
          }
        }],
        plotOptions: {
          bar: {
            borderRadius: 8,
            horizontal: true,
          },
        },
        xaxis: {
          categories: departments,
        },
        legend: {
          position: 'top',
          offsetY: 10
        },
        fill: {
          opacity: 1
        }
      };
      var chart1 = new ApexCharts(document.querySelector("#chart1"), options);
      chart1.render();
      // Updation chart
      var less1_data = [<?php echo implode(', ', $less1_data); ?>];
      var oneto3_data = [<?php echo implode(', ', $oneto3_data); ?>];
      var less3_data = [<?php echo implode(', ', $less3_data); ?>];
      
      var options = {
        series: [
          {
            name: '<1 Month',
            data: less1_data
          },{
            name: '1-3 Months',
            data: oneto3_data
          },{
            name: '>3 Months',
            data: less3_data
          } 
        ],
        colors : ['#adc178', '#a98467','#6c584c'],
        chart: {
          type: 'bar',
          height: 350,
          stacked: true,
          toolbar: {
            show: true
          },
          zoom: {
            enabled: true
          }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
              position: 'bottom',
              offsetX: -10,
              offsetY: 0
            }
          }
        }],
        plotOptions: {
          bar: {
            borderRadius: 8,
            horizontal: true,
          },
        },
        xaxis: {
          categories: departments,
        },
        legend: {
          position: 'top',
          offsetY: 20
        },
        fill: {
          opacity: 1
        }
      };
      var chart2 = new ApexCharts(document.querySelector("#chart2"), options);
      chart2.render();

      // Data Overrun status
      var overdue_department_data = [<?php echo implode(', ', $overdue_department_data); ?>];
      var inprogress_department_data = [<?php echo implode(', ', $inprogress_department_data); ?>];
      var completed_department_data = [<?php echo implode(', ', $completed_department_data); ?>];
      
      var options = {
        series: [
          {
            name: 'Completed',
            data: completed_department_data
          },{
            name: 'In-Progress',
            data: inprogress_department_data
          },{
            name: 'Delayed',
            data: overdue_department_data
          }
        ],
        colors : ['#3a86ff', '#8338ec','#ff006e'],
        chart: {
          type: 'bar',
          height: 350,
          stacked: true,
          toolbar: {
            show: true
          },
          zoom: {
            enabled: true
          }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
              position: 'bottom',
              offsetX: -10,
              offsetY: 0
            }
          }
        }],
        plotOptions: {
          bar: {
            borderRadius: 8,
            horizontal: true,
          },
        },
        xaxis: {
          categories: departments,
        },
        legend: {
          position: 'top',
          offsetY: 20
        },
        fill: {
          opacity: 1
        }
      };
      var chart3 = new ApexCharts(document.querySelector("#chart3"), options);
      chart3.render();


  // map script

var attr = '<div style="text-align: left;font-size: .5rem"><b>DISCLAIMER</b><br>Due to variations in scale, layers may not depict exact locations on OSM or Other maps; Boundaries of Cadastral Map are displayed as received from the source and are not authentic nor meant to be authentic.</div>'
var layers = [
  new ol.layer.Group({
    title: '<b style="color:#00ff21e8">Base Maps</b>',
    openInLayerSwitcher: true,
    layers: [
      new ol.layer.Tile({
        title: "OSM Map",
        baseLayer: false,
        visible: true,
        minZoom:12,
        source: new ol.source.OSM()
      }),
      new ol.layer.Tile({
        title: 'Here Satellite Map',
        visible: false,
        baseLayer: false,
        source: new ol.source.XYZ({
          url: 'https://1.aerial.maps.ls.hereapi.com/maptile/2.1/maptile/newest/satellite.day/{z}/{x}/{y}/256/png8?apiKey=IPTEDpK8mbJtwQAX-YIZRoty81BzpLwXwRHFxngkRqU',
          attributions: attr
        })
      }),
      new ol.layer.Tile({
        title: 'Here Terrain Map',
        visible: false,
        baseLayer: false,
        source: new ol.source.XYZ({
          url: 'https://1.aerial.maps.ls.hereapi.com/maptile/2.1/maptile/newest/terrain.day/{z}/{x}/{y}/256/png8?apiKey=IPTEDpK8mbJtwQAX-YIZRoty81BzpLwXwRHFxngkRqU',
          attributions: attr
        })
      }),
      new ol.layer.Tile({
        title: 'Here Map',
        visible: false,
        baseLayer: false,
        source: new ol.source.XYZ({
          url: 'https://1.base.maps.ls.hereapi.com/maptile/2.1/maptile/newest/normal.day/{z}/{x}/{y}/256/png8?apiKey=IPTEDpK8mbJtwQAX-YIZRoty81BzpLwXwRHFxngkRqU',
          attributions: attr
        })
      })
    ]
  })
];

var map = new ol.Map({
  layers: layers,
  target: 'map',
  view: new ol.View({
    center: [8781480.570496075, 1224732.6162325153],
    zoom:6.6,
  }),
});
 

 

// adding ol-ext controls
// var ctrl = new ol.control.LayerSwitcher({
//   show_progress: true,
//     reordering: false,
//   collapsed: true
// });
// map.addControl(ctrl);
var scaleLineControl = new ol.control.ScaleLine();
map.addControl(scaleLineControl);
// var fullScreenControll = new ol.control.FullScreen();
// map.addControl(fullScreenControll);
// var legend = new ol.control.Legend({
//   title: '',
//   collapsed: true
// });
// map.addControl(legend);
// legend.addRow({
//   title: '<b style="">Legend:</b><nav id="leg_end" style="min-width: 200px;"></br><nav>'
// })

var tn_wrap = new ol.layer.Tile({
  type: 'wms',
  source: new ol.source.TileWMS({
    // TODO: Change URL
    url: '<?php echo (GSURL."/".WORKSPACE."/wms"); ?>',
    params: {
      'LAYERS': 'sp_tnoutpolygon'
    },
    serverType: 'geoserver'
  }),
  displayInLayerSwitcher: false
});

var tn = new ol.layer.Tile({
  type: 'wms',
  source: new ol.source.TileWMS({
    // TODO: Change URL
    url: '<?php echo (GSURL."/".WORKSPACE."/wms"); ?>',
    params: {
      'LAYERS': 'sp_tnstate'
    },
    serverType: 'geoserver'
  }),
  displayInLayerSwitcher: false
});
var tn_dis = new ol.layer.Tile({
  type: 'wms',
  source: new ol.source.TileWMS({
    // TODO: Change URL
    url: '<?php echo (GSURL."/".WORKSPACE."/wms"); ?>',
    params: {
      'LAYERS': 'sp_district'
    },
    serverType: 'geoserver'
  }),
  displayInLayerSwitcher: false
});
// map.addLayer(tn);
map.addLayer(tn_wrap);
map.addLayer(tn_dis);

  var un = 'lat_long_5f631872eee96,overall_site_project2_5f632658b658b,site_boundary_project_5f6326590af24,sp_cmwssb_conveying,sp_cmwssb_ugt,oragadam_to_walajabath_2_5f72ddd7ea7b8,oragadam_to_walajabath_detailed_text_5f72ddd85935b,vandalur_to_oragadam_alignment_detailed_text_5f72d86213ba4,vandalur_to_oragadam_final_5f72d86287605,mrts_reproject_5f6464559b81f,madurai_orr_5f7304a90233c,madurai_text_details_5f73045836a0b,orr_central_alignment_reproject_5f64621d75be2,kilambakkam_bus_terminal_5f8d75f0eff78,sp_cmwssb_manapakkam1,sp_cmwssb_manapakkam,sp_tidco_heh,sp_tidco_heh1,sp_tidco_heh3,final_1_cwss_to_keeranur_5f5b0dd0714f1,final_1_cwss_to_keeranur_5f5b0e0e3ef91,sp_hg_medavakkam,sp_cmwssb_conveying,sp_cmwssb_ugt,sp_cmwssb_conveying,sp_cmwssb_ugt,sp_cmwssb_manali,sp_cmwssb_manali1,velachery_shape_file1_reprojected_5f69dc7f20ad1,sp_hg_omr_ecr,sp_hg_omr_ecr1234,11012020_5ffbe74a3f0bd,sp_hg_thepakulam_line,sp_hg_thepakulam_points,sp_hg_arapalayam_line,sp_hg_arapalayam_point,sp_lc_32,mullakadu_points,mullakadu_polygon,mullakadu_polylines,sp_cmwssb_chinnasekkadu1,sp_cmwssb_chinnasekkadu,sp_cmwssb_karampakkam,sp_cmwssb_karampakkam1,sp_cmwssb_conveying,sp_cmwssb_ugt,23102020_corr_phase_ii_5f97c2234a5e0,23102020_corr_phase_i_5f97c2310126d,kelambakk_shp_5f86b182d0ba8,thiruporur_shp_5f86b1833ce86,cprr_5f87df67044fa,otachathram_6007f65d10670,line_proj_5f55c138b3426,final_1_cwss_to_keeranur_5f5b0efc15c8f,sp_hg_thiruvanmaiyur2akkarai';
var ln = 'Overall Projects '
var project_layer = new ol.layer.Tile({
   id: 1,
   title: ln,
   layerName: ln,
   type: 'wms',
   legend: '<nav id="leg_1"><img src="<?php echo GSURL; ?>/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=<?php echo WORKSPACE ?>:' + un + '"<p>&nbsp' + ln + '</p></br></nav>',
   source: new ol.source.TileWMS({
     // TODO: Change URL
     url: '<?php echo (GSURL."/".WORKSPACE."/wms"); ?>',
     params: {
       'LAYERS': un
     },
     serverType: 'geoserver'
   }),
   visible: true
 });

map.addLayer(project_layer);

</script>
</body>
</html>
