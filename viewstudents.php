<?php 
require 'includes/db-inc.php';
include "includes/header.php"; 
include('includesAdmin/config.php');

if (isset($_POST['submit'])) {
	$id = trim($_POST['del_btn']);
	$sql = "DELETE from students where studentId = '$id' ";
	$query = mysqli_query($conn, $sql);

	if ($query) {
		echo "<script>alert('Student Deleted!')</script>";
	}
}
if(isset($_GET['inid'])){
	$id=$_GET['inid'];
	$status=0;
	$sql = "update students set status=:status  WHERE studentId=:id";
	$query = $dbh->prepare($sql);
	$query -> bindParam(':id',$id, PDO::PARAM_STR);
	$query -> bindParam(':status',$status, PDO::PARAM_STR);
	$query -> execute();
	header('location:viewstudents.php');
}
//code for active students
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$status=1;
	$sql = "update students set status=:status  WHERE studentId=:id";
	$query = $dbh->prepare($sql);
	$query -> bindParam(':id',$id, PDO::PARAM_STR);
	$query -> bindParam(':status',$status, PDO::PARAM_STR);
	$query -> execute();
	header('location:viewstudents.php');
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    	<meta name="description" content="" />
    	<meta name="author" content="" />
    	<title>Online Library Management System | Manage Reg Students</title>
    	<!-- BOOTSTRAP CORE STYLE  -->
    	<link href="assetsAdmin/css/bootstrap.css" rel="stylesheet" />
    	<!-- FONT AWESOME STYLE  -->
    	<link href="assetsAdmin/css/font-awesome.css" rel="stylesheet" />
    	<!-- DATATABLE STYLE  -->
    	<link href="assetsAdmin/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    	<!-- CUSTOM STYLE  -->
    	<link href="assetsAdmin/css/style.css" rel="stylesheet" />
    	<!-- GOOGLE FONT -->
    	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	</head>
	<body>
		<div class="container">
			<?php include "includes/nav.php"; ?>
			<div class="content-wrapper">
                <div class="container">
			        <div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-0 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:30px">
				        <span class="glyphicon glyphicon-book"></span>
				        <strong>Registered Students</strong>
			        </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Student ID</th>
                                                    <th>Student Name</th>
                                                    <th>Username</th>
                                                    <th class="dept">Department</th>
                                                    <th>Mobile No.</th>
											        <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $sql = "SELECT * from students";
                                                $query = $dbh -> prepare($sql);
                                                $query->execute();
                                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt=1;
                                        
                                                if($query->rowCount() > 0){
                                                    foreach($results as $result)
                                                    {?>                                      
                                                    <tr class="odd gradeX">
                                                        <td class="center"><?php echo htmlentities($cnt);?></td>
                                                        <td class="center"><?php echo htmlentities($result->matric_no);?></td>
                                                        <td class="center"><?php echo htmlentities($result->name);?></td>
                                                        <td class="center"><?php echo htmlentities($result->username);?></td>
                                                        <td class="center"><?php echo htmlentities($result->dept);?></td>
                                                        <td class="center"><?php echo htmlentities($result->phoneNumber);?></td>
												        <td class="center"><?php echo htmlentities($result->email);?></td>
                                                        <td class="center"><?php 
                                                
                                                        if($result->status==1){
                                                            echo htmlentities("Active");
                                                        }else {
                                                            echo htmlentities("Blocked");
                                                        }
                                                        ?></td>
                                                        <td class="center">
                                                            <?php if($result->status==1){?>
                                                                <a href="viewstudents.php?inid=<?php echo htmlentities($result->studentId);?>" onclick="return confirm('Are you sure you want to block this student?');"" >  <button class="btn btn-danger"> Inactive</button>
                                                                <?php } else {?>
                                                                <a href="viewstudents.php?id=<?php echo htmlentities($result->studentId);?>" onclick="return confirm('Are you sure you want to active this student?');""><button class="btn btn-primary"> Active</button> 
                                                                <?php } ?>      
                                                        </td>
                                                    </tr>
                                                <?php $cnt=$cnt+1;}} ?>                                      
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</body>
</html>

      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assetsAdmin/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assetsAdmin/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assetsAdmin/js/dataTables/jquery.dataTables.js"></script>
    <script src="assetsAdmin/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assetsAdmin/js/custom.js"></script>

</body>
</html>