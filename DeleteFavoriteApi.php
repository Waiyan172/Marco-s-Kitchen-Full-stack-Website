<?php
session_start();

require_once 'dbinfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error)
    die('Fail Connection' . $conn->connect_error);

if (isset($_GET['recipe_id'])) {
    $recipe_id = $_GET['recipe_id'];

    $deleteQuery = "DELETE FROM favorite WHERE recipe_id = '$recipe_id'";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "deleted";
    } else {
        echo "Error deleting recipe: ";
    }
}

