<?php require_once APPROOT."/views/inc/error_input.php";?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
    <!-- Fontawesome Css -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome-pro-5/css/all.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/form.css">

    <title>DocShip | Register</title>
</head>

<body>
    <div class="container-fluid sign-up-form">
        <div class="row">
            <div class="col-lg-4 .image-register"></div>
            <div class="col-lg-8 px-5 fill">
                <form action="<?php echo URLROOT; ?>/patient/register" method="post" class="mx-sm-3 mx-md-4 mx-lg-5">
                    <h1 class="text-center my-0 topic">Welcome to DocShip</h1>
                    <p class="text-center mb-2">
                    My Health. My Hospital.
                    </p>
                    <div class="form-row">
                        <div class="col-lg-6 my-1">
                            <input name="fname" type="text" class="form-control shadow-none input-text"
                                value = "<?php echo $data['fname']; ?>"
                                placeholder="First name" />
                                <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                                ?></div>
                        </div>
                        <div class="col-lg-6 my-1">
                            <input name="lname" type="text" class="form-control shadow-none input-text"
                                value = "<?php echo $data['lname']; ?>"
                                placeholder="Last name" />
                                <div><?php 
                                    echo getErrorMessage($data['lname_err']);
                                ?></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 my-1">
                            <input name="email" type="email" class="form-control shadow-none input-text" placeholder="Email" value = "<?php echo $data['email']; ?>"/>
                            <div><?php 
                                    echo getErrorMessage($data['email_err']);
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6 my-1">
                            <input name="telephone" type="tel" class="form-control shadow-none input-text"
                                value = "<?php echo $data['telephone']; ?>"
                                placeholder="Whatsapp No" />
                                <div><?php 
                                    echo getErrorMessage($data['telephone_err']);
                                ?>
                                </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 my-1">
                            <input name="password" id="passwordInput" type="password" class="form-control shadow-none input-text"
                                value = "<?php echo $data['password']; ?>"
                                placeholder="Password" />
                                <div><?php 
                                    echo getErrorMessage($data['password_err']);
                                ?>
                                </div>
                        </div>
                        <div class="col-lg-6 my-1">
                            <input name="repassword" type="password" class="form-control shadow-none input-text"
                                value = "<?php echo $data['repassword']; ?>"
                                placeholder="Re-type password" />
                                <div><?php 
                                    echo getErrorMessage($data['repassword_err']);
                                ?>
                                </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 my-1">
                            <input placeholder="Birthday" name="bday" class="form-control shadow-none" id="bday" type="text"
                                onfocus="(this.type='date')" onblur="(this.type='text')" id="date" value = "<?php echo $data['bday']; ?>" />
                                <div><?php 
                                    echo getErrorMessage($data['bday_err']);
                                ?>
                                </div>
                        </div>
                        <div class="col-lg-6 my-1">
                            <select id="inputGender" name="gender" class="form-control shadow-none">
                                <option value="error" selected disabled>Gender</option>
                                <option value="Male" <?php echo ((isset($data['gender'])) && $data['gender']=="Male") ? "selected":""; ?>>Male</option>
                                <option value="Female" <?php echo ((isset($data['gender'])) && $data['gender']=="Female") ? "selected":""; ?>>Female</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['gender_err']);
                                ?>
                            </div>
                        </div>
                    </div>


<<<<<<< HEAD
<<<<<<< HEAD
                    <button type="submit" class="btn btn-primary w-100 shadow-none my-1" name="submit" id="submit-reg-patient-change">
=======
                    <button type="submit" class="btn btn-primary w-100 shadow-none my-1" name="submit" id="submit-reg-patient" disabled>
>>>>>>> dev-dil
=======
                    <button type="submit" class="btn btn-primary w-100 shadow-none my-1" name="submit" id="submit-reg-patient-change">
>>>>>>> dev-dil
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




    <script src="<?php echo URLROOT; ?>/js/jquery.js"></script>
    <script src="<?php echo URLROOT; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo URLROOT; ?>/js/loginSignup.js"></script>

</body>

</html>