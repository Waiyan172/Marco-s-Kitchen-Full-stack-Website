<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Fontawsome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css">
    <title>Marco Dining</title>
    <style>
        .navbar-dark .navbar-nav .nav-link.active {
            background-color: #212529;
            border-color: #FF8303;
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

        #AccBtn {
            border: 1px solid #FF8303;
            color: #FF8303;
        }

        #AccBtn:hover {
            background-color: #FF8303;
            color: white;
        }

        #main_session {
            background-image: url(media/bg1.jpg);
        }

        .banner-img {
            width: auto;
            height: 100%;
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
                flex: 0 0 33.333333%;
                display: block;
            }
        }

        @media (min-width: 768px) and (max-width: 1000px) {
            .carousel_item {
                margin-right: 0;
                flex: 0 0 50%;
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

        }

        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        @keyframes floating {
            0% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(0, 10px);
            }

            100% {
                transform: translate(0, 0);
            }
        }

        .banner-img img {
            animation: floating 3s ease-in-out infinite;
            height: auto;
            width: 100%;
        }

        .checkbtn {
            background-color: #FF8303;
        }

        .checkbtn:hover {
            border: 2px solid #FF8303;
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
                        <a class="nav-link active " aria-current="page" href="index.php"><i class="bi bi-house"></i>  Home</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link " href="AccountInfoUpdate.php"><i class="fa-regular fa-user"></i> My Account</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="YourFavorite.php"><i class="fa-regular fa-heart"></i> Your Favorite</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="#Top_Recipes"><i class="fa-regular fa-star"></i> Top Recipes</a>
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
                            <button type="button" class="btn" aria-expanded="false" onclick="window.location.href = 'AccountInfoUpdate.php';" id="AccBtn">
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

    <!-- Main Section Start -->
    <div class="container-fluid vh-100 " id="main_session">
        <div class="row">
            <div class="col-lg-6 mt-5 mt-md-0 d-flex flex-column justify-content-center">
                <div class="banner-text">
                    <p class="h1-title fs-1 fw-bold">
                        Welcome to
                        <span class="text-warning">Marco's Kitchen</span>
                    </p>
                    <p class="fs-4">This is our amazing selection of recipes created with care and passion. From comforting classics to innovative dishes, explore a world of culinary delights to satisfy your cravings.</p>
                    <div class="banner-btn mt-4">
                        <a href="RecipeSearch.php" class="btn sec-btn checkbtn">Check our Menu</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5 ">
                <div class="banner-img-wp">
                    <div class="banner-img ">
                        <img src="media/main_img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Section End -->

    <!--Top Recipes card start -->
    <div class="popular container" id="Top_Recipes">
        <div class="row my-3">
            <h2 class="col-md-3 col-9 ">Top Recipes</h2>
        </div>
        <div class="row" id="TopRecipesCards">

        </div>
    </div>
    <!-- Top Recipes card end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'TopRecipesApi.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.length > 0) {
                        var recipeCards = '';

                        data.forEach(function(recipe) {
                            recipeCards += `
                            <div class="carousel_item my-3">
                                <a href="RecipeDetail.php?recipe_id=${recipe.id}" class="detail_link">
                                    <div class="card">
                                        <div class="img-wrapper"><img src="${recipe.recipe_photo}" class="d-block w-100" alt="..."> </div>
                                        <div class="card-body">
                                            <a class="fs-5 fw-bold text-decoration-none text-dark card_title detail_link" href="RecipeDetail.php?recipe_id=${recipe.id}">${recipe.recipe_name}</a>
                                            <div class="row mt-3 d-flex justify-content-around">
                                                <div class="col-5 border border-dark rounded d-flex align-items-center justify-content-center d-flex flex-column">
                                                    <div class="">
                                                        <p class="m-0 p-0 fw-bold">Category</p>
                                                    </div>
                                                    <div class="">
                                                        <p class="m-0 ">${recipe.category}</p>
                                                    </div>
                                                </div>
                                                <div class="col-5 border border-dark rounded d-flex align-items-center justify-content-center d-flex flex-column">
                                                    <div class="">
                                                        <p class="m-0 p-0 fw-bold">Serves</p>
                                                    </div>
                                                    <div class="">
                                                        <p class="m-0 ">${recipe.serves}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3 d-flex justify-content-around">
                                                <div class="col-5 border border-dark rounded d-flex align-items-center justify-content-center d-flex flex-column">
                                                    <div class="">
                                                        <p class="m-0 p-0 fw-bold">Duration</p>
                                                    </div>
                                                    <div class="">
                                                        <p class="m-0 ">${recipe.cooking_time}</p>
                                                    </div>
                                                </div>
                                                <div class="col-5 border border-dark rounded d-flex align-items-center justify-content-center d-flex flex-column">
                                                    <div class="">
                                                        <p class="m-0 p-0 fw-bold">Difficulty</p>
                                                    </div>
                                                    <div class="">
                                                        <p class="m-0 ">${recipe.difficulty_level}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="btn btn-dark col-12 detail_link mt-4" href="RecipeDetail.php?recipe_id=${recipe.id}" class="card-link">More</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `;

                        });

                        $('#TopRecipesCards').html(recipeCards);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(status + ': ' + error);
                }
            });

        });
    </script>
</body>


</html>