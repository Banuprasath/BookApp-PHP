<script>alert('Sure you want to delete?');</script>
<?php
            
            $con = new mysqli("localhost","root","","my_book_lg");
            
            if($con->connect_error){
                echo $con->connect_error;
                die("Database connection failed");
            }
            
            echo $book_id;
            if (isset($_POST['delete_student'])){
                $book_id=mysqli_real_escape_string($con,$_POST['delete_student']);
                
                $query="DELETE FROM books WHERE book_id='$book_id'";
                //$query="UPDATE  books SET WHERE  usrname='$username' , bname='$bname', author='$author', price='$price' , loc='$loc', phone = '$phone' WHERE book_id='$book_id'";
                $query_run=mysqli_query($con,$query);
                if($query_run){
                    $_SESSION['message']="Data Updated Succesfully";
                   header("location:index.php");
                }
                else{
                    echo "ERROR";
                }

            }




?>