<?php


$con = new mysqli("localhost","root","","my_book_lg");

if($con->connect_error){
    echo $con->connect_error;
    die("Database connection failed");
}
?>
<!DOCTYPE html>
<html>
 <link rel="stylesheet" href="app.css">
<head>
    <title>File Upload Form</title>
</head>
<body>
    <h2>Upload a File</h2><br>


  
    <form  method="POST" enctype="multipart/form-data">
    <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br>

        <label for="bname">Book Name:</label>
        <input type="text" name="bname" id="bname" required>
        <br>

        <label for="author">Author:</label>
        <input type="text" name="author" id="author" required>
        <br>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" required>
        <br>

        <label for="location">Location:</label>
        <input type="text" name="loc" id="location" required>
        <br>

        <label for="phone">Phone:</label>
        <input type="number" name="phone" id="phone" required>
        <br>




        <label for="file">Select a file:</label><br>
        <input type="file" name="uploadimg" id="file">
        <br>
        <br>
        <input type="submit" value="submit" name="submit">
        <a href="view.php">view</a>
    </form>
</body>
</html>
<?php

if (isset($_POST['submit'])){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $username=$_POST['username'];
    $bname=$_POST['bname'];
    $author=$_POST['author'];
    $price=$_POST['price'];
    $loc=$_POST['loc'];
    $phone=$_POST['phone'];




if(getimagesize($_FILES['uploadimg']['tmp_name'])==false){

    echo "Please select the img";
}
else{
    $uploadimg=$_FILES['uploadimg']['tmp_name'];
    $name=$_FILES['uploadimg']['name'];
    $uploadimg=file_get_contents($uploadimg);
    $uploadimg=base64_encode($uploadimg);
    //print_r($uploadimg);
    $sql="INSERT INTO books (usrname,bname,author,price,loc,phone,photo) VALUES ('$username','$bname','$author','$price','$loc',$phone,'$uploadimg')";
   //$sql="INSERT INTO books (photo) VALUES ('$uploadimg')";

    if($con->query($sql)){
        echo "image stored success";
    }
    else{
        echo "Error while storing an image??????????????????????";
        echo "Error: " . $sql . "<br>" . $con->error;
    }

   // echo "You can store";
}
}
else{

    echo "Please select the Image";
}
// This is used to show all data
// $sql="select * from books";
// $result=$con->query($sql);
// if($result->num_rows>0){
//     while($row=$result->fetch_assoc()){
//         echo "<td><img width ='300px'  height='300px' src='data:image;base64,{$row['photo']}' alt='img'</td><td>{$row['bname']</td>}";
//         echo "<br><hr>";
//     }

// }


?>