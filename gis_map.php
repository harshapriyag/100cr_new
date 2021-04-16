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
            <a href="dashboard.php" class="nav-link">
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
            <a href="gis_map.php" class="nav-link active">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                GIS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
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
              <li class="breadcrumb-item active">GIS</li>
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
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="position-relative mb-4" style="padding-bottom: 25px;">
                  <!-- <h3 class="card-title" style="padding-bottom: 25px;">GIS</h3> -->
                  <div id="map" style="height: 82vh; width: 100%;">
                    <div id="popup" class="ol-popup"> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="col-lg-5">
            <div class="card">
              <div class="card-body">
                <label>Please Select the Department</label></br>
                <select id="dept" style="width:90%"></select></br></br>
                <div id ="project" style="display:none;overflow:auto; max-height:60vh"> 

                </div>
              </div>
            </div>
          </div> -->
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
<!-- map js -->

<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>
<script src="js/ol-popup.js"></script>
<script src="js/olExt.js"></script>

<script type="text/javascript">
  var attr = '<div style="text-align: left;font-size: .5rem"><b>DISCLAIMER</b><br>Due to variations in scale, layers may not depict exact locations on OSM or Other maps; Boundaries of Cadastral Map are displayed as received from the source and are not authentic nor meant to be authentic.</div>'
  var layers = [
    new ol.layer.Group({
      title: '<b style="color:black">Base Maps</b>',
      openInLayerSwitcher: true,
      layers: [
        // new ol.layer.Tile({
        //   title: 'Here Satellite Map',
        //   visible: false,
        //   baseLayer: true,
        //   source: new ol.source.XYZ({
        //     url: 'https://1.aerial.maps.ls.hereapi.com/maptile/2.1/maptile/newest/satellite.day/{z}/{x}/{y}/256/png8?apiKey=IPTEDpK8mbJtwQAX-YIZRoty81BzpLwXwRHFxngkRqU',
        //     attributions: attr
        //   })
        // }),
        // new ol.layer.Tile({
        //   title: 'Here Terrain Map',
        //   visible: false,
        //   baseLayer: true,
        //   source: new ol.source.XYZ({
        //     url: 'https://1.aerial.maps.ls.hereapi.com/maptile/2.1/maptile/newest/terrain.day/{z}/{x}/{y}/256/png8?apiKey=IPTEDpK8mbJtwQAX-YIZRoty81BzpLwXwRHFxngkRqU',
        //     attributions: attr
        //   })
        // }),
        new ol.layer.Tile({
          title: 'Here Map',
          visible: false,
          baseLayer: true,
          source: new ol.source.XYZ({
            url: 'https://1.base.maps.ls.hereapi.com/maptile/2.1/maptile/newest/normal.day/{z}/{x}/{y}/256/png8?apiKey=IPTEDpK8mbJtwQAX-YIZRoty81BzpLwXwRHFxngkRqU',
            attributions: attr
          })
        }),
        new ol.layer.Tile({
          title: "OSM",
          baseLayer: true,
          visible: true,
          minZoom:12,
          source: new ol.source.OSM()
        })
      ]
    })
  ];
  var map = new ol.Map({
    layers: layers,
    target: 'map',
    view: new ol.View({
      center: [8781480.570496075, 1224732.6162325153],
      zoom:7,
    }),
  });
 
  // adding ol-ext controls
  var ctrl = new ol.control.LayerSwitcher({
    show_progress: true,
      reordering: false,
    collapsed: true
  });
  map.addControl(ctrl);
  var scaleLineControl = new ol.control.ScaleLine();
  map.addControl(scaleLineControl);
  var fullScreenControll = new ol.control.FullScreen();
  map.addControl(fullScreenControll);
  var legend = new ol.control.Legend({
    title: '',
    collapsed: true
  });
  map.addControl(legend);
  legend.addRow({
    title: '<b style="">Legend:</b><nav id="leg_end" style="min-width: 200px;"></br><nav>'
  })
 var pro_layer = 'lat_long_5f631872eee96,overall_site_project2_5f632658b658b,site_boundary_project_5f6326590af24,sp_cmwssb_conveying,sp_cmwssb_ugt,oragadam_to_walajabath_2_5f72ddd7ea7b8,oragadam_to_walajabath_detailed_text_5f72ddd85935b,vandalur_to_oragadam_alignment_detailed_text_5f72d86213ba4,vandalur_to_oragadam_final_5f72d86287605,mrts_reproject_5f6464559b81f,madurai_orr_5f7304a90233c,madurai_text_details_5f73045836a0b,orr_central_alignment_reproject_5f64621d75be2,kilambakkam_bus_terminal_5f8d75f0eff78,sp_cmwssb_manapakkam1,sp_cmwssb_manapakkam,sp_tidco_heh,sp_tidco_heh1,sp_tidco_heh3,final_1_cwss_to_keeranur_5f5b0dd0714f1,final_1_cwss_to_keeranur_5f5b0e0e3ef91,sp_hg_medavakkam,sp_cmwssb_conveying,sp_cmwssb_ugt,sp_cmwssb_conveying,sp_cmwssb_ugt,sp_cmwssb_manali,sp_cmwssb_manali1,velachery_shape_file1_reprojected_5f69dc7f20ad1,sp_hg_omr_ecr,sp_hg_omr_ecr1234,11012020_5ffbe74a3f0bd,sp_hg_thepakulam_line,sp_hg_thepakulam_points,sp_hg_arapalayam_line,sp_hg_arapalayam_point,sp_lc_32,mullakadu_points,mullakadu_polygon,mullakadu_polylines,sp_cmwssb_chinnasekkadu1,sp_cmwssb_chinnasekkadu,sp_cmwssb_karampakkam,sp_cmwssb_karampakkam1,sp_cmwssb_conveying,sp_cmwssb_ugt,23102020_corr_phase_ii_5f97c2234a5e0,23102020_corr_phase_i_5f97c2310126d,kelambakk_shp_5f86b182d0ba8,thiruporur_shp_5f86b1833ce86,cprr_5f87df67044fa,otachathram_6007f65d10670,line_proj_5f55c138b3426,final_1_cwss_to_keeranur_5f5b0efc15c8f,sp_hg_thiruvanmaiyur2akkarai';

