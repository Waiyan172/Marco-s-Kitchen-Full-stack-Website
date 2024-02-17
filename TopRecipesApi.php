<?php
session_start();

require_once 'dbinfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error)
    die($conn->connect_error);

$sql = "SELECT r.*
FROM recipes r
JOIN (
    SELECT recipe_id, AVG(rating) AS avg_rating
    FROM ratings
    GROUP BY recipe_id
    ORDER BY AVG(rating) DESC
    LIMIT 10
) AS top_recipe ON r.id = top_recipe.recipe_id;
";
$result = $conn->query($sql);

$recipes = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $recipes[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($recipes);
