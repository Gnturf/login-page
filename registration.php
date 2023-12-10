<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUser = $_POST['newUser'];
    $newPass = $_POST['newPass'];

    // Validate input (you should add more robust validation)
    if (empty($newUser) || empty($newPass)) {
        die("Please fill in all the fields.");
    }

    // Check if the username already exists
    $checkUsernameQuery = "SELECT * FROM login WHERE username = '$newUser'";
    $checkResult = mysqli_query($con, $checkUsernameQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        die("Username already exists. Please choose a different username. <a href='index.php'>Go Back</a>");
    }

    // Insert the new user into the database
    $insertQuery = "INSERT INTO login (username, password) VALUES ('$newUser', '$newPass')";
    
    if (mysqli_query($con, $insertQuery)) {
        echo "<h1>Registration successful. You can now <a href='index.php'>login</a>.</h1>";
    } else {
        echo "<h1>Registration failed. Please try again.</h1>";
    }
} else {
    // Redirect to the registration form if accessed without a POST request
    header("Location: registration.html");
    exit();
}

mysqli_close($con);
?>
