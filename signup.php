<?php
session_start();
/*

The first way calls session_start() in the header of every page, regardless of whether the user is logged in or not.
This is ideally the best option for a number of reasons.

 */

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>YouCode | Scrum Board</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
    <style>
        body{
            background-image:url("./assets/img/bg.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;

        }
    </style>
	<!-- ================== END core-css ================== -->
</head>

<body>

<div class="container d-flex justify-content-center align-items-center h-100 text-light">
    <div class="row w-100 justify-content-start">
        <div class="col-lg-6 col-sm-12 ">
            <form class="g-3 needs-validation w-100 p-5 text-center bg-gradient " action="process.php" method="post" novalidate>
                <h3 class="h3">Create an account</h3>
                <?php if (isset( $_SESSION['err-form'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show d-flex" role="alert">
                    <strong>Sign up Failed ! </strong>
                    <div><?php echo  $_SESSION['err-form']; unset($_SESSION['err-form']) ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif;?>

                <div class="mb-3 text-start">
                    <label for="validationCustom01" class="form-label mb-2">First name</label>
                    <input type="text" class="form-control bg-transparent text-light fs-14px" id="validationCustom01" name="f_name" value='<?php echo (isset($_SESSION['register-info'])) ? $_SESSION['register-info'][0]  :'' ?>' required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="mb-3 text-start">
                    <label for="validationCustom02" class="form-label mb-2">Last name</label>
                    <input type="text" class="form-control bg-transparent text-light fs-14px" id="validationCustom02" value='<?php echo (isset($_SESSION['register-info'])) ? $_SESSION['register-info'][1]  :'' ?>' name="s_name" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="mb-3 text-start">
                    <label for="validationCustomUsername" class="form-label mb-2">Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" class="form-control bg-transparent text-light fs-14px" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="email" value='<?php echo (isset($_SESSION['register-info'])) ? $_SESSION['register-info'][2]  :'' ?>' required>
                        <div class="invalid-feedback">
                            Please enter your email.
                        </div>
                    </div>
                </div>

                <div class="mb-3 text-start">
                    <label for="validationCustomUsername" class="form-label mb-2">Password</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-shield-lock"></i></span>
                        <input type="password" class="form-control bg-transparent text-light fs-14px" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="pwd" value='<?php echo (isset($_SESSION['register-info'])) ? $_SESSION['register-info'][3]  :'' ?>' required>
                        <div class="invalid-feedback">
                            Please choose a password.
                        </div>
                    </div>
                </div>
                <div class="mb-3 text-start ">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>

                </div>
                <div class="col-12">
                    <button class="btn  w-100"  style="background-color: #39cb78" name="signup-btn" type="submit">Sign Up</button>
                </div>
                <div class="col-12 mt-3">
                    <a href="login.php" class="link-white ">I have already an account </a>
                </div>
            </form>
        </div>
    </div>
</div>




	<!--=================== JQUERY CDN =================================-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        /* get it from bootstrap documentation */
        (function () {
            'use strict'
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')
            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

</body>

</html>