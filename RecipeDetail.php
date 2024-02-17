<?php
session_start();

if (isset($_GET['recipe_id'])) {
    $recipe_id = $_GET['recipe_id'];

    require_once 'dbinfo.php';
    $conn = new mysqli($host, $user, $pass, $database);
    if ($conn->connect_error)
        die($conn->connect_error);
    $query = "select * from recipes where id = '$recipe_id'";
    $result = $conn->query($query);
    $rows = $result->num_rows;
    if ($rows != 0) {
        $recipe = $result->fetch_assoc();

        $recipe_name = $recipe['recipe_name'];
        $duration = $recipe['cooking_time'];
        $description = $recipe['description'];
        $serves = $recipe['serves'];
        $category = $recipe['category'];
        $meal_type = $recipe['meal_type'];
        $country = $recipe['country'];
        $difficulty_level = $recipe['difficulty_level'];
        $ingredients = $recipe['ingredients'];
        $method = $recipe['method'];
        $recipe_photo = $recipe['recipe_photo'];
    } else {
        echo "Recipe not found!.";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Fontawsome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css">
    <style>
        .navbar-dark .navbar-nav .nav-link.active {
            background-color: #212529;
        }

        .navbar-dark .navbar-nav .nav-link {
            border-bottom: none;
        }

        #loginbtn {
            border: 1px solid #FF8303;
            color: #FF8303;
        }

        #loginbtn:hover {
            background-color: #FF8303;
            color: white;
        }

        .accountinfobtn {
            background-color: #FF8303;
        }

        .accountinfobtn:hover {
            background-color: transparent;
            border: 1px solid #FF8303;
            color: #FF8303;
        }

        #recipes_img {
            height: auto;
            width: 100%;
            box-shadow: 13px 8px 39px -3px rgba(0, 0, 0, 0.78);
            object-fit: contain;
            display: block;
        }

        #recipes_img:hover {
            border-radius: 15%;
            transform: translateY(-5px);
            border: 5px solid #212529;
        }

        input {
            border: none;
            background-color: transparent;
        }

        #Add_favourite_btn,
        #rating_btn {
            background-color: transparent;
            padding: 1px 4px;
        }

        #Add_favourite_btn:hover {
            box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.75);
            transform: translateY(-5px);
        }

        #rating_btn:hover {
            box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.75);
            transform: translateY(-5px);
        }

        #Add_favourite_btn a,
        #rating_btn a {
            margin-left: 10px;
            text-decoration: none;
            color: black;
        }

        #review_container {
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <!-- Nav bar start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top nav-tabs" id="">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">
                <img src="media/Logo_cut2.png" width="50" height="50" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-3">
                        <a class="nav-link " aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link " href="AccountInfoUpdate.php"><i class="fa-regular fa-user"></i> My Account</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="YourFavorite.php"><i class="fa-regular fa-heart"></i> Your Favourite</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="RecipeSearch.php"><i class="fa-solid fa-utensils"></i> Recipes</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <?php
                    if (!isset($_SESSION['email'])) { ?>
                        <a class="btn my-2 my-sm-0" id="loginbtn" href="Login.php">Login</a>
                    <?php } else {
                    ?>

                        <div class="btn-group dropdown-center">
                            <button type="button" class="btn accountinfobtn" aria-expanded="false" onclick=" window.location.href = 'AccountInfoUpdate.php';">
                                <?php echo $_SESSION['first_name']; ?>
                            </button>
                        </div>

                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </nav>
    <!-- Nav bar end -->

    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-6 mb-4">
                <img class="col-12" id="recipes_img" src="<?php echo $recipe_photo; ?>" alt="Recipes_img">
            </div>
            <div class="col-md-6">
                <div class="row justify-content-around  align-items-center">
                    <div class="col-5">
                        <div class="col-12">
                            <label for="Serves" class="fw-bold">Category</label>
                        </div>
                        <div class="col-12">
                            <input type="text" id="Serves" value="<?php echo $category; ?>">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="col-12">
                            <label for="Serves" class="fw-bold">Meal Type</label>
                        </div>
                        <div class="col-12">
                            <input type="text" id="Serves" value="<?php echo $meal_type; ?>">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-around mt-3">
                    <div class="col-5">
                        <div class="col-12">
                            <label for="Preparation_Time" class="fw-bold">Duration</label>
                        </div>
                        <div class="col-12">
                            <input type="text" id="Preparation_Time" value="<?php echo $duration; ?>">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="col-12">
                            <label for="Cooking_Time" class="fw-bold">Serves</label>
                        </div>
                        <div class="col-12">
                            <input type="text" id="Cooking_Time" value="<?php echo $serves; ?>">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-start mt-3 ms-lg-3 ms-2">
                    <div class="col-5">
                        <div class="col-12">
                            <label for="Cooking_Time" class="fw-bold">Difficulty Level</label>
                        </div>
                        <div class="col-12">
                            <input type="text" id="Cooking_Time" value="<?php echo $difficulty_level; ?>">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center my-4 align-items-center">
                    <div class="d-flex justify-content-start">
                        <div class="ms-4 me-2">
                            <b><span id="average_rating">0.0</span> / 5</b>
                        </div>
                        <div class="me-4">
                            <i class="fa-solid fa-star main_star"></i>
                            <i class="fa-solid fa-star main_star"></i>
                            <i class="fa-solid fa-star main_star"></i>
                            <i class="fa-solid fa-star main_star"></i>
                            <i class="fa-solid fa-star main_star"></i>
                        </div>
                        <div class="me-4">
                            <h5><span id="total_review">0</span> Review</h5>
                        </div>
                    </div>

                </div>

                <div class="row justify-content-around  align-items-center">
                    <div class="col-6 ">
                        <button type="submit" id="rating_btn" class="fw-bold">
                            <i class="fa-solid fa-star"></i>
                            <a id="add_review"> Rate This Recipe</a>
                        </button>
                    </div>
                    <div class="col-6">
                        <button type="submit" id="Add_favourite_btn" class="fw-bold">
                            <i class="fa-solid fa-heart"></i>
                            <a href=""> Add to Favourite</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-4">
            <label for="" class="fs-4 fw-bold mb-3"><?php echo $recipe_name; ?></label>
            <p>
                <?php echo $description; ?>
            </p>
        </div>

        <div class="row">
            <div id="ingredient" class="col-md-6 ">
                <label for="Ingredients" class="fs-4 fw-bold mb-3">Ingredients</label>
                <div><?php echo $ingredients; ?></div>
            </div>

            <div class="col-md-6 ">
                <label for="Method" class="fs-4 fw-bold mb-3">Method</label>
                <div><?php echo $method; ?></div>
            </div>
        </div>
    </div>

    <!-- Review Session start -->
    <div class="container mt-5 px-5 py-2" id="review_container">
        <h3 class="mt-5 mb-5">User Reviews</h3>

        <div class="mt-5" id="review_content"></div>

    </div>
    <!-- Review Session end -->

    <!-- review modle box start -->
    <div id="review_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Submit Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_review">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center mt-2 mb-4">
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                    </h4>
                    <div class="form-group">
                        <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                    </div>
                    <div class="form-group text-center mt-4">
                        <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- review modle box end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            $('#Add_favourite_btn').click(function(event) {
                event.preventDefault();

                var recipeId = <?php echo $recipe_id; ?>;

                $.ajax({
                    type: 'GET',
                    url: 'AddToFavoritesApi.php',
                    data: {
                        recipe_id: recipeId
                    },
                    success: function(response) {
                        if (response === "added") {
                            alert('Recipe added to favorites successfully!');
                        } else if (response === "exists") {
                            alert('This Recipe is already in Your Favorites.');
                        } else {
                            alert('Error adding recipe to favorites');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error adding recipe to favorites');
                    }
                });
            });

            var rating_data = 0;

            $('#add_review').click(function() {

                <?php if (isset($_SESSION['email'])) { ?>
                    var recipeId = <?php echo $recipe_id; ?>;

                    $.ajax({
                        type: 'POST',
                        url: 'UserRatingCheckApi.php',
                        data: {
                            recipe_id: recipeId
                        },
                        success: function(response) {
                            if (response === 'rated') {
                                alert('You have already rated this recipe!');
                            } else {
                                $('#review_modal').modal('show');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('Error checking user rating');
                        }
                    });
                <?php } else { ?>
                    alert('Please log in to rate this recipe!');
                <?php } ?>
            });


            $('#close_review').click(function() {

                $('#review_modal').modal('hide');

            });

            $(document).on('mouseenter', '.submit_star', function() {

                var rating = $(this).data('rating');

                reset_background();

                for (var count = 1; count <= rating; count++) {

                    $('#submit_star_' + count).addClass('text-warning');

                }

            });

            function reset_background() {
                for (var count = 1; count <= 5; count++) {

                    $('#submit_star_' + count).addClass('star-light');

                    $('#submit_star_' + count).removeClass('text-warning');

                }
            }

            $(document).on('mouseleave', '.submit_star', function() {

                reset_background();

                for (var count = 1; count <= rating_data; count++) {

                    $('#submit_star_' + count).removeClass('star-light');

                    $('#submit_star_' + count).addClass('text-warning');
                }

            });

            $(document).on('click', '.submit_star', function() {

                rating_data = $(this).data('rating');

            });

            $('#save_review').click(function() {


                var user_review = $('#user_review').val();
                var recipeId = <?php echo $recipe_id; ?>;

                if (user_review == '') {
                    alert("Please Write Review for Recipe.");
                    return false;
                } else {
                    $.ajax({
                        url: "RatingApi.php",
                        method: "POST",
                        data: {
                            rating_data: rating_data,
                            user_review: user_review,
                            recipeID: recipeId
                        },
                        success: function(data) {
                            $('#review_modal').modal('hide');

                            load_rating_data();

                            alert(data);
                        }
                    })
                }

            });

            load_rating_data();

            function load_rating_data() {
                var recipeId = <?php echo $recipe_id; ?>;

                $.ajax({
                    url: "RatingApi.php",
                    method: "POST",
                    data: {
                        action: 'load_data',
                        recipeId: recipeId
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $('#average_rating').text(data.average_rating);
                        $('#total_review').text(data.total_review);

                        var count_star = 0;

                        $('.main_star').each(function() {
                            count_star++;
                            if (Math.ceil(data.average_rating) >= count_star) {
                                $(this).addClass('text-warning');
                                $(this).addClass('star-light');
                            }
                        });

                        if (data.review_data.length > 0) {
                            console.log(data.review_data.length);
                            var html = '';

                            for (var count = 0; count < data.review_data.length; count++) {
                                html += '<div class="row mb-3">';

                                html += '<div class="col-sm-11">';

                                html += '<div class="card">';

                                html += '<div class="card-header"><b>' + data.review_data[count].user_f_name + ' ' + data.review_data[count].user_l_name + '</b></div>';

                                html += '<div class="card-body">';

                                for (var star = 1; star <= 5; star++) {
                                    var class_name = '';

                                    if (data.review_data[count].rating >= star) {
                                        class_name = 'text-warning';
                                    } else {
                                        class_name = 'star-light';
                                    }

                                    html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                                }

                                html += '<br />';

                                html += data.review_data[count].user_review;

                                html += '</div>';

                                html += '<div class="card-footer text-right">On ' + data.review_data[count].datetime + '</div>';

                                html += '</div>';

                                html += '</div>';

                                html += '</div>';
                            }

                            $('#review_content').html(html);
                        }
                    }
                })
            }
        });
    </script>
</body>

</html>