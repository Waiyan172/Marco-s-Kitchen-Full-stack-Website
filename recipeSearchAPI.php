<?php
require_once 'dbinfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error)
    die('Fail Connection' . $conn->connect_error);

$SearchInput = $_POST['SearchInput'];

$query = "SELECT * FROM recipes WHERE recipe_name LIKE '%$SearchInput%';";
$result = $conn->query($query);
$rows = $result->num_rows;
if ($rows != 0) {
    while ($row = $result->fetch_assoc()) {
        $recipes[] = $row;
    }
} 

$conn->close();

header('Content-Type: application/json');
echo json_encode($recipes);
