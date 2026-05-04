<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Start the session
include 'connect.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    // $password = $_POST['password'];

    // Insert user data into the database
    $sql = "INSERT INTO tbluser (username, email, phone_number, password) VALUES ('$username', '$email', '$phone', '$password')";
    // echo $sql;

    if ($mysqli->query($sql) === TRUE) {
        // Store the username in the session
        $_SESSION['username'] = $username;

        // Redirect to the welcome page
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
</head>
<body>
    <h2>Sign Up</h2>
    <form method="POST" action="signup.php">
        Username: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        Phone number: <input type="text" name="phone" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Sign Up">
    </form>
    <p>Already have an account? <a href="signin.php">Sign In</a></p>
</body>
</html>