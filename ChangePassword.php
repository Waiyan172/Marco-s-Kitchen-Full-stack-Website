<?php
session_start();
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
    </style>

    </style>
</head>

<body>
    <div class="container p-5 mt-md-5">
        <div class="">
            <div class="header">
                <h2>Account Information</h2>
            </div>
            <div class="">
                <div class="row">
                    <div class="col-md-4 d-flex flex-column align-items-center justify-content-between partation">
                        <!-- User Photo -->
                        <div class="row">
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
                                            <a class="nav-link" href="AccountInfoUpdate.php"><i class="fa-regular fa-user"></i> General Information</a>
                                        </li>
                                        <li class="nav-item sub-nav">
                                            <a class="nav-link active" href="ChangePassword.php"><i class="bi bi-key"></i> Change Password</a>
                                        </li>
                                        <li class="nav-item sub-nav">
                                            <a class="nav-link " aria-current="page" href="YourFavorite.php"><i class="fa-regular fa-heart"></i> Your Favourite</a>
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
                    <!-- Change Password -->
                    <div class="col-md-8 py-5">
                        <form id="changePwForm">
                            <div class="form-group mb-3">
                                <label for="OldPassword">Old Password</label>
                                <input type="password" class="form-control input" id="OldPassword">
                                <div id="oldPasswordError" class="text-danger fw-bold"></div> 
                            </div>

                            <div class="form-group mb-3">
                                <label for="NewPassword">New Password</label>
                                <input type="password" class="form-control input" id="NewPassword">
                                <div id="newPasswordError" class="text-danger fw-bold"></div> 
                            </div>

                            <div class="form-group mb-3">
                                <label for="ConfirmPassword">Confirm Password</label>
                                <input type="password" class="form-control input" id="ConfirmPassword">
                                <div id="confirmPasswordError" class="text-danger fw-bold"></div> 
                            </div>


                            <button type="submit" class="btn btn-dark  mt-2" id="ChangePasswordBtn">Change</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#changePwForm').submit(function(event) {
                event.preventDefault();

                var oldPassword = $('#OldPassword').val();
                var newPassword = $('#NewPassword').val();
                var confirmPassword = $('#ConfirmPassword').val();

                $('#oldPasswordError').text('');
                $('#newPasswordError').text('');
                $('#confirmPasswordError').text('');


                $.ajax({
                    type: 'POST',
                    url: 'ChangePasswordApi.php',
                    data: {
                        oldPassword: oldPassword,
                        newPassword: newPassword,
                        confirmPassword: confirmPassword
                    },
                    success: function(response) {
                        if (response === 'Success') {
                            window.location.href = "ChangePassword.php";
                            console.log('Password changed successfully');
                        } else {
                           
                            if (response === 'Old Password Error!') {
                                $('#oldPasswordError').text('Incorrect old password.');
                            } else if (response === 'Confirm Password Error!') {
                                $('#confirmPasswordError').text('Confirm password does not match.');
                            } else {
                                console.error('Error changing password:', response);
                            }

                        }
                    },
                    error: function(error) {
                        console.error('AJAX error:', error);
                    }
                });
            });

            $('.logout-link').click(function(e) {
                e.preventDefault();

                if (confirm('Are you sure you want to logout?')) {
                    $.ajax({
                        type: 'POST',
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