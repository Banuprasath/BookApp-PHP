<!doctype html>


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
        <input type="number" name="price" id="price" class="form-control" maxlength="5" required>
        <br>
</div>
        <div class="md-3">
        <label for="location">Location:</label>
        <input type="text" name="loc" id="location" class="form-control"  required>
        <br>
</div>
     <!--  <div class="md-3">
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="phone" class="form-control"  required>
        <br>
</div>-->

        <div class="md-3">

        <label for="file">Select a file:</label><br>
        <input type="file" name="photo" id="file" class="form-control" >
        <br>
        
</div>
        <div class="md-3">
        <input type="submit" value="submit" name="submit" class="form-control btn btn-success" >
    </form>
</div>
        </div>
        </div>
    </div>
  </div>
  </body>
</html>

<?php
//---------------------------------------------------------code. php---------------------------------------------------------------------------------------------
require 'dbcon.php';
require 'create.php';

$con = new mysqli("localhost","root","","my_book_lg");

if($con->connect_error){
    echo $con->connect_error;
    die("Database connection failed");
}


if (isset($_POST['submit'])){
   
    $username=$_POST['username'];
    $bname=$_POST['bname'];
    $author=$_POST['author'];
    $price=$_POST['price'];
    $loc=$_POST['loc'];
   // $phone=$_POST['phone'];
   // $uploadimg=$_POST['uploadimg'];   
   
   // trying to add phone no during registration
   



if(getimagesize($_FILES['photo']['tmp_name'])==false){

    echo "<h3>Please select the img</h3>";
}
else{
    session_start();
    $ph=$_SESSION["user"];  
    echo $ph;
    $photo=$_FILES['photo']['tmp_name'];
    $name=$_FILES['photo']['name'];
    $photo=file_get_contents($photo);
    $photo=base64_encode($photo);
    // $s=$_SESSION["add"];
    // echo $s;
    //print_r($uploadimg);
    $sql="INSERT INTO books (usrname,bname,author,price,loc,phone,photo) VALUES ('$username','$bname','$author','$price','$loc',$ph,'$photo')";
   //$sql="INSERT INTO books (photo) VALUES ('$uploadimg')";

    if($con->query($sql)){
        //echo "image stored success";
        echo '<div class="alert alert-success">Uploaded Succefully</div>';
        $_SESSION['message']="Book Added Succesfully";
        //header("location: index.php");
        exit(0);
       
    }
    else{
        echo "Error while storing an image??????????????????????";
        echo "Error: " . $sql . "<br>" . $con->error;
    }

   // echo "You can store";
//    $_SESSION["add"] = $phone;

//    echo $_SESSION["add"];
}
}
else{

    echo "Please select the Image";
}
echo "<pre>";
print_r($_POST);
echo "</pre>";



// if(isset($_POST['submit'])){

//     $username=mysqli_real_escape_string($con,$_POST['username']);
//     $dbname=mysqli_real_escape_string($con,$_POST['dbname']);
//     $author=mysqli_real_escape_string($con,$_POST['author']);
//     $price=mysqli_real_escape_string($con,$_POST['price']);
//     $loc=mysqli_real_escape_string($con,$_POST['loc']);
//     $phone=mysqli_real_escape_string($con,$_POST['phone']);
//     //$name=mysqli_real_escape_string($con,$_POST['name']);

//     if(getimagesize($_FILES['uploadimg']['tmp_name'])==false){

//         echo "Please select the img";
//     }
//     else{
//         $uploadimg=$_FILES['uploadimg']['tmp_name'];
//         $name=$_FILES['uploadimg']['name'];
//         $uploadimg=file_get_contents($uploadimg);
//         $uploadimg=base64_encode($uploadimg);
//     }

//     $query="INSERT INTO books (usrname,bname,author,price,loc,phone,photo) VALUES ('$username','$bname','$author','$price','$loc',$phone,'$uploadimg')";

// print_r($_POST);
//     $query_run=mysqli_query($con,$query)
//     if($query_run)
//     {
//         $_SESSION['message']="BOOKS ADDED SUCCESS";
//         exit(0);


//     }


// 
?>