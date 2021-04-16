<?php 
  require_once('php/dbHandler.php');
  include('php/session.php');
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
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style type="text/css">
    .bg-overdue{
      background-color: #ff006e !important;
    }
    .bg-overdue,
    .bg-overdue > a {
      color: #fff !important;
    }
    .bg-inprogress{
      background-color: #8338ec !important;
    }
    .bg-inprogress,
    .bg-inprogress > a {
      color: #fff !important;
    }
    .bg-completed{
      background-color: #3a86ff !important;
    }
    .bg-completed,
    .bg-completed > a {
      color: #fff !important;
    }
    .bg-greater{
      background-color: #6c584c !important;
    }
    .bg-greater,
    .bg-greater > a {
      color: #fff !important;
    }
    .bg-onetothree{
      background-color: #a98467 !important;
    }
    .bg-onetothree,
    .bg-onetothree > a {
      color: #fff !important;
    }
    .bg-lesser{
      background-color: #adc178 !important;
    }
    .bg-lesser,
    .bg-lesser > a {
      color: #fff !important;
    }
    .acc:after {
      content: '\2796'; /* Unicode character for "plus" sign (+) */
      font-size: 13px;
      color: #fff;
      float: left;
      margin-left: 5px;
    }
    .collapsed:after {
      content: "\02795"; /* Unicode character for "minus" sign (-) */
    }
    .vl:after {
      content:"";
      position: absolute;
      /*z-index: -1;*/
      top: 0;
      bottom: 0;
      left: 100%;
      border-left: 2px dotted #ff0000;
      transform: translate(-50%);
    }
  </style>
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
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Projects</li>
          <li class="nav-item">
            <a href="projects.php" class="nav-link active">
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
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- <div class="row">
          <div class="col-sm-6"></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">MIS</li>
            </ol>
          </div>
        </div> -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group vl">
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="list_type" value="all" onclick="handleClick('all');">
                            <label class="form-check-label">none</label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="list_type" value="data_avail" onclick="handleClick('data_avail');">
                            <label class="form-check-label">Data Availability</label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="list_type" value="time_overrun" onclick="handleClick('time_overrun');">
                            <label class="form-check-label">Time Overrun</label>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="list_type" value="time_overrun" onclick="handleClick('data_update');">
                            <label class="form-check-label">Data Updation</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6"> 
                    <div class="form-group">
                      <div class="row" id="data_type" style="display:none;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Department-wise Project List</h3>
                <div class="card-tools">
                  <!-- <a style="float:right;color:#000;cursor: pointer;" id="downloadAbstractReport"><i class="fas fa-download"></i></a> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                <div id="accordion">
              
                </div>
                <div class="row" id="abstractReportContent"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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
<!-- PDF -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.min.js"></script>

<script type="text/javascript">
  window.onload = checkChecked;
  function checkChecked(){
    const rbs = document.querySelectorAll('input[name="list_type"]');
    let selectedValue;
    let count = 0;
    for (const rb of rbs) {
      if (rb.checked) {
        count = 1;
        break;
      }
    }
    if(count == 0){
      $("input[name=list_type][value='all']").prop("checked",true);
    }
    for (const rb of rbs) {
      if (rb.checked) {
        selectedValue = rb.value;
        break;
      }
    }
    handleClick(selectedValue);
  }
  function handleClick(val){
    if(val == 'all'){
      $('#data_type').empty();
    }else if(val == 'data_avail'){
      $('#data_type').empty();
      let response = '<div class="col-md-4"><div class="form-check"><input class="form-check-input" type="radio" name="data_type_list" value="mis_gis"><label class="form-check-label bg-success">MIS & GIS</label></div></div><div class="col-md-4"><div class="form-check"><input class="form-check-input" type="radio" name="data_type_list" value="mis"><label class="form-check-label bg-warning">Only MIS</label></div></div><div class="col-md-4"><div class="form-check"><input class="form-check-input" type="radio" name="data_type_list" value="no_data"><label class="form-check-label bg-danger">No data</label></div></div>';
      $('#data_type').show();
      $('#data_type').html(response);
    }else if(val == 'time_overrun'){
      $('#data_type').empty();
      let response = '<div class="col-md-4"><div class="form-check"><input class="form-check-input" type="radio" name="data_type_list" value="completed"><label class="form-check-label bg-completed">Completed</label></div></div><div class="col-md-4"><div class="form-check"><input class="form-check-input" type="radio" name="data_type_list" value="in_progress"><label class="form-check-label bg-inprogress">In-Progress</label></div></div><div class="col-md-4"><div class="form-check"><input class="form-check-input" type="radio" name="data_type_list" value="delay"><label class="form-check-label bg-overdue">Delay</label></div></div>';
      $('#data_type').show();
      $('#data_type').html(response);
    }else if(val == 'data_update'){
      $('#data_type').empty();
      let response = '<div class="col-md-4"><div class="form-check"><input class="form-check-input" type="radio" name="data_type_list" value="less1"><label class="form-check-label bg-lesser">&lt;1 Month</label></div></div><div class="col-md-4"><div class="form-check"><input class="form-check-input" type="radio" name="data_type_list" value="oneto3"><label class="form-check-label bg-onetothree">1-3 Months</label></div></div><div class="col-md-4"><div class="form-check"><input class="form-check-input" type="radio" name="data_type_list" value="less3"><label class="form-check-label bg-greater">&gt;3 Months</label></div></div>';
      $('#data_type').show();
      $('#data_type').html(response);
    }
  }
