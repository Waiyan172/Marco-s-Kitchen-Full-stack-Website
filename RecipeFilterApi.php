<?php
session_start();

    require_once 'dbinfo.php';
    $conn = new mysqli($host, $user, $pass, $database);
    if ($conn->connect_error)
        die('Fail Connection' . $conn->connect_error);

    $searchval = $_POST['v1'];
    $category = $_POST['v2'];
    $mealtype = $_POST['v3'];
    $duration = $_POST['v4'];
    $difficulty = $_POST['v5'];
    $country = $_POST['v6'];
    $serves = $_POST['v7'];

    $query = "SELECT * FROM recipes WHERE recipe_name LIKE 
        '%" . $searchval . "%' AND 
        category LIKE '$category' AND 
        meal_type LIKE '$mealtype' AND 
        cooking_time LIKE '$duration' AND 
        country LIKE '$country' AND 
        serves LIKE '$serves' AND 
        difficulty_level LIKE '$difficulty' ORDER BY recipe_name";


    $result = $conn->query($query);
    $all_rows = $result->fetch_all(MYSQLI_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($all_rows);

    $conn->close();

