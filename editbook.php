<?php 
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";
include('includesAdmin/config.php');

session_start();
error_reporting(0);

if(isset($_POST['update'])){
    $bookid=intval($_GET['bookid']);
    $booktitle=$_POST['booktitle'];
    $category=$_POST['category'];
    $author=$_POST['author'];
    $bookcopies=$_POST['bookcopies'];
    $pbname=$_POST['pbname'];
    $sql="UPDATE books SET bookTitle=:booktitle, categories=:category, author=:author, publisherName=:pbname, bookCopies=:bookcopies WHERE bookId=:bookid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':booktitle',$booktitle,PDO::PARAM_STR);
    $query->bindParam(':category',$category,PDO::PARAM_STR);
    $query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
    $query->bindParam(':author',$author,PDO::PARAM_STR);
    $query->bindParam(':bookcopies',$bookcopies,PDO::PARAM_STR);
    $query->bindParam(':pbname',$pbname,PDO::PARAM_STR);
    $query->execute();
    $_SESSION['updatemsg']="Brand updated successfully";
    header('location:bookstable.php');
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
<body><br><br><br><br><br><br>
      <!------MENU SECTION START-->
<?php include "includes/nav.php"; ?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
        <div class="container">
            
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">Author Info</div>
                        
                        <div class="panel-body">
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>BOOK TITLE</label>
                                    
                                    <?php 
                                    $bookid=intval($_GET['bookid']);
                                    $sql = "SELECT * from books where bookId=:bookid";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    
                                    if($query->rowCount() > 0){
                                        foreach($results as $result){?>   
                                        
                                        <input class="form-control" type="text" name="booktitle" value="<?php echo htmlentities($result->bookTitle);?>" required />
                                        
                                        <?php 
                                        }
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <label>ISBN</label>
                                    
                                    <?php 
                                    $bookid=intval($_GET['bookid']);
                                    $sql = "SELECT * from books where bookId=:bookid";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    
                                    if($query->rowCount() > 0){
                                        foreach($results as $result){?>   
                                        
                                        <input class="form-control" type="text" name="booktitle" value="<?php echo htmlentities($result->ISBN);?>" required  readonly/>
                                        
                                        <?php 
                                        }
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    $bookid=intval($_GET['bookid']);
                                    $sql = "SELECT * from books where bookId=:bookid";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0){
                                    foreach($results as $result){?>  
                                    <label>CATEGORY<br><label style="font-weight: bold;">(Recent author name: <?php echo htmlentities($result->categories);?>)</label></label>
                                    <?php }} ?>
                                    <select class="form-control" name="category" required="required">
                                        <option value=""> Select Category</option>
                                        
                                        <?php 
                                        $status=1;
                                        $sql = "SELECT * from tblcategory WHERE Status=:status";
                                        $query = $dbh -> prepare($sql);
                                        $query -> bindParam(':status',$status, PDO::PARAM_STR);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;
                                        
                                        if($query->rowCount() > 0){
                                            foreach($results as $result){?>
                                            <option value="<?php echo htmlentities($result->CategoryName);?>"><?php echo htmlentities($result->CategoryName);?></option>
                                        <?php }} ?> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <?php
                                    $bookid=intval($_GET['bookid']);
                                    $sql = "SELECT * from books where bookId=:bookid";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0){
                                    foreach($results as $result){?>  
                                    <label>AUTHOR NAME <br><label style="font-weight: bold;">(Recent author name: <?php echo htmlentities($result->author);?>)</label></label>
                                    <?php }} ?>
                                    <select class="form-control" name="author" required="required">
                                        <option value=""> Select Author</option>
                                        
                                        <?php 
                                        $sql = "SELECT * from  tblauthors ";
                                        $query = $dbh -> prepare($sql);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;
                                        
                                        if($query->rowCount() > 0){
                                            foreach($results as $result){?>
                                            <option value="<?php echo htmlentities($result->AuthorName);?>"><?php echo htmlentities($result->AuthorName);?></option>
                                        <?php }} ?> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>BOOK COPIES</label>
                                    
                                    <?php 
                                    $bookid=intval($_GET['bookid']);
                                    $sql = "SELECT * from books where bookId=:bookid";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    
                                    if($query->rowCount() > 0){
                                        foreach($results as $result){?>   
                                        
                                        <input class="form-control" type="text" name="bookcopies" value="<?php echo htmlentities($result->bookCopies);?>" required />
                                        
                                        <?php 
                                        }
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <label>PUBLISHER NAME</label>
                                    
                                    <?php 
                                    $bookid=intval($_GET['bookid']);
                                    $sql = "SELECT * from books where bookId=:bookid";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    
                                    if($query->rowCount() > 0){
                                        foreach($results as $result){?>   
                                        
                                        <input class="form-control" type="text" name="pbname" value="<?php echo htmlentities($result->publisherName);?>" required />
                                        
                                        <?php 
                                        }
                                    } ?>
                                </div>
                                <button type="submit" name="update" class="btn btn-info">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
 	window.onload = function () {
		var input = document.getElementById('title').focus();
	}
 </script>

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