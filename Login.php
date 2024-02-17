<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css">
    <title>Marco Dining</title>
    <style>
        body {
            background-image: url(./media/login.jpg);
            background-size: cover;
            background-position: left;
        }

        .form {
            background-color: rgba(100, 100, 100, 0.5);
            border-radius: 10%;
        }

        #Email,
        #Password {
            border: none;
            border-radius: 0;
            background-color: transparent;
            border-bottom: 2px solid white;
            color: white;
        }

        #Email::placeholder,
        #Password::placeholder {
            color: white;
        }

        .button {
            background-color: rgba(255, 255, 255, 0.9);
            color: black;
        }

        .button:hover {
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>
    <section>
        <div class="container py-5 vh-100">
            <div class="row d-flex align-items-center justify-content-end h-100 p-3">
                <div class="col-md-6 col-lg-5 col-xl-5 offset-xl-1 mt-5 form p-5">
                    <label for="loginForm" class="text-white fs-2 fw-bold mb-4">Login Form</label>
                    <form id="loginForm">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="Email" class="form-control form-control-lg" placeholder="Email Address" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="Password" class="form-control form-control-lg" placeholder="Password" />
                        </div>

                        <!-- Role Select -->
                        <div class="form-outline mb-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="chef" value="chief">
                                <label class="form-check-label text-white" for="chef">Chef</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="customer" value="customer">
                                <label class="form-check-label text-white" for="customer">Customer</label>
                            </div>
                        </div>

                        <div id="error_message" class="text-danger"></div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="RememberMe" checked/>
                                <label class="form-check-label text-white" for="RememberMe"> Remember me </label>
                            </div>
                            <a href="#" class="text-white" style="text-decoration: none;">Forgot password?</a>
                        </div>

                        <!-- Submit button -->
                        <div class="row justify-content-between">
                            <button type="button" class="btn btn-lg col-3 button" onclick="window.location.href='index.php'">Home</button>
                            <button class="btn btn-lg col-3 button" id="login_btn">Login</button>
                        </div>

                        <div class="row my-3">
                            <p class="text-white">Don't have an Account? <a href="Register.php" class="text-primary col-3" style="text-decoration: none;">Sign Up</a></p>
                        </div>

                        <div id="icons" class="fs-2">
                            <a class="px-2 text-white"><i class="fa-brands fa-google"></i></a>
                            <a class="px-2 text-white"><i class="fa-brands fa-facebook"></i></a>
                            <a class="px-2 text-white"><i class="fa-brands fa-instagram"></i></a>
                            <a class="px-2 text-white"><i class="fa-brands fa-twitter"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        $('Document').ready(function() {
            $('#login_btn').click(function(e) {
                e.preventDefault();
                var email = $('#Email').val();
                var password = $('#Password').val();
                var role = $("input[name='role']:checked").val();

                $.ajax({
                        method: "POST",
                        url: "LoginApi.php",
                        data: {
                            email: email,
                            pass: password,
                            role: role
                        }
                    })
                    .done(function(msg) {
                        if (msg == 'Success') {
                            window.location.href = "AccountInfoUpdate.php";
                        } else {
                            $('#error_message').text('Invalid email, password, or role!');
                        }
                    });
            });
        });
    </script>
</body>

</html>