<?php

session_start();

require_once 'dbinfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error)
    die($conn->connect_error);

$firstname = $_REQUEST['firstname'] ?? "";
$lastname = $_REQUEST['lastname'] ?? "";
$email = $_REQUEST['email'] ?? "";
$password = $_REQUEST['password'] ?? "";
$role = $_REQUEST['role'] ?? "";

$stmt = $conn->prepare("SELECT * FROM users_info WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo 'Already Registered';
} else {
    $stmt = $conn->prepare("INSERT INTO users_info(first_name,last_name,email,password,role) values (?,?,?,?,?)");
    $stmt->bind_param("sssss", $firstname, $lastname, $email, $password, $role);

    if ($stmt->execute()) {
        
        echo 'Success';
    } else {
        echo 'Unable to register';
    }
}

$stmt->close();
$conn->close();
