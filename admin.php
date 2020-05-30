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
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Staff </span>portal</a>
				<ul class="nav navbar-top-links navbar-right">
					
					<li class="dropdown">
						
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
            <li class="active"><a href="admin.php?u=<?php echo $user_id;?>"><em class="fa fa-user-o">&nbsp;</em> Dashboard</a></li>
			<li><a href="index.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="admin.php?u=<?php echo $user_id;?>">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Course</h1>
			</div>
		</div>
		<section id="one">
		</section>
		<div class="panel-body">
			<div class="col-md-9">
			<div class="panel-body">
						<form class="form-horizontal" action="post_notification.php?" role="form">
							<fieldset>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Course name</label>
									<div class="col-md-9">
                                    <input type="hidden" name="user_id" value="<?=$id;?>" />
                                    <input type="hidden" name="user" value="<?=$user;?>" />
										<input class="form-control"  id ="name" type="text"  name="course_name" placeholder="Enter Course name (Eg: Lockdown challenge)" >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="message">Course Time</label>
									<div class="col-md-9">
										<input class="form-control" type="text" id="time1" name="time1" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}" title="Enter a date and time in this formart DD/MM/YYYY HH:MM:SS" placeholder="Enter course date and time in DD/MM/YYYY HH:MM:SS)" required></textarea>
									</div>
								</div> 
							
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" class="btn btn-default btn-md pull-right">Add Course</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>

			</div>
        </div>
        
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Send Notification</h1>
			</div>
		</div>
		<div class="panel-body">
			<div class="col-md-9">
			<div class="panel-body">
						<form class="form-horizontal" action="post_notification_1.php" role="form">
							<fieldset>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Notification Content</label>
									<div class="col-md-9">
                                    <input type="hidden" name="user_id" value="<?=$id;?>" />
                                    <input type="hidden" name="user" value="<?=$user;?>" />
										<input class="form-control"  id ="name" type="text"  name="content" placeholder="Enter notification content" >
									</div>
								</div>
								 <div class="form-group">
									<label class="col-md-3 control-label" for="email">Class Group</label>
									<div class="col-md-9">
										<input class="form-control" id="name" name="dept" type="text"  pattern="[a-z]{3}" title="Eg: eie (small letters)" placeholder="Department (Eg.eie or eee or etc...)">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" class="btn btn-default btn-md pull-right">Send</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>

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
</body>
</html>