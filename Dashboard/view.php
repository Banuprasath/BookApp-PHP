<!DOCTYPE html>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    


    <title>User Data Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th{
            font-weight:bold;
            font-size:20px;
        }
        th, td {
            border: 1px solid black;
           font
            padding: 18px;
            height: 60px;
            width:60px;
            text-align: left;
            weight: bold;
    font: 18px Arial;
        }
    </style>
</head>
<body>

<h2>User Data Table</h2>
<form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search"  value="<?php 
                                        if(isset($_GET['search'])){
                                            echo $_GET['search']; 
                                            } ?>" class="form-control" placeholder="Search data">
                                            <br>
                                            <input type="text" name="cty" class="form-control" value="<?php 
                                        if(isset($_GET['cty'])){
                                            echo $_GET['cty']; 
                                            } ?>"" placeholder="Search city">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

<table class='table table-dark table-striped table-hover' >
    <tr>
        <th>UserName</th>
        <th>Book Image</th>
        <th>bname</th>
        <th>author</th>
        <th>Price</th>
        <th>Location</th>
        <th>Phone</th>
    </tr>

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

        echo "<tr>";
        echo "<td>".$row["usrname"]."</td>";
        echo "<td><img width ='70px'  height='70px' src='data:image;base64,{$row['photo']}' alt='img'</td>";
        echo "<td>".$row["bname"]."</td>";
        echo "<td>".$row["author"]."</td>";
        echo "<td>".$row["price"]."</td>";
        echo "<td>".$row["loc"]."</td>";
        echo "<td>".$row["phone"]."</td>";
        
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No data found</td></tr>";
}
}


if(isset($_GET['search']))
{
    $filtervalues = $_GET['search'];
    $cty=$_GET['cty'];
    $query = "SELECT * FROM books WHERE bname LIKE '%$filtervalues%' AND  loc LIKE '%$cty%'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
       //need to add for each loop
       while($row=$query_run->fetch_assoc()){

       echo "<tr>";
               echo "<td>".$row["usrname"]."</td>";
               echo "<td><img width ='70px'  height='70px' src='data:image;base64,{$row['photo']}' alt='img'</td>";
               echo "<td>".$row["bname"]."</td>";
               echo "<td>".$row["author"]."</td>";
               echo "<td>"."₹ ".$row["price"]."</td>";
               echo "<td>".$row["loc"]."</td>";
               echo "<td>".$row["phone"]."</td>";
       echo "</tr>";
       }
    }
    else
    {
        ?><style>
            #no{
                color:red;

                text-align: center;
                padding:30px;
            }


        </style>
            <tr id="no">
              <b>  <td colspan="7">No Record Found</td>
        </b>        </tr>
        <?php
    }

//     $sql="select * from books";
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



}







//         echo "<td><img width ='50px'  height='50px' src='data:image;base64,{$row['photo']}' alt='img'</td>";
//         echo "<br><hr>";
//     }

//  }
?>