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

  <style>
    body {
      background-image: url(./media/register.jpg);
      background-size: cover;
    }

    .form {
      background-color: rgba(100, 100, 100, 0.5);
      border-radius: 10%;
    }

    .input {
      background-color: transparent;
      border: none;
      border-radius: 0;
      border-bottom: 2px solid white;
      color: white;
    }

    .input:focus {
      background-color: transparent;
      color: white;
    }

    .input::placeholder {
      color: white;
    }

    .button {
      background-color: white;
      color: black;
    }

    .button:hover {
      background-color: black;
      color: white;
    }
  </style>

</head>

<body>

  <div class="d-flex align-items-center vh-100">
    <div class="container vh-100">
      <div class="row d-flex justify-content-end align-items-center h-100">
        <div class="col-12 col-md-7 col-lg-5 col-xl-5">
          <div class="card form" style="border-radius: 15px;">
            <div class="card-body">
              <h2 class="text-uppercase text-center mb-4 text-white">Create an account</h2>
              <form>
                <div class="form-outline mb-4">
                  <input type="text" id="firstname" class="form-control form-control-lg input" placeholder="First Name" required />
                  <span class="error-message text-warning" id="firstnameError" style="display: none;">Please enter your first name.</span>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="lastname" class="form-control form-control-lg input" placeholder="Last Name" required />
                  <span class="error-message text-warning" id="lastnameError" style="display: none;">Please enter your last name.</span>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="email" class="form-control form-control-lg input" placeholder="Email" required />
                  <span class="error-message text-warning" id="emailError" style="display: none;">Please enter your email.</span>
                  <span class="error-message text-warning" id="emailFormatError" style="display: none;">Please enter email.</span>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="password" class="form-control form-control-lg input" placeholder="Password" required />
                  <span class="error-message text-warning" id="passwordError" style="display: none;">Please enter Password.</span>
                  <span class="error-message text-warning" id="passwordFormatError" style="display: none;">Password must have at least 8 characters with at least one uppercase letter, one lowercase letter, and one number.</span>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="confirmpassword" class="form-control form-control-lg input" placeholder="Confirm Password" required />
                  <span class="error-message text-warning" id="confirmpasswordError" style="display: none;">Confirm Password does not match with Password.</span>
                </div>

                <div class="form-outline mb-4">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" id="chief" value="chef">
                    <label class="form-check-label text-white" for="chef">Chef</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" id="customer" value="customer">
                    <label class="form-check-label text-white" for="customer">Customer</label>
                  </div>
                  <span class="error-message text-warning" id="roleError" style="display: none;">Please choose one role.</span>
                </div>

                <div class="form-check d-flex justify-content-center mb-3">
                  <input class="form-check-input me-2" type="checkbox" value="" id="checkbox" required checked />
                  <label class="form-check-label text-white" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body-primary">Terms of service</a>
                  </label>
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" id="register_btn" class="btn btn-block btn-lg button">Register</button>
                </div>
                <p class="text-center text-white mt-3">Have already an account? <a href="Login.php" class="fw-bold text-white" style="text-decoration: none;">Login here</a></p>
              </form>
              <div id="err_msg" class="text-warning"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    $('Document').ready(function() {
      $('#register_btn').click(function(e) {
        e.preventDefault();
        var fname = $('#firstname').val();
        var lname = $('#lastname').val();
        var email = $('#email').val();
        var pass = $('#password').val();
        var conpass = $('#confirmpassword').val();
        var role = $('input[name=role]:checked').val();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d\s])[a-zA-Z\d\S]{8,}$/;

        $('#firstnameError').hide();
        $('#lastnameError').hide();
        $('#emailError').hide();
        $('#emailFormatError').hide();
        $('#passwordError').hide();
        $('#passwordFormatError').hide();
        $('#confirmpasswordError').hide();
        $('#roleError').hide();

        if (fname === '' || lname === '' || email === '' || pass === '' || pass !== conpass || !role || !emailRegex.test(email)) {
          if (fname === '') {
            $('#firstnameError').show();
          }

          if (lname === '') {
            $('#lastnameError').show();
          }

          if (email === '') {
            $('#emailError').show();
          }

          if (!emailRegex.test(email)) {
            $('#emailFormatError').show();
          }

          if (pass === '') {
            $('#passwordError').show();

          }

          if (!passwordRegex.test(pass)) {
            $('#passwordFormatError').show();

          }

          if (pass !== conpass) {
            $('#confirmpasswordError').show();

          }

          if (!role) {
            $('#roleError').show();

          }
          return;
        }

        $.ajax({
            method: "POST",
            url: "RegisterApi.php",
            data: {
              firstname: fname,
              lastname: lname,
              email: email,
              password: pass,
              role: role
            }
          })

          .done(function(msg) {

            if (msg == 'Success') {
              window.location.href = "Login.php";
            } else if (msg == 'Already Registered') {
              $('#err_msg').html('This email is already registered');
            } else {
              alert("Unable to register!");
            }

          });
      })

    })
  </script>
</body>

</html>