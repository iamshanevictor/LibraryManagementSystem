<?php
session_start(); 

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";
include('includesStud/config.php');


if(isset($_POST['login'])){

	$username = sanitize(trim($_POST['username']));
	$password = md5(trim($_POST['password']));


    $sql_stud = "SELECT * from students where username='$username' AND password = '$password'";
	$query = mysqli_query($conn, $sql_stud);
	$row = mysqli_fetch_assoc($query);
	if(mysqli_num_rows($query) > 0){
		$_SESSION['student-username'] = $row['username'];
		$_SESSION['student-name'] = $row['name'];
		$_SESSION['student-matric'] = $row['matric_no'];
		header("Location:studentportal.php");
	}else {
		echo"<div class='alert alert-success alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		<strong style='text-align: center'> Wrong Username and Password.</strong>
		</div>";
	}	
}
?>

<div class="container">
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example">
					<span class="sr-only">:</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Library Management System</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
										
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="login.php">Admin Login</a></li>
					<li><a href="userlogin.php">User Login</a></li>
					<li><a href="addstudent.php">Register</a></li>
				</ul>
			</div>
		</div>
	</nav>
</div>

<div class="container"><br><br><br><br>
	<div class="container col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  ">
		<div class="jumbotron login col-lg-10 col-md-11 col-sm-12 col-xs-12">
			<!-- <div class="alert alert-success alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				  <strong>Warning!</strong> Better check yourself, you're not looking too good.
			</div> -->
			<p class="" style="text-align: center">USER LOGIN</p>

			<div class="container">
				<form class="form-horizontal" role="form" method="post" action="userlogin.php" enctype="multipart/form-data">
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="username" placeholder="Enter Username" id="username" required>
						</div>		
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password" placeholder="Enter Password" id="password" required>
						</div>		
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" name="login" class="btn btn-info">LOGIN</button> | <a href="addstudent.php">&nbsp;Not Yet Registered</a>								
						</div>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/sweetalert.min.js"></script> 
	
<?php if (isset($alert_user)) { ?>
	<script type="text/javascript">
		swal("Oops...", "You are not allowed to view this page directly...!", "error");
	</script>
<?php } ?>

</body>
</html>