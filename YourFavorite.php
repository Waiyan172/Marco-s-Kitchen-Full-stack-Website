<?php
session_start();
if (isset($_SESSION['email'])) {

    require_once 'dbinfo.php';
    $conn = new mysqli($host, $user, $pass, $database);
    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $userID = $_SESSION['userID'];

    $recipes = [];

    $query = "SELECT r.* FROM recipes r 
    INNER JOIN favorite f ON r.id = f.recipe_id 
    WHERE f.user_id = $userID";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $recipes[] = $row;
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

        <!-- Bootstrap icons cdn -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/bootstrap-icons.svg">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css">

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

        <style>
            body {
                background-image: url(./media/AccountInfo.jpg);
                background-repeat: no-repeat;
                color: white;
            }

            .container {
                background-color: rgba(255, 255, 200, 0.3);
                border-radius: 20px;
                box-shadow: 10px 9px 28px 4px rgba(0, 0, 0, 0.7);
                height: fit-content;
            }

            .header {
                border-bottom: 1px solid #ccc;
                padding-bottom: 10px;
                margin-bottom: 20px;
            }

            .input {
                border: none;
                border-bottom: 2px solid #353535;
                border-radius: 0;
                background-color: transparent;
            }

            .btn-edit {
                background-color: #007bff;
                color: #fff;
            }

            .btn-save {
                background-color: #28a745;
                color: #fff;
            }

            #userPhoto {
                max-width: 150px;
                height: auto;
                margin-bottom: 15px;
            }

            .sub-nav {
                border-bottom: 2px solid black;
            }

            .navbar-nav .nav-link {
                color: white;
            }

            .navbar-nav .nav-link.active {
                color: #000000;
            }

            #changePhotoBtn {
                border: none;
                background-color: transparent;
            }

            .input:focus {
                background-color: transparent;
            }

            .card {
                margin: 0 0.5em;
                box-shadow: 8px 4px 18px 0px rgba(0, 0, 0, 0.65);
                border: none;
                border-radius: 20px;
            }


            @media (min-width: 768px) {
                .carousel_item {
                    margin-right: 0;
                    flex: 0 0 50%;
                    display: block;
                }
            }

            @media (min-width: 768px) and (max-width: 1000px) {
                .carousel_item {
                    margin-right: 0;
                    flex: 0 0 100%;
                    display: block;
                }
            }

            .card .img-wrapper {
                max-width: 100%;
                height: 16rem;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 20px;
            }

            .card img {
                height: 100%;
                border-radius: 20px;
            }

            .card {
                box-shadow: 8px 9px 22px -4px rgba(0, 0, 0, 0.61);
                max-height: 600px;
            }

            .card:hover {
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transform: translateY(-5px);
            }

            @media (min-width: 768px) {
                #nav-section {
                    float: left;
                }
            }
        </style>

        </style>
    </head>

    <body>
        <div class="container p-md-5 mt-md-5">
            <div class="">
                <div class="header">
                    <h2>Account Information</h2>
                </div>
                <div class="">
                    <div class="">
                        <div class="col-md-4 d-flex flex-column align-items-center justify-content-center" id="nav-section">
                            <div class="row ">
                                <label for="PhotoInput">
                                    <img src="./media/profile.jpg" alt="User Photo" id="userPhoto" class="img-fluid rounded-circle col align-self-center">
                                </label>
                            </div>

                            <!-- Sub Nav Bar -->
                            <div class="row text-center mb-3" style="width: 100%;">
                                <nav class="navbar">
                                    <div class="d-flex justify-context-end"></div>
                                    <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#subNavLinks" aria-controls="subNavLinks" aria-expanded="false" aria-label="Toggle sub navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse d-md-block" id="subNavLinks">
                                        <ul class="navbar-nav" style="width: 100%;">
                                            <li class="nav-item sub-nav">
                                                <a class="nav-link nav-text" aria-current="page" href="index.php"><i class="bi bi-house"></i> Home</a>
                                            </li>
                                            <li class="nav-item sub-nav">
                                                <a class="nav-link " href="AccountInfoUpdate.php"><i class="fa-regular fa-user"></i> General Information</a>
                                            </li>
                                            <li class="nav-item sub-nav">
                                                <a class="nav-link" href="ChangePassword.php"><i class="bi bi-key"></i> Change Password</a>
                                            </li>
                                            <li class="nav-item sub-nav">
                                                <a class="nav-link active" aria-current="page" href="YourFavorite.php"><i class="fa-regular fa-heart"></i> Your Favourite</a>
                                            </li>
                                            <li class="nav-item sub-nav">
                                                <a class="nav-link " aria-current="page" href="#"><i class="fa-solid fa-question"></i> Help</a>
                                            </li>
                                            <li class="nav-item sub-nav">
                                                <a class="nav-link logout-link" aria-current="page" href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>

                        <!-- Your Favorite Section -->
                        <div class="col-md-8" style="float: right;">
                            <div class="row justify-content-center" id="fav-section">
                                <div id="nofavrecipe">
                                    <?php
                                    if ($result->num_rows <= 0) {
                                        echo '<div class="alert alert-info" role="alert">No favorite recipes yet!</div>';
                                    }
                                    ?>
                                </div>

                                <?php foreach ($recipes as $recipe) { ?>

                                    <div class="carousel_item my-3">
                                        <a href="" class="detail_link">
                                            <div class="card">
                                                <div class="position-absolute top-0 end-0 ">
                                                    <button class="btn btn-lg btn-outline-danger delete-btn rounded-circle" data-recipe-id="<?php echo $recipe['id']; ?>">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </div>
                                                <div class="img-wrapper"><img src="<?php echo $recipe['recipe_photo']; ?>" class="d-block w-100" alt="<?php echo $recipe['recipe_name']; ?>"> </div>
                                                <div class="card-body">
                                                    <a class="fs-5 fw-bold text-decoration-none text-dark card_title detail_link" href="RecipeDetail.php?recipe_id=<?php echo $recipe['id']; ?>"><?php echo $recipe['recipe_name']; ?></a>
                                                    <div class="rating mx-2 my-3">
                                                        <span class="star">&#9733;</span>
                                                        <span class="star">&#9733;</span>
                                                        <span class="star">&#9733;</span>
                                                        <span class="star">&#9733;</span>
                                                        <span class="star">&#9733;</span>
                                                        <span class="ms-2">5.0</span>
                                                    </div>
                                                    <a class="btn btn-dark col-12 detail_link" href="RecipeDetail.php?recipe_id=<?php echo $recipe['id']; ?>" class="card-link">More</a>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {


                $(document).on('click', '.delete-btn', function(event) {
                    event.preventDefault();

                    // var recipeId = $(this).data('recipe-id');
                    var deleteButton = $(this); 
                    var recipeId = deleteButton.data('recipe-id');

                    $.ajax({
                        type: 'GET',
                        url: 'DeleteFavoriteApi.php',
                        data: {
                            recipe_id: recipeId
                        },
                        success: function(response) {
                            if (response === 'deleted') {
                                deleteButton.closest('.carousel_item').remove();
                                alert('Recipe deleted successfully!');
                            } else {
                                alert('Error deleting recipe');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('Error deleting recipe');
                        }
                    });
                });

                $('.logout-link').click(function(e) {
                    e.preventDefault();

                    if (confirm('Are you sure you want to logout?')) {
                        $.ajax({
                            type: 'POST',
                            url: 'Logout.php', 
                            success: function(response) {
                                if (response === 'Success') {
                                    
                                    window.location.href = "Login.php";
                                } else {
                                    console.error('Logout failed');
                                }
                            },
                            error: function(error) {
                                console.error('Error during logout:', error);
                            }
                        });
                    }
                });
            });
        </script>

    </body>

    </html>
<?php
} else {
    header("Location:Login.php");
}
?>