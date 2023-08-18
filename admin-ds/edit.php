<!doctype html>
<?php 
require 'dbcon.php';
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

</head>
  <body>

  <div class="container mt-5">
  <?php include("message.php")?>
   
    <div class="row">
        <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h4>Add Books
                <a href="index.php" class="btn btn-danger float-end">Back</a>
</h4>
</div>
<div class="card-body">
    <?php
    echo  $_GET['id'];
    
    if(isset($_GET['id'])){
        $book_id=$_GET['id'];
       // echo "$book_id";
        $query="SELECT *  FROM books where book_id='$book_id'";
        $query_run=mysqli_query($con,$query);


        if(mysqli_num_rows($query_run)>0){

              $student=mysqli_fetch_array($query_run);
           // print_r($student);
        }
    }
            ?>





            
            <form  method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
        <div class="md-3">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $student['usrname'] ?>" required>
        <br>
        </div>
        <div class="md-3">
        <label for="bname">Book Name:</label>
        <input type="text" name="bname" id="bname" class="form-control"  value="<?= $student['bname'] ?>"   required>
        <br>
</div>
        <div class="md-3">
        <label for="author">Author:</label>
        <input type="text" name="author" id="author" class="form-control"  value="<?= $student['author'] ?>"  required>
        <br>
</div>
        <div class="md-3">
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" class="form-control"   value="<?php $student['price'] ?> " required>
        <br>
</div>
        <div class="md-3">
        <label for="location">Location:</label>
        <input type="text" name="loc" id="location" class="form-control"  value="<?= $student['loc'] ?> " required>
        <br>
</div>
       <!-- <div class="md-3">
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="phone" class="form-control"  value="<?= $student['phone'] ?>"  required>
        <br>
</div>-->
<div class="md-3">

        <label for="file">Select a file:</label><br>
        <input type="file" name="photo" id="file"  class="form-control" >
        <br>
        
</div> 
        <div class="md-3">
        <input type="submit" value="submit" name="submit" class="form-control btn btn-success" >
    </form>
</div>

        </form>
            <?php
            
$con = new mysqli("localhost","root","","my_book_lg");

if($con->connect_error){
    echo $con->connect_error;
    die("Database connection failed");
}

session_start();
if (isset($_POST['submit'])){
    echo "TRUE";
    echo "<BR>";
   
    
    if(isset($_GET['id'])){
        $book_id=$_GET['id'];
   
    $username=$_POST['username'];
    $bname=$_POST['bname'];
    $author=$_POST['author'];
    $price=$_POST['price'];
    $loc=$_POST['loc'];
    
if(getimagesize($_FILES['photo']['tmp_name'])==false){

    echo "Please select the img";
}
$photo=$_FILES['photo']['tmp_name'];
$photo=file_get_contents($photo);
    $photo=base64_encode($photo);
    //$phone=$_POST['phone'];
   // echo  $_GET['id'];
    echo $book_id;
    echo "<br>";
    print_r($_POST);
    // THIS QUERY IS USED TO ADD MOBILE NO ALSO 
    //$query="UPDATE  books SET  usrname='$username' , bname='$bname', author='$author', price='$price' , loc='$loc', phone = '$phone' WHERE book_id='$book_id'";



    //$query="UPDATE  books SET WHERE  usrname='$username' , bname='$bname', author='$author', price='$price' , loc='$loc', phone = '$phone' WHERE book_id='$book_id'";

    $query="UPDATE  books SET  usrname='$username' , bname='$bname', author='$author', price='$price' , loc='$loc' , photo ='$photo' WHERE book_id='$book_id'";

$query_run=mysqli_query($con,$query);
if($query_run){
    $_SESSION['message']="Data Updated Succesfully";
   header("location:index.php");
}
else{
    echo "ERROR";
}
}
}

            ?>























<!--
    <form  method="POST" enctype="multipart/form-data">
        <div class="md-3">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" required>
        <br>
        </div>
        <div class="md-3">
        <label for="bname">Book Name:</label>
        <input type="text" name="bname" id="bname" class="form-control"  required>
        <br>
</div>
        <div class="md-3">
        <label for="author">Author:</label>
        <input type="text" name="author" id="author" class="form-control"  required>
        <br>
</div>
        <div class="md-3">
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" class="form-control"  required>
        <br>
</div>
        <div class="md-3">
        <label for="location">Location:</label>
        <input type="text" name="loc" id="location" class="form-control"  required>
        <br>
</div>
        <div class="md-3">
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="phone" class="form-control"  required>
        <br>
</div>

        <div class="md-3">

        <label for="file">Select a file:</label><br>
        <input type="file" name="photo" id="file" class="form-control" >
        <br>
        
</div>
        <div class="md-3">
        <input type="submit" value="submit" name="Update" class="form-control" >
    </form>
</div>
        </div>
        </div>
    </div>
  </div>
  </body>
</html>
-->