</script>

<script type="text/javascript">
  $.ajax({
        url: 'php/function.php',
        type: 'POST',
        data: 'case=getReport',
        success: function (response) {
          
          var output = $.parseJSON(response);
          
          var unique_dept_name = output.filter((value, index, self) => self.map(x => x.dept_name).indexOf(value.dept_name) == index);      
          
          unique_dept_name.forEach((value, index, self) => {
            var id = value['dept_code'];
            var name = value['dept_name'];
            var hod_dept_code = value['hod_dept_code'];            
            
            var count = output.reduce(function(n, val) {
              return n + (val['dept_name'] === name);
            }, 0);
            
            var div = '<div class="card card-default"><div class="card-header"><h4 class="card-title w-100"><a class="d-block w-100 acc" data-toggle="collapse" href="#'+id+'" aria-expanded="true">'+name+'</a></h4></div><div id="'+id+'" class="collapse" data-parent="#accordion"><div class="card-body" id="'+id+'_div"><div id="'+id+'"><table class="table-bordered css-serial table-hover" id="tab_'+id+'"><tr class="text-center text-white bg-success"><th style="width:2% !important">Sno</th><th style="width:30% !important">Project Name</th><th style="width:3.8% !important">Funding Agency</th><th style="width:30%">Location(District/Taluk)</th><th style="width:30%">Updated Date</th><th style="width:3.8% !important">Project Cost</th><th style="width:3.8% !important">More Info</th></tr></table></div></div></div></div>';
            $('#accordion').append(div);
          })  
          

          var sno_i = 1;
          output.forEach((value, index, self) => {
            var dept_id = value['dept_code'];
            var hod_id = value['hod_dept_code'];
            var prj_name = value['name_of_the_project'];
            var updated_date = value['updated_date'];
            var funding_agency = value['funding_agency'];
            var project_cost = value['project_cost']+'Crores';
            var latitude = value['latitude'];
            var longitude = value['longitude'];
            var layers = value['layers'];
            var id = value['id'];
            var district_name = value['district_name'];
            var taluk_name = value['taluk_name'];
            var village_name = value['village_name'];
            if(district_name == null){
              district_name = 'nil';
            }
            if(taluk_name == null){
              taluk_name = 'nil';
            }
            if(village_name == null){
              village_name = 'nil';
            }
            var button = '<button class="btn btn-primary" onClick=ShowLayers("'+layers+'","'+latitude+'","'+longitude+'","'+id+'")>View More</button>';
            
            var div = '<tr class=""><td></td><td>'+prj_name+'</td><td>'+funding_agency+'</td><td>'+district_name+'/'+taluk_name+'</td><td>'+updated_date+'</td><td>'+project_cost+'</td><td>'+button+'</td></tr>';
            $('#tab_'+dept_id+' tr:last').after(div);
            
          })
          
        }
        
      });
