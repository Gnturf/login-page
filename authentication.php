<?php      
    include('connection.php');  
    session_start();

    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
    // To prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);  
      
    $sql = "select * from login where username = '$username' and password = '$password'";  

    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
          
    if ($count == 1) {  
        // Set the session variable
        $_SESSION['username'] = $username;

        // Insert into log
        $sql = "insert into log(`username`) values('$username')";  
        $result = mysqli_query($con, $sql);  

        // Redirect to another page based on the user type
        if ($username == 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: dashboard.php");
        }
        exit();
    }

    if (isset($_POST['logout'])) {
        session_destroy(); // Destroy the session
        header("Location: index.php"); // Redirect to the login page
        exit();
    }
?>

<h1>Login Faled, Go back?</h1>
<form method="post" action="">
        <input type="submit" name="logout" value="Go Back">
</form>