var user_layers = [{
    "lyr_grp_name": "Departments",
    "uid": "5",
    "lyr_display_name": "ALL",
    "servicename": pro_layer,
    "visiblity": "t",
    "sp_label_column": null,
    "popup_field": null,
    "t_visiblity": true
  },{
    "lyr_grp_name": "Departments",
    "uid": "5",
    "lyr_display_name": "tn_out",
    "servicename": "sp_tnoutpolygon",
    "visiblity": "t",
    "sp_label_column": null,
    "popup_field": null,
    "t_visiblity": false
  },
  {
    "lyr_grp_name": "Departments",
    "uid": "5",
    "lyr_display_name": "district",
    "servicename": "sp_district",
    "visiblity": "t",
    "sp_label_column": null,
    "popup_field": null,
    "t_visiblity": false
  }
  // ,{
  //   "lyr_grp_name": "WRD Tanks",
  //   "uid": "4",
  //   "lyr_display_name": "All Tanks",
  //   "servicename": "sp_iws_pwd_tanks",
  //   "visiblity": "t",
  //   "sp_label_column": null,
  //   "popup_field": "unique_id,tank_name,village,block,taluk,district,subbasin,basin,section,division,sub_dn,circle,region,tank_type,cap_mcm,ftl_m,mwl_m,tbl_m,sto_dep_m,ayacut_ha,catch_sqkm,wat_spr_ha,no_of_weir,weir_len_m,no_sluice,low_sil_m,bund_len_m,dis_cusec,remarks,latitude,longitude",
  //   "t_visiblity": true
  // }, {
  //   "lyr_grp_name": "WRD Tanks",
  //   "uid": "6",
  //   "lyr_display_name": "System Tanks",
  //   "servicename": "sp_iws_pwd_tanks_s",
  //   "visiblity": "f",
  //   "sp_label_column": null,
  //   "popup_field": "unique_id,tank_name,village,block,taluk,district,subbasin,basin,section,division,sub_dn,circle,region,tank_type,cap_mcm,ftl_m,mwl_m,tbl_m,sto_dep_m,ayacut_ha,catch_sqkm,wat_spr_ha,no_of_weir,weir_len_m,no_sluice,low_sil_m,bund_len_m,dis_cusec,remarks,latitude,longitude",
  //   "t_visiblity": true
  //  }
   //{
  //   "lyr_grp_name": "WRD Tanks",
  //   "uid": "7",
  //   "lyr_display_name": "Non System Tanks",
  //   "servicename": "sp_iws_pwd_tanks_ns",
  //   "visiblity": "f",
  //   "sp_label_column": null,
  //   "popup_field": "unique_id,tank_name,village,block,taluk,district,subbasin,basin,section,division,sub_dn,circle,region,tank_type,cap_mcm,ftl_m,mwl_m,tbl_m,sto_dep_m,ayacut_ha,catch_sqkm,wat_spr_ha,no_of_weir,weir_len_m,no_sluice,low_sil_m,bund_len_m,dis_cusec,remarks,latitude,longitude",
  //   "t_visiblity": true
  // }
];
var output = user_layers.reverse();

