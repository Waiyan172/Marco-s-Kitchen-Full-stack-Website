<?php
session_start();

require_once 'dbinfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error)
    die($conn->connect_error);

if (isset($_GET['recipe_id']) && isset($_SESSION['userID'])) {
    $recipe_id = $_GET['recipe_id'];
    $user_id = $_SESSION['userID'];

    $checkQuery = "SELECT * FROM favorite WHERE recipe_id = '$recipe_id' AND user_id = '$user_id'";
    $checkResult = $conn->query($checkQuery);
    if ($checkResult->num_rows == 0) {
        $insertQuery = "INSERT INTO favorite (user_id, recipe_id) VALUES ('$user_id', '$recipe_id')";
        $conn->query($insertQuery);
        echo "added";
    } else {
        echo "exists";
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
