<?php require_once APPROOT."/views/inc/error_input.php";?>
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
            <div class="col-lg-3 image"></div>
            <div class="col-lg-9 px-5 fill">
                <form action="web/PatientSignup.ctr.php" method="POST" class="mx-sm-3 mx-md-2 mx-lg-3">
                    <h1 class="text-center topic mb-2"><span class="brand-color1">Doc</span><span class="brand-color2">Ship</span> Doctor Registration</h1>
                    <div class="form-row">
                        <div class="col-lg-5 my-1">
                            <input name="fname" type="text" class="form-control shadow-none"
                                value = "<?php echo $data['fname']; ?>"
                                placeholder="First name" />
                                <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                                ?></div>
                        </div>
                        <div class="col-lg-7 my-1">
                            <input name="lname" type="text" class="form-control shadow-none"
                                value = "<?php echo $data['fname']; ?>"
                                placeholder="Last name" />
                                <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                                ?></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-4 my-1">
                            <input name="email" type="email" class="form-control shadow-none" placeholder="Email" value = "<?php echo $data['fname']; ?>" />
                            <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                                ?></div>
                            </div>
                        <div class="col-lg-4 my-1">
                            <input name="telephone" type="tel" class="form-control shadow-none" value="<?php echo $data['fname']; ?>"
                                placeholder="Whatsapp No" />
                                <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                                ?></div>
                            </div>
                        <div class="col-lg-4 my-1">
                            <input name="nic" type="text" class="form-control shadow-none" placeholder="NIC" value="<?php echo $data['fname']; ?>" />
                            <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                            ?></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 my-1">
                            <input name="password" id="passwordInput" type="password" class="form-control shadow-none" value="<?php echo $data['fname']; ?>"
                                placeholder="Password" />
                                <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                                ?></div>
                        </div>
                        <div class="col-lg-6 my-1">
                            <input name="repassword" type="password" class="form-control shadow-none" value="<?php echo $data['fname']; ?>"
                                placeholder="Re-type password" />
                                <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                                ?></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-3 my-1">
                            <input placeholder="Birthday" name="bday" class="form-control shadow-none" type="text"
                                value = "<?php echo $data['fname']; ?>"
                                onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                                <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                                ?></div>
                        </div>
                        <div class="col-lg-3 my-1">
                            <select id="inputGender" name="gender" class="form-control shadow-none">
                                <option selected disabled>Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                            ?></div>
                        </div>
                        <div class="col-lg-6 my-1">
                            <input name="college" type="text" class="form-control shadow-none" placeholder="College" value="<?php echo $data['fname']; ?>"/>
                            <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                            ?></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-3 my-1">
                            <select id="inputGender" name="gender" class="form-control shadow-none">
                                <option selected disabled>Specialization</option>
                                <option>Allergist</option>
                                <option>Dermatologist</option>
                                <option>Ophthalmologist</option>
                                <option>Obstetrician</option>
                                <option>Gynecologist</option>
                                <option>Cardiologist</option>
                                <option>Endocrinologist</option>
                                <option>Gastroenterologist</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                            ?></div>
                        </div>

                        <div class="col-lg-9 my-auto pl-lg-2">
                            <div class="days my-0 d-flex justify-content-between align-items-baseline">
                                <label class="checkbox-inline my-0">
                                    Days:    
                                </label>
                                <label class="checkbox-inline my-0">
                                    <input type="checkbox" value=""> Sun
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value=""> Mon   
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value=""> Tue
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value=""> Wed
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value=""> Thu
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value=""> Fri
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value=""> Sat
                                </label>
                            </div>
                            <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                            ?></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-2 my-1">
                            <select id="category" name="category" class="form-control shadow-none">
                                <option selected disabled>From</option>
                                <option>5.00Am</option>
                                <option>6.00Am</option>
                                <option>7.00Am</option>
                                <option>8.00Am</option>
                                <option>9.00Am</option>
                                <option>10.00Am</option>
                                <option>11.00Am</option>
                                <option>12.00Pm</option>
                                <option>1.00pm</option>
                                <option>2.00pm</option>
                                <option>3.00pm</option>
                                <option>4.00pm</option>
                                <option>5.00m</option>
                                <option>6.00Am</option>
                                <option>7.00Am</option>
                                <option>8.00Am</option>
                                <option>9.00Am</option>
                                <option>10.00Am</option>
                                <option>11.00Am</option>
                                <option>12.00Pm</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                            ?></div>
                        </div>
                        <div class="col-lg-2 my-1">
                            <select id="category" name="category" class="form-control shadow-none">
                                <option selected disabled>To</option>
                                <option>5.00Am</option>
                                <option>6.00Am</option>
                                <option>7.00Am</option>
                                <option>8.00Am</option>
                                <option>9.00Am</option>
                                <option>10.00Am</option>
                                <option>11.00Am</option>
                                <option>12.00Pm</option>
                                <option>1.00pm</option>
                                <option>2.00pm</option>
                                <option>3.00pm</option>
                                <option>4.00pm</option>
                                <option>5.00m</option>
                                <option>6.00Am</option>
                                <option>7.00Am</option>
                                <option>8.00Am</option>
                                <option>9.00Am</option>
                                <option>10.00Am</option>
                                <option>11.00Am</option>
                                <option>12.00Pm</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                            ?></div>
                        </div>
                        <div class="col-lg-4 my-1">
                            <input name="charge" type="number" min="1" step="any" class="form-control shadow-none"
                                placeholder="Charge" />
                                <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                                ?></div>
                        </div>
                        <div class="col-lg-4 my-1">
                            <input name="discount" type="number" min="1" step="any" class="form-control shadow-none"
                                placeholder="Discount" />
                                <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                                ?></div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-n btn-primary w-100 shadow-none my-1" name="submit" id="submit-reg">
                        Create Doctor Account
                    </button>
                    <p class="text-center">
                        <a href="#" id="sign-up" class="sign-up">Back</a>
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