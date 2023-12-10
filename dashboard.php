<?php
    session_start();

    // Check if the user is logged in, if not redirect to the login page
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
        exit();
    }

    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Welcome to Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $username; ?>!</h1>
    
    <!-- Your Dashboard content goes here -->

    <form method="post" action="authentication.php">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>
