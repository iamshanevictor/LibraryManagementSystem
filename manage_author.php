<?php
session_start();
error_reporting(0);
require 'includes/db-inc.php';
include "includes/header.php"; 
include('includesAdmin/config.php');
include('config.php');

if(strlen($_SESSION['alogin'])==0)
    {   
header('location:login.php');
}else{
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $sql = "DELETE from tblauthors WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query-> bindParam(':id', $id, PDO::PARAM_STR);
        $query-> execute();
        $_SESSION['delmsg'] = "";

        header('location:manage_author.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Authors</title>

    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
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
				<strong>Manage Authors</strong>
			</div>
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line"></h4>
                    <a href="addauthor.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 0px"><span class="glyphicon glyphicon-plus-sign"></span> Add Author</button></a>
                </div>
            
                <div class="row">
                    <?php if($_SESSION['error']!=""){?>
                        <div class="col-md-6">
                            <div class="alert alert-danger" >
                                <strong>Error :</strong> 
                                <?php echo htmlentities($_SESSION['error']);?>
                                <?php echo htmlentities($_SESSION['error']="");?>
                            </div>
                        </div>
                    <?php } ?>
                
                    <?php if($_SESSION['msg']!=""){?>
                        <div class="col-md-6">
                            <div class="alert alert-success" >
                                <strong>Success :</strong> 
                                <?php echo htmlentities($_SESSION['msg']);?>
                                <?php echo htmlentities($_SESSION['msg']="");?>
                            </div>
                        </div>
                    <?php }?>

                    <?php if($_SESSION['updatemsg']!=""){?>
                        <div class="col-md-6">
                            <div class="alert alert-success" >
                                <strong>Success :</strong> 
                                <?php echo htmlentities($_SESSION['updatemsg']);?>
                                <?php echo htmlentities($_SESSION['updatemsg']="");?>
                            </div>
                        </div>
                    <?php } ?>
                
                    <?php if($_SESSION['delmsg']!=""){?>
                        <div class="col-md-6">
                            <div class="alert alert-success" >
                                <strong>Success :</strong> 
                                <?php echo htmlentities($_SESSION['delmsg']);?>
                                <?php echo htmlentities($_SESSION['delmsg']="");?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Authors Listing</div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Author</th>
                                            <th>Pen Name</th>
                                            <th>Creation Date</th>
                                            <th>Updation Date</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $sql = "SELECT * from  tblauthors";
                                        $query = $dbh -> prepare($sql);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;
                                    
                                        if($query->rowCount() > 0){
                                            foreach($results as $result){?>
                                            <tr class="odd gradeX">
                                                <td class="center"><?php echo htmlentities($cnt);?></td>
                                                <td class="center"><?php echo htmlentities($result->AuthorName);?></td>
                                                <td class="center"><?php echo htmlentities($result->PenName);?></td>
                                                <td class="center"><?php echo htmlentities($result->creationDate);?></td>
                                                <td class="center"><?php echo htmlentities($result->UpdationDate);?></td>
                                                
                                                <td class="center">
                                                    <a href="edit_author.php?athrid=<?php echo htmlentities($result->id);?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
                                                    <a href="manage_author.php?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
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
    <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>