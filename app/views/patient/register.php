<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/loginSignup.css">

    <title>DocShip | Register</title>
</head>

<body>
    <div class="container-fluid sign-up-form">
        <div class="row">
            <div class="col-lg-4 image"></div>
            <div class="col-lg-8 px-5 fill">
                <form action="<?php echo URLROOT; ?>/patient/register" method="post" class="mx-sm-3 mx-md-4 mx-lg-5">
                    <h1 class="text-center my-0 topic">Welcome to DocShip</h1>
                    <p class="text-center mb-2">
                    My Health. My Hospital.
                    </p>
                    <div class="form-row">
                        <div class="col-lg-6 my-1">
                            <input name="fname" type="text" class="form-control shadow-none"
                                placeholder="First name" />
                            <small>Please enter a valid name</small>
                        </div>
                        <div class="col-lg-6 my-1">
                            <input name="lname" type="text" class="form-control shadow-none"
                                placeholder="Last name" />
                            <small id="error-first-name">Please enter a valid name</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 my-1">
                            <input name="email" type="email" class="form-control shadow-none" placeholder="Email" />
                            <small id="error-email">Please enter a valid email</small>
                        </div>
                        <div class="col-lg-6 my-1">
                            <input name="telephone" type="tel" class="form-control shadow-none"
                                placeholder="Whatsapp No" />
                            <small id="error-whatsapp-no">Please enter a valid phone no</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 my-1">
                            <input name="password" id="passwordInput" type="password" class="form-control shadow-none"
                                placeholder="Password" />
                            <small id="error-password">Please enter a valid password</small>
                        </div>
                        <div class="col-lg-6 my-1">
                            <input name="repassword" type="password" class="form-control shadow-none"
                                placeholder="Re-type password" />
                            <small id="re-type-password">Please enter a valid password</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 my-1">
                            <input placeholder="Birthday" name="bday" class="form-control shadow-none" type="text"
                                onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                            <small id="error-bday">Please enter a valid birthday</small>
                        </div>
                        <div class="col-lg-6 my-1">
                            <select id="inputGender" name="gender" class="form-control shadow-none">
                                <option selected disabled>Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            <small id="error-gender">Please enter the gender</small>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary w-100 shadow-none my-1" name="submit" id="submit-reg-patient">
                        Create My Account
                    </button>
                    <p class="text-center">
                        Already have an account? <a href="<?php echo URLROOT; ?>/user/showLogin" class="sign-in" id="sign-in">Sign in</a>
                    </p>
                </form>
            </div>
        </div>
        <!--row-->
    </div>



    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <script src="<?php echo URLROOT; ?>/js/loginSignup.js"></script>

</body>

</html>