<html>
<?php

$username=$_POST['username'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$city=$_POST['city'];


print_r($_POST);

if(!empty($username) || !empty($phone)|| !empty($password)|| !empty($repassword)|| !empty($location)){


    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="my_book_lg";

    $con=new mysqli($host,$dbusername,$dbpassword,$dbname);


    if(mysqli_connect_error()){

        die('Connect Error ('.mysqli_connect_errorno().')'.mysqli_connect_error());

    } 
    else{
        //I dont know why the fuck these lines are causing errors
        // WHERE phone =?LIMIT 1
        $SELECT="SELECT phone from userlg WHERE phone =? LIMIT 1;";
        $INSERT="INSERT into userlg (username,phone,`password`,repassword,city) values(?,?,?,?,?) ;";
        $stmt=$con->prepare($SELECT);
        // $stmt->bind_param("i",$phone);
        $stmt->execute();
        $stmt->bind_result($phone);
        $stmt->store_result();
        $rnum=$stmt->num_rows;

        if($rnum==0){
            $stmt->close();
            $stmt=$con->prepare($INSERT);
            $stmt->bind_param("sisss",$username,$phone,$password,$repassword,$city);
            $stmt->execute();
            echo "New Record inserted Successfully";
         }
        else{
            echo "Someone already register using this email";

        }
        $stmt->close();
        // $stmt->close();
    }
}
     else{
        echo "All Field are required";
         die();

    }
    
    // })

?>