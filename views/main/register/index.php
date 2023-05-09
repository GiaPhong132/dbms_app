<!DOCTYPE html>
<html lang="en">
<?php error_reporting(E_ALL ^ E_WARNING);  ?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BKSHEPO - Register</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="/dbms_app/public/images/icons/favicon_register.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/dbms_app/public/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/dbms_app/public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/dbms_app/public/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/dbms_app/public/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/dbms_app/public/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/dbms_app/public/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/dbms_app/public/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/dbms_app/public/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/dbms_app/public/css/util.css">
    <link rel="stylesheet" type="text/css" href="/dbms_app/public/css/main.css">

</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('/dbms_app/public/images/tech-blocks.jpeg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

                <form action="index.php?page=main&controller=register&action=submit" method="POST" class="login100-form validate-form">

                    <span class="login100-form-title p-b-20">
                        <strong>Sign Up</strong>
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <span id='email_warning'></span>
                        <input onkeyup='ValidateEmail(this);' class="input100" required type="text" name="email" placeholder="Type your email">
                        <span class="focus-input100" data-symbol="&#9993;"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="First name is required">
                        <span class="label-input100">First Name</span>
                        <input class="input100" required type="text" name="first_name" placeholder="Type your first name">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Last name is required">
                        <span class="label-input100">Last name</span>
                        <input class="input100" required type="text" name="last_name" placeholder="Type your last name">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Age is required">
                        <span class="label-input100">Age</span>
                        <span id='age_warning'></span>
                        <input onkeyup="ValidateAge(this)" class="input100" required type="number" name="age" placeholder="Type your age">
                        <span class="focus-input100" data-symbol="&#9881;"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Phone number is required">
                        <span class="label-input100">Phone number</span>
                        <input class="input100" required type="number" name="phone_number" placeholder="Type your phone number">
                        <span class="focus-input100" data-symbol="&#9742;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input onkeyup='check();' required class="input100" type="password" name="password" placeholder="Type your password">
                        <span style="color: rgb(0, 0, 0);" class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <!--Remember to Check password with retype password is match with password -->
                    <div class="wrap-input100 validate-input" data-validate="Retype password is required">
                        <span class="label-input100">Retype Password</span>
                        <span id='message'></span>
                        <input onkeyup='check();' required class="input100" type="password" name="retype_password" placeholder="Retype your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <div class="form-check" style="padding-left: 0;">
                        <div class="row">
                            <label class="col-md-3 col-form-label">Gender:</label>
                        </div>
                    </div>

                    <div class="form-check form-check-inline" style="padding-left: 1cm;">
                        <input class="form-check-input" type="radio" name="gender" value="1">
                        <label class="form-check-label">Male</label>
                    </div>

                    <div class="form-check form-check-inline" style="padding-left: 0.5cm;">
                        <input class="form-check-input" type="radio" name="gender" value="0">
                        <label class="form-check-label">Female</label>
                    </div>

                    <div class="form-check form-check-inline" style="padding-left: 0.5cm;">
                        <input class="form-check-input" type="radio" name="gender" value="-1">
                        <label class="form-check-label">Other</label>
                    </div>

                    <div class="text-right p-t-8 p-b-31">
                        <a href="#" style="color: grey;">
                            Forgot password?
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                <input style="background-color:transparent" class="login100-form-btn" type="submit" value="Sign up">
                            </button>
                        </div>



                    </div>

                    <div class="txt1 text-center p-t-54 p-b-20">
                        <span>
                            <a href="index.php?page=main&controller=login&action=index" style="color: grey;">Sign In</a>
                        </span>
                    </div>

                    <div class="flex-col-c p-t-20">
                        <span class="txt1 p-b-0">
                            <a href="index.php?page=main&controller=layouts&action=index" style="color: grey;">Return Home</a>
                        </span>
                    </div>

                </form>

                <div class="login100-more" style="background-image: url('/dbms_app/public/assets/img/slide/VNG Campus 31.jpg');">
                </div>
            </div>

        </div>
    </div>

    <script>
        var check = function() {
            let psw1 = document.getElementsByName("password");
            let psw2 = document.getElementsByName("retype_password");
            if (psw1[0].value === psw2[0].value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Matching';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Not matching';
            }
        }

        function ValidateEmail(inputText) {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (inputText.value.match(mailformat)) {
                document.getElementById('email_warning').style.color = 'green';
                document.getElementById('email_warning').innerHTML = 'Valid';
            } else {
                document.getElementById('email_warning').style.color = 'red';
                document.getElementById('email_warning').innerHTML = 'Not valid';
            }
        }

        function ValidateAge(age) {
            document.getElementById('age_warning').innerHTML = '';
            if ((age.value <= 0 || age.value > 200)) {
                document.getElementById('age_warning').style.color = 'red';
                document.getElementById('age_warning').innerHTML = 'Not valid';
            }
        }
    </script>

</body>

</html>