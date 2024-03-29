<?php 
require 'includes/db-inc.php';
session_start();
$student_name = $_SESSION['student-username'];

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Library Management</title>
	<style type="text/css">
		thead{background-color: orange}
	</style>
</head>
<body>
<div class="container">
<!-- navbar begins -->
 <?php include "includes/nav2.php"; ?>
	
	
	

	</div>

 <div class="container " style="margin-top: 100px">
 <div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-0 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:30px">
				<span class="glyphicon glyphicon-book"></span>
				<strong>Student Profile</strong>
			</div><br><br><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>
				<!-- <a href="editstudent.php"><button class="btn btn-info" style="margin-left: 250px;margin-bottom: -100px" hidden>UPDATE PROFILE</button></a><br><br> -->
			</td>
            <div class="jumbotron" style="margin-left: -45px;">
               <table class="table table-bordered">
                    <?php 
                    $sql = "SELECT * from students where username = '$student_name'";
                    $query = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($query)) { ?>
                                 
                  <tbody style="font-family:verdana; font-size:100%;"> 
                    <tr> 
                    
                     <td style="font-weight: bold;">Name : </td>
                     <td><?php echo $row['name']; ?></td>
                     
                    </tr> 
                    <tr> 
                     
                     <td style="font-weight: bold;">Student ID No : </td>
                     <td><?php echo $row['matric_no']; ?></td>
                    </tr> 
                    <tr> 
                     
                     <td style="font-weight: bold;">Email : </td>
                     <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                     <tr> 
                    
                     <td style="font-weight: bold;">Department : </td>
                     <td><?php echo $row['dept']; ?></td>
                    </tr>
                    
                    
                    <tr>
                     
                     <td style="font-weight: bold;">Phone Number : </td>
                     <td><?php echo $row['phoneNumber']; ?></td>
                    </tr> 
                    <tr>
                    
                     <td style="font-weight: bold;">Username : </td>
                     <td><?php echo $row['username']; ?></td>
                    </tr>
					                
                 </tbody> 
                 <?php } ?>
           </table>
		   
        </div> 
    </div>
 
	<!-- Confirm delete modal begins here -->
	<div class="mod modal fade" id="popUpWindow"> 
        	<div class="modal-dialog">
        		<div class="modal-content">
        			
        			<!-- header begins here -->
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h3 class="modal-title"> Warning</h3>
        			</div>

        			<!-- body begins here -->
        			<div class="modal-body">
        				<p>Are you sure you want to delete this book?</p>
        			</div>

        			<!-- button -->
        			<div class="modal-footer ">
        				<button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-warning pull-right"  style="margin-left: 10px" class="close" data-dismiss="modal">
        					No
        				</button>&nbsp;
        				<button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-success pull-right"  class="close" data-dismiss="modal" data-toggle="modal" data-target="#info">
        					Yes
        				</button>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- Confirm delete modal ends here -->
        <!-- delete message modal starts here -->
        <div class="modal fade" id="info">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			
        			<!-- header begins here -->
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h3 class="modal-title"> Warning</h3>
        			</div>

        			<!-- body begins here -->
        			<div class="modal-body">
        				<p>Book deleted <span class="glyphicon glyphicon-ok"></span></p>
        			</div>

        		</div>
        	</div>
        </div>
        <!-- delete message modal ends here -->
        <!-- update modal begins here -->
        <div class="modal fade" id="update">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			
        			<!-- header begins here -->
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
        				<h2 class="modal-title"> Update</h2>
        			</div>

        			<!-- body begins here -->
        			<div class="modal-body">
        				<form role="form" >
        					<div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        					   <span class="input-group-addon">ID</span>
        					   <input type="Username" class="form-control" name="id" value="1" contenteditable="disabled">
        						
        					</div><br>

        					<div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        					   <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> -->
        						 <div class="form-group ">
        						      <label for="name">Announcement</label>   
        						       <textarea class="form-control" rows="3" draggable="false">
        						       </textarea>  
        						  </div> 
        						
        					</div>

        				
        				</form>
        			</div>

        			<!-- button -->
        			<div class="modal-footer">
        				<button class="col-lg-12 col-sm-12 col-xs-12 col-md-12 btn btn-success" data-target="alert">
        					UPDATE
        				</button>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- update modal ends here -->
		

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>	
</body>
</html>