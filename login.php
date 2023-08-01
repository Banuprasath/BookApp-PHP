<?php
// print_r($_POST);
// // if (!isset($_POST['submit']))
// // {
//     print_r($_POST);


//     $user=$_POST['user'];
//     $pass=$_POST['pass'];
//     $con=mysqli_connect("localhost","root","","my_book_lg");
//     $sq="SELECT * from userlg where username='$user' AND `password` ='$pass'";
//     $result=mysqli_query($con,$pass);
//     print_r($result);
//     echo $result;
//     $check=mysqli_num_rows($result);
//     echo $check;

//     if ($check>0){
//         echo "Login Succesfull";
//     }
//     else{
//         echo "Please check username and password";
//     }

// Replace 'your_host', 'your_username', 'your_password', and 'your_database' with actual database credentials
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
                header("Location: Dashboard/index.php");
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
}
?>


