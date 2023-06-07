<?php 
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php"; 

if(isset($_POST['submit'])) {

    $matric = sanitize(trim($_POST['matric_no']));
    $password = md5(trim($_POST['password']));
    $password2 = md5(trim($_POST['password2']));
    $username = sanitize(trim($_POST['username']));
    $email = sanitize(trim($_POST['email']));
    $dept = sanitize(trim($_POST['dept']));
    $books = sanitize(trim($_POST['num_books']));
    $money = sanitize(trim($_POST['money_owed']));
    $phone = sanitize(trim($_POST['phone']));
    $name = sanitize(trim($_POST['name']));
    $status = sanitize(trim($_POST['status']));

   if ($password == $password2) {
      $sql = "INSERT INTO students( matric_no, password, username, email, dept, numOfBooks, moneyOwed, phoneNumber, name, status)
 VALUES ('$matric', '$password', '$username', '$email', '$dept', '$books', '$money', '$phone', '$name', '$status' ) ";

      $query = mysqli_query($conn, $sql);
      $error = false;
      if($query){
       $error = true;
      }
      else{
        echo "<script>alert('Not Registered successful!! Try again.');
                    </script>"; 
      }
   }
   else {
    echo  "<script>alert('Password mismatched!')</script>";
   }
}
?>

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
										
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="login.php">Admin Login</a></li>
					<li><a href="userlogin.php">User Login</a></li>
					<li><a href="addstudent.php">Register</a></li>
				</ul>
			</div>
		</div>
	</nav>
</div>

<div class="container"><br>
    <div class="container  col-lg-10 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 50px">
        <div class="jumbotron login3 col-lg-10 col-md-11 col-sm-12 col-xs-12">

              <?php if(isset($error)===true) { ?>
        <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Record Added Successfully!</strong>
            </div>
            <?php } ?>
            <p class="" style="text-align: center">ADD STUDENTS</p>

            <div class="container">
                <form class="form-horizontal" role="form" action="addstudent.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Username" class="col-sm-2 control-label">FULLNAME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Full name" id="name" required>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">STUDENT ID NO.</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="matric_no" placeholder="Matric Number" id="password" required>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">DEPARTMENT</label>
                        <div class="col-sm-10">
                            <select name="dept" class="form-control" style="width: 510px;">
                                <option value="">--Select Department--</option>
                                <option value="College of Accounting and Business Education">College of Accounting and Business Education</option>
                                <option value="College of Arts and Humanities">College of Arts and Humanities</option>
                                <option value="College of Computer Studies">College of Computer Studies</option>
                                <option value="College of Engineering and Architecture">College of Engineering and Architecture</option>
                                <option value="College of Human Environmental Sciences and Food Studies">College of Human Environmental Sciences and Food Studies</option>
                                <option value="College of Medical and Biological Sciences">College of Medical and Biological Sciences</option>
                                <option value="College of Music">College of Music</option>
                                <option value="College of Nursing">College of Nursing</option>
                                <option value="College of Pharmacy and Chemistry">College of Pharmacy and Chemistry</option>
                                <option value="College of Teacher Education">College of Teacher Education</option>
                            </select> 
                        </div>
                          
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">EMAIL</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Email" id="password" required>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">USERNAME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" placeholder="Username" id="password" required>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="password" id="password" required>
                        </div>      
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">CONFIRM PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password2" placeholder="Confirm password" id="password" required>
                        </div>      
                    </div>
                     
                     <input type="hidden" class="form-control" name="num_books" placeholder="books" id="password" required value="null">
                     <input type="hidden" class="form-control" name="money_owed" placeholder="Money" id="password" required value="null">
                     <input type="hidden" class="form-control" name="status" placeholder="status" id="password" required value="0">
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">PHONE NUMBER</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" placeholder="phone" id="password" required>
                        </div>      
                    </div>     
                             
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button  class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info" name="submit">
                                REGISTER
                            </button>
                        </div>
                    </div>     
                </form>
            </div>
        </div>
        
    </div>
</div> 



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
 	window.onload = function () {
		var input = document.getElementById('name').focus();
	}
 </script>
</body>
</html>