function addLayer(ln, id, un, lg, label, vis, dis_in_tree, popup_field) {
  if (vis == 'f') {
    v = false;
  } else {
    v = true;
  }

  {
    var layer_legend = '<nav id="leg_' + id + '"><img src="<?php echo GSURL; ?>/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=25&HEIGHT=25&SCALE=6000000&LAYER=<?php echo WORKSPACE ?>:' + un + '"<p> ' + ln + '</p></br></nav>';


  }
  var layer = new ol.layer.Tile({
    id: id,
    title: ln,
    layerGroup: lg,
    layerName: ln,
    uniName: un,
    type: 'wms',
    label: label,
    popup_field: popup_field,
    legend: layer_legend,
    source: new ol.source.TileWMS({
      // TODO: Change URL
      url: '<?php echo (GSURL."/".WORKSPACE."/wms"); ?>',
      params: {
        'LAYERS': un
      },
      serverType: 'geoserver'
    }),
    visible: v,
    displayInLayerSwitcher: dis_in_tree,
  });
  // if (v == true) {
  //   $('#leg_end').append(layer.H.legend)
  // }
  lg_find = findBy(map.getLayerGroup(), 'title', lg);
  grp = this.lg_find.getLayers().push(layer);
}
var lg = Array.from(new Set(output.map(x => x.lyr_grp_name)));
//adding layer groups
for (i = 0; i < lg.length; i++) {
  addLayerGroup(lg[i]);
}
//adding layers to layer groups
for (i = 0; i < output.length; i++) {
  addLayer(output[i].lyr_display_name, output[i].uid, output[i].servicename, output[i].lyr_grp_name, output[i].sp_label_column, output[i].visiblity, output[i].t_visiblity, output[i].popup_field);
}
// function for adding layer groups
function addLayerGroup(lg) {
  var lyr_grp_name = new ol.layer.Group({
    title: lg,
    openInLayerSwitcher: true,
    layers: []
  })
  map.addLayer(lyr_grp_name)
}
//code for search in openlayers
function findBy(layer, key, value) {
  if (layer.get(key) === value) {
    return layer;
  }
  // Find recursively if it is a group
  if (layer.getLayers) {
    var layers = layer.getLayers().getArray(),
      len = layers.length,
      result;
    for (var i = 0; i < len; i++) {
      result = findBy(layers[i], key, value);
      if (result) {
        return result;
      }
    }
  }
  return null;
}

  // var tn_wrap = new ol.layer.Tile({
  //   type: 'wms',
  //   source: new ol.source.TileWMS({
  //     url: '<?php echo (GSURL."/".WORKSPACE."/wms"); ?>',
  //     params: {
  //       'LAYERS': 'sp_tnoutpolygon'
  //     },
  //     serverType: 'geoserver'
  //   }),
  //   displayInLayerSwitcher: false
  // });
  // var tn = new ol.layer.Tile({
  //   type: 'wms',
  //   source: new ol.source.TileWMS({
  //     url: '<?php echo (GSURL."/".WORKSPACE."/wms"); ?>',
  //     params: {
  //       'LAYERS': 'sp_tnstate'
  //     },
  //     serverType: 'geoserver'
  //   }),
  //   displayInLayerSwitcher: false
  // });
  // var tn_dis = new ol.layer.Tile({
  //   type: 'wms',
  //   source: new ol.source.TileWMS({
  //     url: '<?php echo (GSURL."/".WORKSPACE."/wms"); ?>',
  //     params: {
  //       'LAYERS': 'sp_district',
  //       'STYLES':'tn_wrap'
  //     },
  //     serverType: 'geoserver'
  //   }),
  //   displayInLayerSwitcher: false
  // });

  // var un = 'lat_long_5f631872eee96,overall_site_project2_5f632658b658b,site_boundary_project_5f6326590af24,sp_cmwssb_conveying,sp_cmwssb_ugt,oragadam_to_walajabath_2_5f72ddd7ea7b8,oragadam_to_walajabath_detailed_text_5f72ddd85935b,vandalur_to_oragadam_alignment_detailed_text_5f72d86213ba4,vandalur_to_oragadam_final_5f72d86287605,mrts_reproject_5f6464559b81f,madurai_orr_5f7304a90233c,madurai_text_details_5f73045836a0b,orr_central_alignment_reproject_5f64621d75be2,kilambakkam_bus_terminal_5f8d75f0eff78,sp_cmwssb_manapakkam1,sp_cmwssb_manapakkam,sp_tidco_heh,sp_tidco_heh1,sp_tidco_heh3,final_1_cwss_to_keeranur_5f5b0dd0714f1,final_1_cwss_to_keeranur_5f5b0e0e3ef91,sp_hg_medavakkam,sp_cmwssb_conveying,sp_cmwssb_ugt,sp_cmwssb_conveying,sp_cmwssb_ugt,sp_cmwssb_manali,sp_cmwssb_manali1,velachery_shape_file1_reprojected_5f69dc7f20ad1,sp_hg_omr_ecr,sp_hg_omr_ecr1234,11012020_5ffbe74a3f0bd,sp_hg_thepakulam_line,sp_hg_thepakulam_points,sp_hg_arapalayam_line,sp_hg_arapalayam_point,sp_lc_32,mullakadu_points,mullakadu_polygon,mullakadu_polylines,sp_cmwssb_chinnasekkadu1,sp_cmwssb_chinnasekkadu,sp_cmwssb_karampakkam,sp_cmwssb_karampakkam1,sp_cmwssb_conveying,sp_cmwssb_ugt,23102020_corr_phase_ii_5f97c2234a5e0,23102020_corr_phase_i_5f97c2310126d,kelambakk_shp_5f86b182d0ba8,thiruporur_shp_5f86b1833ce86,cprr_5f87df67044fa,otachathram_6007f65d10670,line_proj_5f55c138b3426,final_1_cwss_to_keeranur_5f5b0efc15c8f,sp_hg_thiruvanmaiyur2akkarai';

  // var ln = 'All'
  // var lg = 'Departments'
  // var project_layer = new ol.layer.Tile({
  //    id: 1,
  //    title: ln,
  //    layerName: ln,
  //   layerGroup: lg,
  //    type: 'wms',
  //    legend: '<nav id="leg_1"><img src="<?php echo GSURL; ?>/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&LAYER=<?php echo WORKSPACE ?>:' + un + '"<p>&nbsp' + ln + '</p></br></nav>',
  //    source: new ol.source.TileWMS({
  //      // TODO: Change URL
  //      url: '<?php echo (GSURL."/".WORKSPACE."/wms"); ?>',
  //      params: {
  //        'LAYERS': un
  //      },
  //      serverType: 'geoserver'
  //    }),
  //    visible: true
  // });

  
  // // map.addLayer(tn);
  // map.addLayer(tn_dis);
  // map.addLayer(tn_wrap);
  // map.addLayer(project_layer);
