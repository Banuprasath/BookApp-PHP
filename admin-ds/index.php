<?php
    session_start();
    require 'dbcon.php';
    include ('../navbar/navbar.php');  

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student CRUD</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php');   ?>

        <?php 
        //To hide all errors
                                    error_reporting(0);
                                   $nme=$_SESSION["nme"];
                                   if (!isset($_SESSION["nme"])){

                                    echo "Please Login to view your Books";
                                    header("admin-view.php");
                                 }
                                   
                                  

                                ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> <?php echo "Welcome $nme 😇" ;?>
                            <a href="code.php" class="btn btn-primary float-end">Add Books</a>&nbsp;
                           <!-- <a href="/BOOKAPP/chatgpt/index.html" class="btn btn-danger float-end">Log Out</a>&nbsp;&nbsp;&nbsp; -->
                           <a href="Logout.php" class="btn btn-danger float-end">Log Out</a>&nbsp;&nbsp;&nbsp;
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Book Name</th>
                                    <th>author</th>
                                    <th>price</th>
                                    <th>Location</th>
                                    <th>phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $ph=$_SESSION["user"];
                              // var_dump($_SESSION); 
                               if ($_SESSION == NULL){
                                exit;
                               }

                            //     var_dump($ph); 
                                ini_set('display_errors', '1');

                           /*
                               $nme=$_SESSION["nme"];

                                 if (isset($_SESSION["nme"])) {
                                    return $lookup_table[$key];
                                } else {
                                    return;
                                }
                                            
                                
                                
                                echo $_POST['phone'];
                                this will used to get the login phone no : echo $ph;
                                echo $_SESSION["add"];
                                
                            echo $x;
                            require 'code.php';
                            
                          
                            if(!isset($_COOKIE[$cookie_name])) {
                                echo "Cookie named '" . $cookie_name . "' is not set!";
                              } else {
                                echo "Cookie '" . $cookie_name . "' is set!<br>";
                                echo "Value is: " . $_COOKIE[$cookie_name];
                              }
*/

                               $query = "SELECT * FROM books WHERE phone='$ph'";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['bname']; ?></td>
                                                <td><?= $student['author']; ?></td>
                                                <td><?= $student['price']; ?></td>
                                                <td><?= $student['loc']; ?></td>
                                                <td><?= $student['phone']; ?></td>
                                                
                                                <td>
                                                    <a href="admin-view.php?id=<?= $student['book_id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="edit.php?id=<?= $student['book_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="delete.php" method="POST" class="d-inline">
                                                        
                                                        <button type="submit" name="delete_student" value="<?=$student['book_id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                   
                                                    </form>
                                                </td>
                                            </tr>
                                            
                                            <?php
                                           
                                        }
                                    }
                                    else
                                    {

                                        echo "<h5>Please upload your first Book : ) </h5>";
            
                                    }
                                ?>
                                
                            </tbody>
                            <!--<tr><td colspan="6" style="color:red; font-size:20px;">Now books in your database!</td></tr>-->
                        </table>
                        <a href="/BOOKAPP/Dashboard/view.php"> VIEW ALL BOOKS</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>