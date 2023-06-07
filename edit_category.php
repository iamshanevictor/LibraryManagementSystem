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
    $catid=intval($_GET['catid']);
    $category=$_POST['category'];
    $status=$_POST['status'];
    $sql="UPDATE tblcategory SET CategoryName=:category,Status=:status WHERE CatId=:catid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':category',$category,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->bindParam(':catid',$catid,PDO::PARAM_STR);
    $query->execute();
    $_SESSION['updatemsg']="Brand updated successfully";
    header('location:manage_category.php');
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Edit Categories</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<body><br><br><br><br><br><br>
<?php include "includes/nav.php"; ?>
    <div class="content-wrapper">
        <div class="content-wrapper">
            <div class="container">
                
                
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
                    <div class="panel panel-info">
                        <div class="panel-heading">Category Info</div>
                        
                        <div class="panel-body">
                            <form role="form" method="post">
                                <?php 
                                $catid=intval($_GET['catid']);
                                $sql="SELECT * from tblcategory where CatId=:catid";
                                $query=$dbh->prepare($sql);
                                $query-> bindParam(':catid',$catid, PDO::PARAM_STR);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                
                                if($query->rowCount() > 0){
                                    foreach($results as $result){
                                        ?> 
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input class="form-control" type="text" name="category" value="<?php echo htmlentities($result->CategoryName);?>" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php if($result->Status==1) {?>

                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="status" id="status" value="1" checked="checked">Active
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="status" id="status" value="0">Inactive
                                                    </label>
                                                </div>
                                                <?php } else { ?>
                                                    
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="status" id="status" value="0" checked="checked">Inactive
                                                        </label>
                                                    </div>

                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="status" id="status" value="1">Active
                                                        </label>
                                                    </div
                                                    
                                                    <?php } ?>
                                                </div>
                                                
                                                <?php }} ?>
                                                
                                                <button type="submit" name="update" class="btn btn-info">Update </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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