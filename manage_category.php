<?php
require 'includes/db-inc.php';
include "includes/header.php"; 
include('includesAdmin/config.php');
error_reporting(0);


    if(isset($_GET['del'])){

        $id=$_GET['del'];
        $sql = "DELETE FROM tblcategory WHERE CatId=:id";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':id',$id,PDO::PARAM_STR);
        $query -> execute();
        
        $_SESSION['delmsg'] = "";
        header('location:manage_category.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>

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
	</div>

    <!-- <?php include('includes/header.php');?> -->

    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="row">
                    <?php if($_SESSION['error']!=""){?>
                    <div class="col-md-6">
                        <div class="alert alert-danger">
                            <strong>Error: </strong>
                            <?php echo htmlentities($_SESSION['error']);?>
                            <?php echo htmlentities($_SESSION['error']);?>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if($_SESSION['msg']!=""){?>
                    <div class="col-mg-6">
                        <div class="alert alert-success">
                            <strong>Success: </strong>
                            <?php echo htmlentities($_SESSION['msg']);?>
                            <?php echo htmlentities($_SESSION['msg']="");?>
                        </div>
                    </div>
                    <?php } ?>

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
            <div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-0 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">
                <span class="glyphicon glyphicon-book"></span>
                <strong>Books</strong>Table
		    </div>
            <div class="col-md-12">
                    <a href="add_category.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: -10px;margin-bottom: 0px"><span class="glyphicon glyphicon-plus-sign"></span> Add Category</button></a><br><br>
            </div><br><br>
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"> Category List</div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Creation Date</th>
                                            <th>Updation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $sql = "SELECT * FROM tblcategory";
                                        $query = $dbh -> prepare($sql);
                                        $query -> execute();
                                        $results = $query -> fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;

                                        if($query->rowCount() > 0){
                                            foreach($results as $result){?>

                                            <tr class="odd gradeX">
                                                <td class="center"><?php echo htmlentities($cnt);?></td>
                                                <td class="center"><?php echo htmlentities($result->CategoryName);?></td>
                                                <td class="center"><?php if($result->Status==1){?>
                                                    <a href="#" class="btn btn-success btn-xs">Available</a>
                                                    <?php }else{?>
                                                    <a href="#" class="btn btn-danger btn-xs">Unavailable</a>
                                                    <?php }?>
                                                </td>
                                                <td class="center"><?php echo htmlentities($result->CreationDate);?></td>
                                                <td class="center"><?php echo htmlentities($result->UpdationDate);?></td>
                                                <td class="center">
                                                    <a href="edit_category.php?catid=<?php echo htmlentities($result->CatId);?>"><button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                                                    <a href="manage_category.php?del=<?php echo htmlentities($result->CatId);?>" onclick="return confirm('Are you sure you want to delete?');""><button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button></a>
                                                </td>
                                            </tr>
                                        <?php $cnt=$cnt+1;}}?>
                                    </tbody>
                                </table>
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