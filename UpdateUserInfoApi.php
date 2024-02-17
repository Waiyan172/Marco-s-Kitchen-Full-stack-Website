<?php
session_start();

require_once 'dbinfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error) {
    die($conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $userID = $_SESSION['userID']; 

    $stmt = $conn->prepare("UPDATE users_info SET first_name=?, last_name=?, email=? WHERE user_id=?");
    $stmt->bind_param("sssi", $firstName, $lastName, $email, $userID);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['first_name'] = $firstName;
        $_SESSION['last_name'] = $lastName;
        $_SESSION['email'] = $email;

        echo "Success";
    } else {
        echo "Error updating data";
    }

    $stmt->close();
}

$conn->close();
