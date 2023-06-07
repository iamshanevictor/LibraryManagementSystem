<?php 
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";
session_start();

if(isset($_POST['submit'])){
    
    $title = (trim($_POST['title']));
    $label = (trim($_POST['label']));
    $bookCopies = (trim($_POST['bookCopies']));
    $publisher = (trim($_POST['publisher']));
    $select = (trim($_POST['select']));
    $bid = (trim($_POST['CatId']));
    $bidone = (trim($_POST['athrid']));
    $author = (trim($_POST['author']));
    $category = (trim($_POST['category']));

    $bqry = mysqli_query($conn,"SELECT * FROM tblcategory WHERE CatId = {$bid} ");
    $bdata = mysqli_fetch_array($bqry);

    $bqryone = mysqli_query($conn,"SELECT * FROM tblauthors WHERE id = {$bidone} ");
    $bdataone = mysqli_fetch_array($bqryone);
    
    $sql = "INSERT INTO books(bookTitle, author, ISBN, bookCopies, publisherName, available, categories, CatId, AuthorId)
    values ('$title','{$bdataone['AuthorName']}','$label','$bookCopies','$publisher','$select','{$bdata['CategoryName']}', '$bid', '$bid1')";
    

    $query = mysqli_query($conn, $sql);
    $error = false;
    
    if($query){
        $error = true;
        echo "<script>alert('New Book has been added ');
					location.href ='bookstable.php';
					</script>";
    }else{
        echo "<script>alert('Book not added!');
					</script>";	
    }
}
?>


<div class="container">
    <?php include "includes/nav.php"; ?>
    
    <div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 20px">
    
    <div class="jumbotron login2 col-lg-10 col-md-11 col-sm-12 col-xs-12">
        <p class="" style="text-align: center">ADD BOOK</p>
        
        <div class="container">
            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="addbook.php" method="post">
                <div class="form-group">
                    <label for="Title" class="col-sm-2 control-label">BOOK TITLE</label>
                    
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" placeholder="Enter Title" id="password" required>
                    </div>      
                </div>
                    
                <div class="form-group">
					<label for="Book Title" class="col-sm-2 control-label">AUTHOR</label>
					<div class="col-sm-10">
						<select class="form-control" name="athrid">
							<option>SELECT CATEGORY</option>
							<?php 
							$sql = "SELECT * FROM tblauthors";
							$query = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_assoc($query)) { ?>
                            <option value="<?php echo $row['id'] ?>" <?php echo isset($_GET['bidone']) && $_GET['bidone'] == $row['id'] ? "selected" : "" ?>><?php echo $row['AuthorName']; ?></option>
                            <?php	} ?>
								?>
						</select>
					</div>		
				</div>
                
                <div class="form-group">
                    <label for="ISBN" class="col-sm-2 control-label">ISBN</label>
                    
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="label" placeholder="Enter ISBN" id="password" required>
                    </div>      
                </div>
                
                <div class="form-group">
                    <label for="Book Copies" class="col-sm-2 control-label">BOOK COPIES</label>
                    
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="bookCopies" placeholder="Enter BOOK COPIES" id="password" required>
                    </div>      
                </div>
                
                <div class="form-group">
                    <label for="Publisher" class="col-sm-2 control-label">PUBLISHER</label>
                    
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="publisher" placeholder="Enter Publisher" id="password" required>
                    </div>      
                </div>
                
                <div class="form-group">
                    <label for="Password" class="col-sm-2 control-label">AVAILABLE</label>
                    
                    <div class="col-sm-10">
                        <select custom-select custom-select-lg name="select" required>
                            <option>SELECT</option>
                            <option>YES</option>
                            <option>NO</option>
                        </select>
                    </div>      
                </div>
                
                <div class="form-group">
					<label for="Book Title" class="col-sm-2 control-label">CATEGORY</label>
					<div class="col-sm-10">
						<select class="form-control" name="CatId">
							<option>SELECT CATEGORY</option>
							<?php 
							$sql = "SELECT * FROM tblcategory";
							$query = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_assoc($query)) { ?>
                            <option value="<?php echo $row['CatId'] ?>" <?php echo isset($_GET['bid']) && $_GET['bid'] == $row['CatId'] ? "selected" : "" ?>><?php echo $row['CategoryName']; ?></option>
                            <?php	} ?>
								?>
						</select>
					</div>		
				</div>
                
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button  name="submit" class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info">ADD BOOK</button></div>
                    </div>
                </div>
            </form>
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
</body>
</html>