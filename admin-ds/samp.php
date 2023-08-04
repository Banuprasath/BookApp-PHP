
<?php
session_start();
?>

<?php

$mysqli = new mysqli('localhost', 'root', '', 'my_book_lg');

// Check for connection errors
if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input from the login form
    $user=$_POST['user'];
         $pass=$_POST['pass'];
         

    // Prepare the statement
    $stmt = $mysqli->prepare("SELECT * FROM userlg WHERE  username='$user' AND `password` ='$pass'");

    // Bind parameter to the statement
    //$stmt->bind_param("s", $user);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the query was executed successfully
    if ($result != false) {
        // Check if the user exists
        if ($result->num_rows === 1) {
            // Fetch the user data
            $users = $result->fetch_assoc();
         
      

            // Verify the password
            if ($pass== $users['password']) {
                // Password is correct, login successful

                echo "Login successful!";
                $user=$_POST['user'];
                $pass=$_POST['pass'];
               
                $query = "SELECT * FROM userlg  WHERE  username='$user' AND `password` ='$pass'";

                $query_run = mysqli_query($mysqli, $query);

               
               // print_r($query_run); 

            
               
                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $student)
                    {
                       
                          $var_value= $student['phone'];
                    }
                    //echo $var_value;
                    $x=$var_value;
                //     session_start();
                //     session_register('variable_name');
                //    // $_SESSION['variable_name']=$var_value;
                    
                    header("Location: index.php");
                }
            
                $_SESSION["user"] = $var_value;  
                // $cookie_name = "phone";
                // $cookie_value = "red";
                // //echo $cookie_value;
                // setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                

                //On page 2
                
               
                // Get the result
                
                
                exit; 
                // You can add further actions here, like setting session variables, redirecting, etc.
            } else {
                // Password is incorrect
                echo "Incorrect password. Please try again.";
            }
        } else {
            // User does not exist
            echo "User not found. Please check your username or register if you don't have an account.";
        }
    } else {
        // Error executing the query
        echo "Error: " . $mysqli->error;
    }

    // Close the statement and the database connection
    $stmt->close();
    $mysqli->close();


   // echo "THE NO IS".$x;
}
  
?>

