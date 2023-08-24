<!DOCTYPE html>
<!doctype html>
<html lang="en">
<head>
    <?php include("../navbar/navbar.php");?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    


    <title>User Data Table</title>
    
    
</head>
<body>


<?php



$con = new mysqli("localhost","root","","my_book_lg");

if($con->connect_error){
    echo $con->connect_error;
    die("Database connection failed");
}

// $sql="select * from books";
// $result=$con->query($sql);
// if($result->num_rows>0){
//     while($row=$result->fetch_assoc()){

//         echo "<tr>";
//         echo "<td>".$row["usrname"]."</td>";
//         echo "<td><img width ='70px'  height='70px' src='data:image;base64,{$row['photo']}' alt='img'</td>";
//         echo "<td>".$row["bname"]."</td>";
//         echo "<td>".$row["author"]."</td>";
//         echo "<td>".$row["price"]."</td>";
//         echo "<td>".$row["loc"]."</td>";
//         echo "<td>".$row["phone"]."</td>";
        
//         echo "</tr>";
//     }
// } else {
//     echo "<tr><td colspan='3'>No data found</td></tr>";
// }

if(!isset($_GET['search']))
{
    $sql="select * from books";
$result=$con->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){


        ?>
<div class="container">
    <div class="row mt-4">
        <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <?php echo " <img width ='70px'  height='70px' src='data:image;base64,{$row["photo"]}' class='card-image-top' alt='img'>"; ?>
    
  
                    <div class="card-body">
                             <h5 class="card-title"><?php echo $row["bname"]; ?></h5>
                                <p class="card-text">Author: <?php echo $row["author"]; ?></p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
        </div>
</div>
</div>


<?php
    }
    
 
}
}
?>