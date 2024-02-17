<?php
session_start();

require_once 'dbinfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error)
    die($conn->connect_error);

if (isset($_GET['id'])) {
    $recipe_id = $_GET['id'];

    $query = "SELECT * FROM recipes WHERE id = $recipe_id";
    $result = $conn->query($query);

    $recipes = array();

    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $_SESSION['recipe_id'] = $row['id'];
        $_SESSION['recipe_name'] = $row['recipe_name'];
        $_SESSION['description'] = $row['description'];
        $_SESSION['category'] = $row['category'];
        $_SESSION['country'] = $row['country'];
        $_SESSION['meal_type'] = $row['meal_type'];
        $_SESSION['duration'] = $row['cooking_time'];
        $_SESSION['difficulty_level'] = $row['difficulty_level'];
        $_SESSION['method'] = $row['method'];
        $_SESSION['recipe_photo'] = $row['recipe_photo'];
        $_SESSION['serves'] = $row['serves'];
    } else {
        echo "Recipe not found!";
    }
} else {
    echo "Invalid recipe ID!";
}
$conn->close();

header('Content-Type: application/json');
echo json_encode($recipes);
