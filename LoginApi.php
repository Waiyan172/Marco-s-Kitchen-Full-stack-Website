<?php
session_start();

require_once 'dbinfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error)
    die($conn->connect_error);

$email = htmlspecialchars($_POST['email']);
$pass = htmlspecialchars($_POST['pass']);
$role = htmlspecialchars($_POST['role']);


$query = "SELECT * FROM users_info WHERE email = '$email'";
$result = $conn->query($query);
$emailExists = $result->num_rows;

$query = "SELECT * FROM users_info WHERE password = '$pass'";
$result = $conn->query($query);
$passwordMatch = $result->num_rows;

$query = "SELECT * FROM users_info WHERE role = '$role'";
$result = $conn->query($query);
$roleMatch = $result->num_rows;

$query = "select * from users_info where email = '$email' AND password = '$pass' AND role = '$role'";
$result = $conn->query($query);
$rows = $result->num_rows;
if ($emailExists != 0 && $passwordMatch != 0 && $roleMatch != 0 && $rows > 0) {
    $query = "SELECT * FROM users_info WHERE email = '$email'";
    $result = $conn->query($query);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $_SESSION['userID'] = $row['user_id'];
    $_SESSION['first_name'] = $row['first_name'];
    $_SESSION['last_name'] = $row['last_name'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['role'] = $row['role'];
    echo 'Success';
}elseif ($emailExists != 0) {
    echo 'Invalid email!';
} elseif ($passwordMatch != 0) {
    echo 'Invalid password!';
} else {
    echo 'Invalid credentials!';
}