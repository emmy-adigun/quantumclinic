<?php 

if(isset($_GET['id']) && $_GET['id'] > 0){
  $id = $_GET['id'];
}
?>


<html>
<head>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
	<link rel="stylesheet" href="https://github.com/FortAwesome/Font-Awesome/blob/master/css/fontawesome.min.css"/>
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
      <!-- DataTables -->
  <link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/plugins/datatables-select/css/select.bootstrap4.min.css">
   <!-- Select2 -->
  <link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/dist/css/adminlte.css">
    <link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/dist/css/custom.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/plugins/summernote/summernote-bs4.min.css">
     <!-- SweetAlert2 -->
  <link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="https://quantum-site.000webhostapp.com/scheduler/plugins/fullcalendar/main.css">
    <style type="text/css">/* Chart.js */
      @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}
    </style>

     <!-- jQuery -->
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/toastr/toastr.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
  <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/moment/moment.min.js"></script>
  <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/fullcalendar/main.js"></script>
    <script>
        var _base_url_ = 'https://quantum-site.000webhostapp.com/scheduler/';
    </script>
    <script src="https://quantum-site.000webhostapp.com/scheduler/dist/js/script.js"></script>
<title>Notes</title>

<style>
.ck .ck-content{
	height:100px;
}
</style>
</head>
<body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed sidebar-mini-md sidebar-mini-xs" data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
<style>
  .user-img{
        position: absolute;
        height: 27px;
        width: 27px;
        object-fit: cover;
        left: -7%;
        top: -12%;
  }
  .btn-rounded{
        border-radius: 50px;
  }
  #comment_logs{
	  /* background-color:aliceblue; */
  }
  .bg-dark-color{
	  background-color: #fff !important;
  }
  /* Create two equal columns that floats next to each other */
.column1 {
  float: left;
  width: 60%;
  padding: 10px;
 
}
.column2 {
  float: left;
  width: 40%;
  padding: 10px;
 
}
/* Clear floats after the columns */
.rowd:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column1 {
    width: 100%;
  }
  .column2 {
    width: 100%;
  }
}
</style>
<nav class="main-header navbar navbar-expand navbar-dark border border-light border-top-0  border-left-0 border-right-0 navbar-light text-sm">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="https://quantum-site.000webhostapp.com/scheduler/" class="nav-link">Quantum Clinic - Admin</a>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
      
          <!-- Messages Dropdown Menu -->
          <li class="nav-item">
            <div class="btn-group nav-link">
                  <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
                    <span><img src="https://quantum-site.000webhostapp.com/scheduler/uploads/1624240500_avatar.png" class="img-circle elevation-2 user-img" alt="User Image"></span>
                    <span class="ml-3">Adminstrator Admin</span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="https://quantum-site.000webhostapp.com/scheduler/admin/?page=user"><span class="fa fa-user"></span> My Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="https://quantum-site.000webhostapp.com/scheduler//classes/Login.php?f=logout"><span class="fas fa-sign-out-alt"></span> Logout</a>
                  </div>
              </div>
          </li>
          <li class="nav-item">
            
          </li>
         <!--  <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.navbar -->     </style>
<!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
        <!-- Brand Logo -->
        <!-- <a href="https://quantum-site.000webhostapp.com/scheduler/admin" class="brand-link bg-primary text-sm"> -->
        <!-- <img src="https://quantum-site.000webhostapp.com/scheduler/uploads/1630631400_clinic-logo.png" alt="Store Logo" class="brand-image  elevation-3" style="opacity: .8;width: 2.5rem;height: 2.5rem;max-height: unset"> -->
        <!-- <span class="brand-text font-weight-light">Quantum Clinic</span> -->
        </a>
        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
          <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="clearfix"></div>
                <!-- Sidebar Menu -->
                <nav class="mt-4">
                   <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item dropdown">
                      <a href="https://quantum-site.000webhostapp.com/scheduler/admin/" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                        </p>
                      </a>
                    </li> 
                    <li class="nav-item dropdown">
                      <a href="https://quantum-site.000webhostapp.com/scheduler/admin/?page=appointments" class="nav-link nav-appointments">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                          Clients
                        </p>
                      </a>
                    </li>
                    
                    <!-- <li class="nav-item dropdown" >
                      <a href="https://quantum-site.000webhostapp.com/scheduler/admin/?page=schedule_settings" class="nav-link nav-schedule_settings">
                         <i class="nav-icon fas fa-calendar-day"></i>
                        <p>
                      Schedule Settings

                        </p>
                      </a>
                    </li> -->
 
                    <!-- <li class="nav-item dropdown" >
                      <a href="https://quantum-site.000webhostapp.com/scheduler/admin/?page=view_schedules" class="nav-link nav-view_schedules">
                         <i class="nav-icon fas fa-calendar-day"></i>
                        <p>
                        Scheduled List

                        </p>
                      </a>
                    </li> -->

                    <li class="nav-item dropdown">
                      <a href="https://quantum-site.000webhostapp.com/scheduler/admin/?page=service" class="nav-link nav-service">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                          Services
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="https://quantum-site.000webhostapp.com/scheduler/admin/?page=room" class="nav-link nav-room">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                          Room
                        </p>
                      </a>
                    </li>

                    <!-- <li class="nav-item dropdown">
                      <a href="https://quantum-site.000webhostapp.com/scheduler/admin/?page=corperate" class="nav-link nav-corperate">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                          Corporate
                        </p>
                      </a>
                    </li> -->
                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
      </aside>
	  <script>
    $(document).ready(function(){
      var page = 'appointments';
      var s = '';
      page = page.replace(/\//g,'_');

      if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
        if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
          $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

      }
     
    })
  </script>  

