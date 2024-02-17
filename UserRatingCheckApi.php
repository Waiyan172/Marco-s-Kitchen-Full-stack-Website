<?php
session_start();

if (isset($_POST['recipe_id'])) {

    $recipeId = $_POST['recipe_id'];

    if (isset($_SESSION['userID'])) {
        $userId = $_SESSION['userID'];

        require_once 'dbinfo.php';
        $conn = new mysqli($host, $user, $pass, $database);
        if ($conn->connect_error)
            die('Fail Connection' . $conn->connect_error);

        $query = "SELECT * FROM ratings WHERE recipe_id = $recipeId AND user_id = $userId";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            echo 'rated';
        } else {
            echo 'not_rated';
        }

        $conn->close();
    } else {
        echo 'not_logged_in';
    }
} else {
    echo 'missing_recipe_id';
}
