<?php
session_start();
if (isset($_SESSION['email'])) {
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
                /* border-color: transparent; */
            }
        </style>

        </style>
    </head>

    <body>
        <div class="container p-5 mt-5">
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
                                                <a class="nav-link active" href="AccountInfoUpdate.php"><i class="fa-regular fa-user"></i> General Information</a>
                                            </li>
                                            <li class="nav-item sub-nav">
                                                <a class="nav-link" href="ChangePassword.php"><i class="bi bi-key"></i> Change Password</a>
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
                        <!-- Form Information -->
                        <div class="col-md-8">
                            <form id="accountForm">
                                <div class="row mb-3">
                                    <div class="form-group col-md-6">
                                        <label for="firstName">First Name</label>
                                        <input type="text" class="form-control input" id="firstName" readonly value="<?php echo $_SESSION['first_name']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" class="form-control input" id="lastName" readonly value="<?php echo $_SESSION['last_name']; ?>">
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control input" id="email" readonly value="<?php echo $_SESSION['email']; ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">Role</label>
                                    <input type="text" class="form-control input" id="role" readonly value="<?php echo $_SESSION['role']; ?>">
                                </div>
                                <!-- Edit and Save Buttons -->
                                <button type="button" class="btn btn-dark mt-2 mr-2" id="editBtn" onclick="enableEdit()">Edit</button>
                                <button type="submit" class="btn btn-dark  mt-2" id="saveBtn" disabled>Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

        <script>
            function enableEdit() {
                document.getElementById("firstName").readOnly = false;
                document.getElementById("lastName").readOnly = false;
                document.getElementById("email").readOnly = false;
                document.getElementById("editBtn").disabled = true;
                document.getElementById("saveBtn").disabled = false;
            }

            $(document).ready(function() {
                $('#accountForm').submit(function(event) {
                    event.preventDefault();

                    document.getElementById("firstName").readOnly = true;
                    document.getElementById("lastName").readOnly = true;
                    document.getElementById("email").readOnly = true;
                    document.getElementById("editBtn").disabled = false;
                    document.getElementById("saveBtn").disabled = true;

                    var firstName = $('#firstName').val();
                    var lastName = $('#lastName').val();
                    var email = $('#email').val();

                    $.ajax({
                        type: 'POST',
                        url: 'UpdateUserInfoApi.php',
                        data: {
                            firstName: firstName,
                            lastName: lastName,
                            email: email
                        },
                        success: function(response) {
                            if (response === 'Success') {
 
                                $('#firstName').val($_SESSION['first_name']);
                                $('#lastName').val($_SESSION['last_name']);
                                $('#email').val($_SESSION['email']);

                                console.log('Data updated successfully');
                            } else {
                                console.error('Error updating data');
                            }
                        },
                        error: function(error) {
                            console.error('Error updating data:', error);
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