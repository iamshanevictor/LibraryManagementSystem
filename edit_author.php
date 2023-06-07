<?php
session_start();
error_reporting(0);
require 'includes/db-inc.php';
include('includesAdmin/config.php');

if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['update'])){
    $athrid=intval($_GET['athrid']);
    $first = $_POST['first'];
    $last = $_POST['last'];
    $penname = $_POST['penname'];
    $author = $first . ' ' . $last;
    $sql="UPDATE tblauthors SET AuthorName=:author, FirstName=:first, lastName=:last, PenName=:penname where id=:athrid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':author',$author,PDO::PARAM_STR);
    $query->bindParam(':first',$first,PDO::PARAM_STR);
    $query->bindParam(':last',$last,PDO::PARAM_STR);
    $query->bindParam(':penname',$penname,PDO::PARAM_STR);
    $query->bindParam(':athrid',$athrid,PDO::PARAM_STR);
    $query->execute();
    $_SESSION['updatemsg']="Author info updated successfully";
    header('location:manage_author.php');
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Add Author</title>
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
                        <div class="panel-heading">Author Info</div>
                        
                        <div class="panel-body">
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>First Name</label>
                                    
                                    <?php 
                                    $athrid=intval($_GET['athrid']);
                                    $sql = "SELECT * from  tblauthors where id=:athrid";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':athrid',$athrid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    
                                    if($query->rowCount() > 0){
                                        foreach($results as $result){?>   
                                        
                                        <input class="form-control" type="text" name="first" value="<?php echo htmlentities($result->FirstName);?>" required />
                                        
                                    <?php }} ?>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    
                                    <?php 
                                    $athrid=intval($_GET['athrid']);
                                    $sql = "SELECT * from  tblauthors where id=:athrid";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':athrid',$athrid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    
                                    if($query->rowCount() > 0){
                                        foreach($results as $result){?>   
                                        
                                        <input class="form-control" type="text" name="last" value="<?php echo htmlentities($result->lastName);?>" required />
                                        
                                    <?php }} ?>
                                </div>
                                <div class="form-group">
                                    <label>Pen Name</label>
                                    
                                    <?php 
                                    $athrid=intval($_GET['athrid']);
                                    $sql = "SELECT * from  tblauthors where id=:athrid";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':athrid',$athrid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    
                                    if($query->rowCount() > 0){
                                        foreach($results as $result){?>   
                                        
                                        <input class="form-control" type="text" name="penname" value="<?php echo htmlentities($result->PenName);?>" required />
                                        
                                    <?php }} ?>
                                </div>
                                <button type="submit" name="update" class="btn btn-info">Update </button>
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
<?php } ?>