<div class="content-wrapper bg-dark-color pt-3" style="min-height: 567.854px;">
     
	 <!-- Main content -->
	 <section class="content text-dark">
	   <div class="container-fluid">
		 <!-- <h1 class="text-light">Welcome to Quantum Clinic</h1> -->

	<div id="comment_basic_info">
	</div>
	<div class="row">
	<div class="col-md-8">
	<form name="form1">       
		<textarea name="comments" placeholder="Leave Comments Here..."  class="ckeditor" style="width:635px; height:200px;">
		</textarea>
		</br></br>
		<div align="left">	
		<a href="#" onClick="commentSubmit()" class="btn btn-primary">Add Note</a>
		<a href="https://quantum-site.000webhostapp.com/scheduler/admin/?page=appointments" ><button class="btn-light btn ml-2" type="button" data-dismiss="modal">Back</button></a>
	   </div>
    </form>
	</div>
	<div class="col-md-4">
	<div id="comment_profile">
	</div>
	</div>
	</div>
 
<div class="row">
  <div class="col-md-8">
  <div id="comment_logs">
			Loading comments...
		</div>
  </div>
</div>

</div>
</section>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>



<script>

	function commentSubmit(){
		if(form1.name.value == '' && form1.comments.value == ''){ //exit if one of the field is blank
			alert('Enter your message !');
			return;
		}
		//var name = form1.name.value;
		var comments = form1.comments.value;
		
		var xmlhttp = new XMLHttpRequest(); //http request instance
		
		xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
			//	document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
			}
		}
		xmlhttp.open('GET', 'insert.php?id='+<?Php echo $id?>+'&comments='+comments, true); //open and send http request
		xmlhttp.send();
	}
	
		$(document).ready(function(e) {
			$.ajaxSetup({cache:false});
			setInterval(function() {$('#comment_logs').load('logs.php?id=<?Php echo $id?>');}, 2000);
		});

		$(document).ready(function(e) { 
			$.ajaxSetup({cache:false});
			setInterval(function() {$('#comment_profile').load('profile.php?id=<?Php echo $id?>');}, 2000);
		});

		$(document).ready(function(e) { 
			$.ajaxSetup({cache:false});
			setInterval(function() {$('#comment_basic_info').load('basic_info.php?id=<?Php echo $id?>');}, 2000);
		});
</script>
<script>

document.querySelectorAll('.ckeditor').forEach(e => {
	
  ClassicEditor
    .create(e)
    .then(editor => {
	
      editor.model.document.on('change:data', () => {
        e.value = editor.getData();
      });
	 
    })
    .catch(error => {
      console.error(error);
    });
})
</script>




<script src="https://quantum-site.000webhostapp.com/scheduler/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/sparklines/sparkline.js"></script>
    <!-- Select2 -->
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/select2/js/select2.full.min.js"></script>
    <!-- JQVMap -->
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/moment/moment.min.js"></script>
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/datatables-select/js/select.bootstrap4.min.js"></script>
    <!-- overlayScrollbars -->
    <!-- <script src="https://quantum-site.000webhostapp.com/scheduler/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
    <!-- AdminLTE App -->
    <script src="https://quantum-site.000webhostapp.com/scheduler/dist/js/adminlte.js"></script>
</body>
</html>