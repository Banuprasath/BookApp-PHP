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
           
            <p  class="form-control">

            <?= $student['usrname'] ?>
                
            </p>
        <br>
        </div>
        <div class="md-3">
        <label for="bname">Book Name:</label>
        <p  class="form-control">

            <?= $student['bname'] ?>
                
            </p>
        <br>
</div>
        <div class="md-3">
        <label for="author">Author:</label>
        <input type="text" name="author" id="author" class="form-control" readonly value="<?= $student['author'] ?>"  required>
        <br>
</div>
        <div class="md-3">
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" class="form-control" readonly  value="<?php  $student['price'] ?> " required>
        <br>
</div>
        <div class="md-3">
        <label for="location">Location:</label>
        <input type="text" name="loc" id="location" class="form-control" readonly value="<?= $student['loc'] ?> " required>
        <br>
</div>
        <div class="md-3">
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="phone" class="form-control" readonly value="<?= $student['phone'] ?>"  required>
        <br>
</div>
<?php
echo "<h6>BOOK IMAGE</h6>";
echo "<td><img width ='200px'  height='200px' src='data:image;base64,{$student['photo']}' alt='img'</td>";

?>
<!--                                                        FILE UPLOAD-->
        <!-- <div class="md-3">

        <label for="file">Select a file:</label><br>
        <input type="file" name="photo" id="file"  class="form-control" >
        <br>
        <div class="md-3">
        <input type="submit" value="submit" name="submit" class="form-control" >
    </form>
</div> -->
        
</div>

        </form>
            