<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/general.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <!-- Fontawsome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css">
  <title>Marco Dining</title>

  <style>
    body {
      background-color: #faebd7;
    }

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

    #AccBtn {
      border: 1px solid #FF8303;
      color: #FF8303;
    }

    #AccBtn:hover {
      background-color: #FF8303;
      color: white;
    }

    #SearchInput {
      background-color: #b1b0b0;
      color: black;
    }

    #SearchInput:focus {
      border: 3px solid #FF8303;
    }

    #SearchInput::placeholder {
      color: black;
    }

    #Searchbtn {
      border: none;
      text-decoration: none;
      color: black;
      background-color: #FF8303;
    }

    .dropdown {
      width: 150px;
    }

    .dropdown select {
      background-color: #b1b0b0;
      color: black;
    }

    .dropdown select option {
      background-color: white;
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
            <a class="nav-link " aria-current="page" href="index.php"><i class="bi bi-house"></i>  Home</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link " href="AccountInfoUpdate.php"><i class="fa-regular fa-user"></i> My Account</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link" href="YourFavorite.php"><i class="fa-regular fa-heart"></i> Your Favorite</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link active " href="RecipeSearch.php"><i class="fa-solid fa-utensils"></i> Recipes</a>
          </li>
        </ul>
        <form class="d-flex">
          <?php
          if (!isset($_SESSION['email'])) { ?>
            <a class="btn my-2 my-sm-0" id="loginbtn" href="Login.php">Login</a>
          <?php } else {
          ?>

            <div class="btn-group dropdown-center">
              <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false" id="AccBtn">
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

  <!-- Search and Filter Start-->
  <div id="SearchForm" class='container'>
    <form class="d-flex mt-5" role="search" id="SearchForm">
      <input class="form-control me-2" id="SearchInput" type="search" placeholder="Search Your Recipes" aria-label="Search">
      <a type="button" class="p-2 rounded" type="submit" id="Searchbtn">Search</a>
    </form>

    <div class="mt-3">
      <div class="d-flex justify-content-between row row-cols-2 row-cols-sm-3 row-cols-md-6 ">

        <div class="d-flex justify-content-center drop_down">
          <div class="mb-2 dropdown">
            <select class="form-select" id="CategoryFilter">
              <option value="%">Category</option>
              <option value="Vegetarian">Vegetarian</option>
              <option value="Meat">Meat</option>
              <option value="Seafood">Seafood</option>
              <option value="Cake">Cake</option>
              <option value="Pasta">Pasta</option>
              <option value="Salad">Salad</option>
              <option value="Noodles">Noodles</option>
            </select>
          </div>

        </div>


        <div class="d-flex justify-content-center drop_down">
          <div class="mb-2 dropdown">
            <select class="form-select" id="MealTypeFilter">
              <option value="%" selected>Meal Type</option>
              <option value="Main Course">Main Course</option>
              <option value="Appetizer">Appetizer</option>
              <option value="Dessert">Dessert</option>
            </select>
          </div>

        </div>


        <div class="d-flex justify-content-center drop_down">
          <div class="mb-2 dropdown">
            <select class="form-select" id="DurationFilter">
              <option value="%" selected>Duration</option>
              <option value="10">10 minutes</option>
              <option value="15">15 minutes</option>
              <option value="20">20 minutes</option>
              <option value="30">30 minutes</option>
              <option value="45">45 minutes</option>
              <option value="60">60 minutes</option>
              <option value="90">90 minutes</option>
              <option value="120">120 minutes</option>
              <option value="240">240 minutes</option>
            </select>
          </div>

        </div>

        <div class="d-flex justify-content-center drop_down">
          <div class="mb-2 dropdown">
            <select class="form-select" id="DifficultyFilter">
              <option value="%" selected>Difficulty</option>
              <option value="Easy">Easy</option>
              <option value="Intermediate">Intermediate</option>
              <option value="Difficult">Difficult</option>
            </select>
          </div>
        </div>


        <div class="d-flex justify-content-center drop_down">
          <div class="mb-2 dropdown">
            <select class="form-select" id="CountryFilter">
              <option value="%" selected>Country</option>
              <option value="America">America</option>
              <option value="China">China</option>
              <option value="France">France</option>
              <option value="Greece">Greece</option>
              <option value="India">India</option>
              <option value="Italy">Italy</option>
              <option value="Japan">Japan</option>
              <option value="Korea">Korea</option>
              <option value="Mexico">Mexico</option>
              <option value="Middle East">Middle East</option>
              <option value="Myanmar">Myanmar</option>
              <option value="Russia">Russia</option>
              <option value="Thailand">Thailand</option>
              <option value="Various">Various</option>
            </select>
          </div>

        </div>


        <div class="d-flex justify-content-center drop_down">
          <div class="mb-2 dropdown">
            <select class="form-select" id="ServesFilter">
              <option value="%" selected>Serves</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Search and Filter Start-->

  <div class="container mt-5" id="SearchResult">
    <div class="row my-3">
      <h2 class="col-md-3 col-9 ">Search Recipes</h2>
    </div>
    <div class="row" id="SearchResultCards">

    </div>
  </div>

  <script>
    $(document).ready(function() {

      var SearchInput = $('#SearchInput').val();

      $.ajax({
        type: 'POST',
        url: 'recipeSearchAPI.php',
        dataType: 'json',
        data: {
          SearchInput: SearchInput
        },
        success: function(data) {

          if (data.length > 0) {
            RecipesDisplay(data);
          } else {
            searchResult.html('<p>No Recipe Found!</p>');
          }
        },
        error: function(xhr, status, error) {
          console.error(status + ": " + error);
        }
      });

      $('#Searchbtn').click(function(event) {
        event.preventDefault();

        var SearchInput = $('#SearchInput').val();

        $.ajax({
          type: 'POST',
          url: 'recipeSearchAPI.php',
          dataType: 'json',
          data: {
            SearchInput: SearchInput
          },
          success: function(data) {

            if (data.length > 0) {
              RecipesDisplay(data);
            } else {
              searchResult.html('<p>No Recipe Found!</p>');
            }
          },
          error: function(xhr, status, error) {
            console.error(status + ": " + error);
          }
        });
      });

      $('#CategoryFilter, #MealTypeFilter, #DurationFilter, #DifficultyFilter, #CountryFilter, #ServesFilter').change(function() {
        var v1 = $("#SearchInput").val();
        var v2 = $("#CategoryFilter").val();
        var v3 = $("#MealTypeFilter").val();
        var v4 = $("#DurationFilter").val();
        var v5 = $("#DifficultyFilter").val();
        var v6 = $("#CountryFilter").val();
        var v7 = $("#ServesFilter").val();
        $.ajax({
            method: "POST",
            url: "RecipeFilterApi.php",
            data: {
              v1: v1,
              v2: v2,
              v3: v3,
              v4: v4,
              v5: v5,
              v6: v6,
              v7: v7
            }
          })
          .done(function(data) {
            console.log(data);
            RecipesDisplay(data);
          });
      });

      function RecipesDisplay(data) {
        var result_recipes = '';

        data.forEach(function(recipe) {
          result_recipes += `
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
          $('#SearchResultCards').html(result_recipes);
        });
      }
    })
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</body>

</html>