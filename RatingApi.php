<?php
session_start();
require_once 'dbinfo.php';
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error)
    die($conn->connect_error);

if (isset($_POST["rating_data"])) {

    $recipeID = $_POST["recipeID"];
    $userID = $_SESSION['userID'];
    $rating = $_POST["rating_data"];
    $review = $_POST["user_review"];
    $user_f_name = $_SESSION['first_name'];
    $user_l_name = $_SESSION['last_name'];


    $query = "
        INSERT INTO ratings 
        (recipe_id, user_id, rating, review, date_time, user_f_name, user_l_name) 
        VALUES (?, ?, ?, ?, NOW(), ?, ?)
    ";

    $statement = $conn->prepare($query);
    $statement->bind_param("iissss", $recipeID, $userID, $rating, $review, $user_f_name, $user_l_name);

    if ($statement->execute()) {
        echo "Your Review & Rating Successfully Submitted";
    } else {
        echo "Error occurred while submitting the review & rating.";
    }
}


if (isset($_POST["action"])) {

    $recipe_id = $_POST['recipeId'];

    $average_rating = 0;
    $total_review = 0;
    $five_star_review = 0;
    $four_star_review = 0;
    $three_star_review = 0;
    $two_star_review = 0;
    $one_star_review = 0;
    $total_user_rating = 0;
    $review_content = array();

    $query = "
    SELECT * FROM ratings
    WHERE recipe_id = ?
    ORDER BY id DESC
";

    $statement = $conn->prepare($query);
    $statement->bind_param("i", $recipe_id);

    $statement->execute();
    $result = $statement->get_result();

    while ($row = $result->fetch_assoc()) {
        $review_content[] = array(
            'user_review'   =>    $row["review"],
            'rating'        =>    $row["rating"],
            'user_id'       =>    $row["user_id"],
            'user_f_name'       =>    $row["user_f_name"],
            'user_l_name'       =>    $row["user_l_name"],
            'recipe_id'     =>    $row["recipe_id"],
            'datetime'      =>    date('l jS, F Y h:i:s A', strtotime($row["date_time"]))
        );

        if ($row["rating"] == 5) {
            $five_star_review++;
        } elseif ($row["rating"] == 4) {
            $four_star_review++;
        } elseif ($row["rating"] == 3) {
            $three_star_review++;
        } elseif ($row["rating"] == 2) {
            $two_star_review++;
        } elseif ($row["rating"] == 1) {
            $one_star_review++;
        }

        $total_review++;
        $total_user_rating += $row["rating"];
    }

    $statement->close();

    $average_rating = ($total_review > 0) ? $total_user_rating / $total_review : 0;

    $output = array(
        'average_rating'    =>    number_format($average_rating, 1),
        'total_review'      =>    $total_review,
        'five_star_review'  =>    $five_star_review,
        'four_star_review'  =>    $four_star_review,
        'three_star_review' =>    $three_star_review,
        'two_star_review'   =>    $two_star_review,
        'one_star_review'   =>    $one_star_review,
        'review_data'       =>    $review_content
    );

    echo json_encode($output);
}
