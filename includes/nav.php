<?php 
session_start();

if (isset($_SESSION['alogin'])) {
     $admin = $_SESSION['alogin'];
}

if (isset($_SESSION['login'])) {
     $student = $_SESSION['login'];
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
                        <?php if(isset($admin)) { ?>  
                        <li class="active"><a href="admin.php">Home</a></li>
                        <li><a href="bookstable.php">Books</a></li>
                        <li><a href="manage_category.php">Categories</a></li>
                        <li><a href="manage_author.php">Authors</a></li>
                        <li><a href="viewstudents.php">Students</a></li>
                        <li><a href="borrowedbooks.php">Borrowed Books</a></li>
                        <li><a href="fines.php">Fines</a></li>
                        <?php } ?>
                    </ul> 
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php">Logout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</html>