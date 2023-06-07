<?php
session_start();
error_reporting(0);
require 'includes/db-inc.php';
include('includesAdmin/config.php');

if(strlen($_SESSION['alogin'])==0)
    {   
header('location:../adminlogin.php');
}
else{
    if(isset($_POST['create'])){
        $first = $_POST['first'];
        $last = $_POST['last'];
        $penname = $_POST['penname'];
        $author = $first . ' ' . $last;
        $sql = "INSERT INTO tblauthors(AuthorName, FirstName, lastName, PenName) VALUES(:author, :first, :last, :penname)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':author',$author,PDO::PARAM_STR);
        $query->bindParam(':first',$first,PDO::PARAM_STR);
        $query->bindParam(':last',$last,PDO::PARAM_STR);
        $query->bindParam(':penname',$penname,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
    
        
        if($lastInsertId){
            $_SESSION['msg']="";
            header('location:manage_author.php');
        }else{
            $_SESSION['error']="Something went wrong. Please try again";
            header('location:manage_author.php');
        }
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Author</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body><br><br><br><br><br><br>
      <!------MENU SECTION START-->
<?php include "includes/nav.php"; ?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">Category Info</div>
                        
                        <div class="panel-body">
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" name="first" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="last" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Pen Name</label>
                                    <input class="form-control" type="text" name="penname" autocomplete="off" required />
                                </div>
                                <button type="submit" name="create" class="btn btn-info">Create </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php  ?>
