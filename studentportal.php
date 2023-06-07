<?php

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";


 if(isset($_POST['submit'])){

    $news = sanitize(trim($_POST['news']));

    $sql = "INSERT into news (announcement) values ('$news')"; 

    $query = mysqli_query($conn,$sql);
    $error = false;

       if($query){
       $error = true;
      }
      else{
        echo "<script>alert('Not successful!! Try again.');
                    </script>"; 
      }
 }

     if(isset($_POST['UpDat'])){
		$id = sanitize(trim($_POST['id']));
        $text = sanitize(trim($_POST['text']));

        $sql_up = "UPDATE news set announcement = '$text' where newsId = '$id'";
		echo mysqli_error($sql_up);
         $result = mysqli_query($conn,$sql_del);
                if ($result)
                {
                    echo "<script>
            
           
                   alert('Update successful');

         </script>";
                }
     }

     if(isset($_POST['del'])){

        $id = sanitize(trim($_POST['id']));

        $sql_del = "DELETE from news where newsId = $id"; 

        $result = mysqli_query($conn,$sql_del);
                if ($result)
                {

                }
     }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="flickity/flickity.css">
	<script type="text/javascript" src="flickity/flickity.js"></script>
	<title>Library Management</title>

</head>
<body>
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
						<li><a href="profile.php">View Profile</a></li>
						<li><a href="borrow-student.php">Borrow Books</a></li>					
						<li><a href="fine-student.php">Fines</a></li>					
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php">Logout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<div class="container-fluid slide">
			
	  		<div class="slider">


					<div class="carousel" data-flickity='{ "autoPlay": true }'; >

						  <div class="carousel-cell" auto-play >
						  	<img src="ify/1.jpg">
						  </div>
						  <div class="carousel-cell" auto-play>
						  	<img src="ify/2.jpg">

						  </div>
						  <div class="carousel-cell" auto-play>
						  	 <img src="ify/3.jpg">
						  </div>
						  
						  <div class="carousel-cell" auto-play >
						  	<img src="ify/4.jpg">
						  </div>
						   <div class="carousel-cell" auto-play>
						  	<img src="ify/5.jpg">
						  </div>
						  <div class="carousel-cell" auto-play>
						  	<img src="ify/6.jpg">
						  </div>
					</div>
	  		</div>
		</div>

			  <!-- Default panel contents -->

		<div class="container slide2">
			<div class="panel-heading">
				<div class="row">
					<h3 class="center-block" style="font-size: 30px;">Published Announcements</h3>
				</div>
			</div>
			
			<table class="table table-bordered" style="font-size: 18px;">
				<thead>
					<tr>
						<th>NewsId</th>
						<th>Announcement</th>
					</tr>
				</thead>
			
				<?php 
				$sql2 = "SELECT * from news";
			
				$query2 = mysqli_query($conn, $sql2);
				$counter = 1;
				while ($row = mysqli_fetch_array($query2)) {  ?>
			
				<tbody >
					<td><?php echo $counter++; ?></td>
					<td><?php echo $row['announcement']; ?></td>
				</tbody>
				<?php }
				?>
				</tbody> 
			</table>
	  	</div>
	</div>
</div>

<div class="container-fluid slide3" style="background-color: #282828">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a href="#" class="thumbnail">
					<img src="ify/1.jpg">
				</a>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a href="#" class="thumbnail">
					<img src="ify/2.jpg">
				</a>
			</div>
			
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a href="#" class="thumbnail">
					<img src="ify/3.jpg">
				</a>
			</div>
			
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<a href="#" class="thumbnail">
					<img src="ify/4.jpg">
				</a>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>