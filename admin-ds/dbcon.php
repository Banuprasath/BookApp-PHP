<?php

$con = new mysqli("localhost","root","","my_book_lg");
if($con->connect_error){
    echo $con->connect_error;
    die("Database connection failed");
}
?>