</script>
<!-- Overall Report Dowload -->
<script type="text/javascript">
  $(document).ready(function() {
    $("#abstractReportContent").hide();
  });
  $("#downloadAbstractReport").click(function(){
    var dept_code = "ALL";
    var hod_code = "ALL";
    var project_id = "ALL";
    // if(dept_code == ""){
    //   $("#err-dept-name").text("Please select department name");return false;
    // }
    // if(hod_code == ""){
    //   $("#err-hod-name").text("Please select HOD name");return false;
    // }
    // if(project_id == ""){
    //   $("#err-project-name").text("Please select project name");return false;
    // }
    $.ajax({
      url: 'php/function.php',
      type: 'POST',
      data: 'case=getProjectAbstract&dId='+dept_code+'&hId='+hod_code+'&pId='+project_id,
      success: function (response) {
        $("#abstractReportContent").hide();
        $("#abstractReportContent").empty();
        // $("#hid_dept_code").val(dept_code);
        // $("#hid_dept_hod_code").val(hod_code);
        // $("#hid_project_id").val(project_id);
        // alert(response);
        var res = JSON.parse(response);
        var content = '<div class="col-sm-12"><br /><h4 style="text-align:center;">Abstract Report</h4><hr /></div>';
        for(i=0;i<res.length;i++){
          content +='<div class="col-sm-12" style="border-bottom: 1px solid black;margin:20px 0px;">';
          content += '<p><strong>Project Name:</strong> '+ res[i].project_name +'</p>';
          content += '<p><strong>Department Name:</strong> '+ res[i].department_name +'</p>';
          content += '<p><strong>Head Of Department:</strong> '+ res[i].hod_name +'</p>';
          content += '<p><strong>Implementing Agency:</strong> '+ res[i].implementing_agency +'</p>';
          content += '<p><strong>Project Description:</strong> '+ res[i].project_desc +'</p>';
          content += '<p><strong>Government Order:</strong> '+ res[i].government_orders +'</p>';
          content += '<p><strong>Funding Agency:</strong> '+ res[i].funding_agency +'</p>';
          if(res[i].project_start_date){
            var pro_start_dt = res[i].project_start_date
          }else{
            var pro_start_dt = " - ";
          }
          content += '<p><strong>Project Start Date:</strong> '+ pro_start_dt +'</p>';
          if(res[i].project_end_date){
            var pro_end_dt = res[i].project_end_date
          }else{
            var pro_end_dt = " - ";
          }
          content += '<p><strong>Project End Date:</strong> '+ pro_end_dt +'</p>';
          content += '<p><strong>Project Cost:</strong> '+ res[i].project_cost +' Cr</p>';
          function getDuration(milli){
            let minutes = Math.floor(milli / 60000);
            let hours = Math.round(minutes / 60);
            let days = Math.round(hours / 24);
            return ( (days && {value: days, unit: 'days'}) || (hours && {value: hours, unit: 'hours'}) ||{value: minutes, unit: 'minutes'}
                            )
          };
          if(res[i].project_end_date == null ){
            time_overrun = "0"
          } else if(res[i].project_end_date){
            var endDate = new Date(res[i].project_end_date);
            var todayDate = new Date();
            var timeOverRun = 0;
            if(endDate < todayDate){
              timeOverRun = getDuration(todayDate - endDate);
            }
            if(!(timeOverRun.value == undefined)){
              time_overrun = timeOverRun.value;
            }else{
              time_overrun = "0"
            }  
          }
          if(res[i].cost_overrun_reasons == null){
            cost_overrun_reasons = "0";
          }else{
            cost_overrun_reasons = res[i].cost_overrun_reasons;
          }
          if(res[i].cost_overrun == null){
            cost_overrun = "0";
          }else{
            cost_overrun = res[i].cost_overrun;
          }
          if(res[i].causes_of_delay == null){
            causes_of_delay = "None";
          }else{
            causes_of_delay = res[i].causes_of_delay;
          }
          content += '<p><strong>Project Time Overrun:</strong> '+ time_overrun +' Days</p>';
          content += '<p><strong>Project Time Overrun Reasons:</strong> '+ causes_of_delay +'</p>';
          content += '<p><strong>Project Cost Overrun:</strong> '+ cost_overrun +' Cr</p>';
          content += '<p><strong>Project Cost Overrun Reasons:</strong> '+ cost_overrun_reasons +' </p>';
          content += '<p><strong>Updated Date:</strong> '+ res[i].updated_time +'</p>';
          content += '</div>';
        }
        $("#abstractReportContent").append(content);
        $("#downloadAbstractReport").show();

        var content = $("#abstractReportContent").html();
        // var content = document.getElementById('abstractReportContent');
        // Generate the PDF.
        var opt = {
          margin:1,
          filename:     'abstract_report.pdf',
          // html2canvas:  { scale: 2 },
          jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' },
          pagebreak: { mode: 'avoid-all' }
        };
        html2pdf().set(opt).from(content).save();
      }
    });
    
  });
</script>

</body>
</html>
