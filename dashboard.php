<?php
include('dbcon.php');
$id = $_GET['u'];
$query = mysqli_query($conn, "SELECT username, password, dept FROM user where user_id='$id'");
while($row= mysqli_fetch_array($query))
{	
	$user=$row['username'];
	$user_id=$id;
	$dept=$row['dept'];        
}
mysqli_free_result($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/admin.png" type="image/icon type">
	<title>Examly - Project Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!-- <script src='course_check.php?user_id=<?php echo $user_id;?>'></script> -->
</head>
<body >
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Student </span>portal</a>
				<ul class="nav navbar-top-links navbar-right">
					
				<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="label label-pill label-danger count" style="border-radius:10px;"></span> 
						<span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
						<ul class="dropdown-menu dropdown-messages">
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="img/admin.png" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $user;?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
            <li class="active"><a href="dashboard.php?u=<?php echo $user_id;?>"><em class="fa fa-user-o">&nbsp;</em> Profile</a></li>
            <li><a href="courses.php?u=<?php echo $user_id;?>"><em class="fa fa-file-code-o">&nbsp;</em> Courses</a></li>
			<li><a href="index.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Profile</li>
			</ol>
		</div>
		
		<div class="row" style="width:400px; margin:0 auto;">
			<div class="col-lg-12" style="width:800px; margin:0 auto;">
				<h1 class="page-header">Profile</h1>
			</div>
		</div>
		<div id="getdata">
</div>
		<div class="panel-body" style="width:700px; margin:0 auto;">
			<label class="col-md-10" style="font-size:20px">Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	: <b style="color:#30a5ff;font-size:20px">&nbsp; <?php echo $user;?></b> </label>
			<ul class="divider"></ul>
			<label class="col-md-10" style="font-size:20px;align=center">Student Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b style="color:#30a5ff;font-size:20px">&nbsp; <?php echo $user_id;?></b> </label>
			<ul class="divider"></ul>
			<label class="col-md-12" style="font-size:20px">Institute name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b style="color:#30a5ff;font-size:20px"> &nbsp;&nbsp;Sri Ramakrishna Engineering College</b> </label>
			<ul class="divider"></ul>
			<label class="col-md-10" style="font-size:20px">Year &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b style="color:#30a5ff;font-size:20px">&nbsp; Final year</b> </label>
			<ul class="divider"></ul>
			<label class="col-md-10" style="font-size:20px">Department&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b style="color:#30a5ff;font-size:20px"> &nbsp;&nbsp;<?php echo $dept;?></b> </label>
			<ul class="divider"></ul>
			<label class="col-md-10" style="font-size:20px">Performance Index &nbsp;&nbsp;: <b style="color:#30a5ff;font-size:20px"> &nbsp;85%</b> </label>
			
		</div>
					<div class="col-sm-12">
			</div>
		</div>
	</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script> 
<script>

$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php?user_id=<?php echo $user_id;?>",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 load_unseen_notification();
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>
</body>
</html>