</script>

<script type="text/javascript">
  getDept();
  function getDept() {
      $.ajax({
      url: 'php/function.php',
      type: 'POST',
      data: 'case=getBVDept',
      success: function(response) {
        var html = JSON.parse(response);
        $('#dept').html(html.html);
      }
    })
  }
  function birdViewProjects() {
    var dept = $("#dept").val();
    $.ajax({
      url: 'php/function.php',
      type: 'POST',
      data: 'dept='+ dept +'&case=birdViewProj',
      success: function(response) {
        $('#project').show();
        $('#project').html(response);
      }
    });
  }
  $("#dept").change(function() {
    if ($("#dept").val() == 'null' ) {
      map.getView().setCenter( [8781480.570496075, 1224732.6162325153]);
      map.getView().setZoom(7);
      $('#project').hide();
    }
    else if ($("#dept").val() == 'all' ) {
      map.getView().setCenter( [8781480.570496075, 1224732.6162325153]);
      map.getView().setZoom(7);
      $('#project').show();
      birdViewProjects();     
    }
    else {
      birdViewProjects();
    }
  });
  function ZoomTo(layer,lat,lon){
    var l_array = layer.split(",");
    var layer1, layer2, layer3;   
    if (l_array.length == 1) {  
      layer1 = l_array[0];
      layer2 = 'null';
      layer3 = 'null';
    }
    else if (l_array.length == 2) {
      layer1 = l_array[0];
      layer2 = l_array[1];
      layer3 = 'null';
    }
    else {
      layer1 = l_array[0];
      layer2 = l_array[1];
      layer3 = l_array[2];
    }  
    if (l_array.length > 0)  {  
      $.ajax({
        url: 'php/function.php',
        type: 'POST',
        data: 'layer1='+ layer1 + '&layer2='+ layer2 + '&layer3='+ layer3 +'&case=getAllExtent',
        success: function(response) {      
          if (response == '""') {
            map.getView().setCenter(ol.proj.transform([lon, lat], 'EPSG:4326', 'EPSG:3857'));
            map.getView().setZoom(15); 
          }
          else {  
            var zoom_extent = JSON.parse(response);
            zoom_extent = Array.from(zoom_extent.split(','), Number);
            var duration = 2000;
            let mapView = map.getView();
            var extentOfPolygon = zoom_extent;
            var resolution = mapView.getResolutionForExtent(extentOfPolygon);
            var center = ol.extent.getCenter(extentOfPolygon);
            var currentCenter = map.getView().getCenter();
            var currentResolution = map.getView().getResolution();
            var distance = Math.sqrt(Math.pow(center[0] - currentCenter[0], 2) + Math.pow(center[1] - currentCenter[1], 2));
            var maxResolution = Math.max(distance/ map.getSize()[0], currentResolution);
            var up = Math.abs(maxResolution - currentResolution);
            var down = Math.abs(maxResolution - resolution);
            var adjustedDuration = duration + Math.sqrt(up + down) * 100;

            mapView.animate({
              center: center,
              duration: adjustedDuration
            });
            mapView.animate({
              resolution: maxResolution,
              duration: adjustedDuration * up / (up + down)
            }, {
              resolution: resolution,
              duration: adjustedDuration * down / (up + down)
            });  
          }    
        }
      });
    }
    else { 
      map.getView().setCenter(ol.proj.transform([lon, lat], 'EPSG:4326', 'EPSG:3857'));
      map.getView().setZoom(15); 
    }
  }

  // Popup
  var element = document.getElementById('popup');
  var popup = new ol.Overlay.Popup();
  map.addOverlay(popup);
  
  map.on('singleclick', function(evt) {
    var iid, uid;
    if ($('#type').val() == 'null' || $('#type').val() == undefined) {
      function pop(pop_url1) {
        pop_url1 = pop_url1.substring(0, pop_url1.length - 1);
        pop_url1 = '[' + pop_url1 + ']';
        pop_url = pop_url1.replace(/&/g, '%26');
        $.ajax({
          url: 'php/getPopup1.php',
          type: 'POST',
          data: 'pop_url=' + pop_url,
          success: function(data) {
            if (data) {
              popup.show(evt.coordinate, data);
            }
          }
        });
      }
      //toggleEditor(null);
      var getPop = null;
      if (!$('.tool-toggle').hasClass('active')) {
        // Hide existing popup and reset it's offset
        // popup2.hide();
        // popup2.setOffset([0, 0]);
        var prop = '';
        //Check for visible layers
        // var layers = map.getLayers();
        var pop_url = '';
        map.getLayers().forEach(function(layer) {
          //if (layer instanceof ol.layer.Group) {
          //layer.getLayers().forEach(function(sublayer) {
          if (layer.get('type') == 'wms' && layer.get('visible') == true) {
            iid = layer.get('title');
            uid = layer.get('id');      
            pop_url = pop_url + '{"url":"' + layer.getSource().getGetFeatureInfoUrl(evt.coordinate, map.getView().getResolution(), map.getView().getProjection(), {
                'INFO_FORMAT': 'text/plain',
                'FEATURE_COUNT': 1
              }) + '","layer_name":"' + iid + '","uid":"' + uid + '"},'; 
          }
          //})
        //}   
        })
        if (pop_url != '') {
          pop(pop_url);
        }
      }
    }
  });

  function toggle_popup(table) {
    if ($('.' + table + '_tr').is(":visible") == false) {
      $('.' + table + '_tr').show();
    } else {
      $('.' + table + '_tr').hide();
    }
  }

</script>

</body>
</html>
