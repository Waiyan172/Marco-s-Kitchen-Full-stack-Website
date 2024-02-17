<?php
session_start();

require_once 'dbinfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error)
    die($conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldPassword = htmlspecialchars($_POST['oldPassword']);
    $newPassword = htmlspecialchars($_POST['newPassword']);
    $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
    $userID = $_SESSION['userID'];
    if ($newPassword !== $confirmPassword) {
        echo "Confirm Password Error!";
        exit;
    }

    $stmt = $conn->prepare("SELECT password FROM users_info WHERE user_id = ? LIMIT 1");
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentStoredPassword = $row['password'];

        if ($oldPassword === $currentStoredPassword) {

            $updateStmt = $conn->prepare("UPDATE users_info SET password = ? WHERE user_id = ?");
            $updateStmt->bind_param("si", $newPassword, $userID);
            $updateStmt->execute();
            $updateStmt->close();

            echo "Success";
        } else {
            echo "Old Password Error!";
        }
    } else {
        echo "Invalid request";
    }
}
