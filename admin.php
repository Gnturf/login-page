<?php
session_start();

// Check if the user is logged in as an admin
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    // Redirect to the login page if not logged in as an admin
    header("Location: index.php"); // Replace "login.php" with the actual login page
    exit();
}

// Logout logic
if (isset($_POST['logout'])) {
    session_destroy(); // Destroy the session
    header("Location: index.php"); // Redirect to the login page
    exit();
}

include('connection.php');
$sql_log = "SELECT * FROM log";
$result_log = mysqli_query($con, $sql_log);

$sql = "SELECT * FROM login";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Log</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Daftar User</h1>
    <table>
        <tr>
            <th>Username</th>
            <th>Password</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['username']}</td>";
            echo "<td>{$row['password']}</td>";
            echo "</tr>";
        }
        ?>

    </table>

    <h1>Daftar Log</h1>
    <table>
        <tr>
            <th>Username</th>
            <th>Waktu</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result_log)) {
            echo "<tr>";
            echo "<td>{$row['username']}</td>";
            echo "<td>{$row['date']}</td>";
            echo "</tr>";
        }
        ?>

    </table>
    <!-- Logout form -->
    <form method="post" action="">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>

</html>
