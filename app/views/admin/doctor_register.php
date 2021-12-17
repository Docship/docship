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
                <form action="<?php echo URLROOT; ?>/admin/doctor_register" method="POST" class="mx-sm-3 mx-md-2 mx-lg-3">
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
                                value = "<?php echo $data['lname']; ?>"
                                placeholder="Last name" />
                                <div><?php 
                                    echo getErrorMessage($data['lname_err']);
                                ?></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-4 my-1">
                            <input name="email" type="email" class="form-control shadow-none" placeholder="Email" value = "<?php echo $data['email']; ?>" />
                            <div><?php
                                    $e = getErrorMessage($data['email_err']);
                                    if($e!=""){
                                        echo $e;
                                        return;
                                    } 
                                    echo isExist($data['isExist']);
                                ?></div>
                            </div>
                        <div class="col-lg-4 my-1">
                            <input name="telephone" type="tel" class="form-control shadow-none" value="<?php echo $data['telephone']; ?>"
                                placeholder="Whatsapp No" />
                                <div><?php 
                                    echo getErrorMessage($data['telephone_err']);
                                ?></div>
                            </div>
                        <div class="col-lg-4 my-1">
                            <input name="nic" type="text" class="form-control shadow-none" placeholder="NIC" value="<?php echo $data['nic']; ?>" />
                            <div><?php 
                                    echo getErrorMessage($data['nic_err']);
                            ?></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 my-1">
                            <input name="password" id="passwordInput" type="password" class="form-control shadow-none" value="<?php echo $data['password']; ?>"
                                placeholder="Password" />
                                <div><?php 
                                    echo getErrorMessage($data['password_err']);
                                ?></div>
                        </div>
                        <div class="col-lg-6 my-1">
                            <input name="repassword" type="password" class="form-control shadow-none" value="<?php echo $data['repassword']; ?>"
                                placeholder="Re-type password" />
                                <div><?php 
                                    echo getErrorMessage($data['repassword_err']);
                                ?></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-3 my-1">
                            <input placeholder="Birthday" name="bday" class="form-control shadow-none" type="text"
                                value = "<?php echo $data['bday']; ?>"
                                onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                                <div><?php 
                                    echo getErrorMessage($data['bday_err']);
                                ?></div>
                        </div>
                        <div class="col-lg-3 my-1">
                            <select id="inputGender" name="gender" class="form-control shadow-none">
                                <option selected disabled>Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['gender_err']);
                            ?></div>
                        </div>
                        <div class="col-lg-6 my-1">
                            <input name="college" type="text" class="form-control shadow-none" placeholder="College" value="<?php echo $data['college']; ?>"/>
                            <div><?php 
                                    echo getErrorMessage($data['college_err']);
                            ?></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-3 my-1">
                            <select id="category" name="category" class="form-control shadow-none">
                                <option selected disabled>Specialization</option>
                                <option <?php echo ((isset($data['category'])) && $data['category']=="Allergist") ? "selected":""; ?>>Allergist</option>
                                <option <?php echo ((isset($data['category'])) && $data['category']=="Dermatologist") ? "selected":""; ?>>Dermatologist</option>
                                <option <?php echo ((isset($data['category'])) && $data['category']=="Ophthalmologist") ? "selected":""; ?>>Ophthalmologist</option>
                                <option <?php echo ((isset($data['category'])) && $data['category']=="Obstetrician") ? "selected":""; ?>>Obstetrician</option>
                                <option <?php echo ((isset($data['category'])) && $data['category']=="Gynecologist") ? "selected":""; ?>>Gynecologist</option>
                                <option <?php echo ((isset($data['category'])) && $data['category']=="Cardiologist") ? "selected":""; ?>>Cardiologist</option>
                                <option <?php echo ((isset($data['category'])) && $data['category']=="Endocrinologist") ? "selected":""; ?>>Endocrinologist</option>
                                <option <?php echo ((isset($data['category'])) && $data['category']=="Gastroenterologist") ? "selected":""; ?>>Gastroenterologist</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['category_err']);
                            ?></div>
                        </div>

                        <div class="col-lg-9 my-auto pl-lg-2">
                            <div class="days my-0 d-flex justify-content-between align-items-baseline">
                                <label class="checkbox-inline my-0">
                                    Days:    
                                </label>
                                <label class="checkbox-inline my-0">
                                    <input type="checkbox" value="7"> Sun
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="1"> Mon   
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="2"> Tue
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="3"> Wed
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="4"> Thu
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="5"> Fri
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="6"> Sat
                                </label>
                            </div>
                            <div><?php 
                                    echo getErrorMessage($data['working_days_err']);
                            ?></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-2 my-1">
                            <select id="working_from" name="working_from" class="form-control shadow-none">
                                <option selected disabled>From</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="5.00Am") ? "selected":""; ?>>5.00Am</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="6.00Am") ? "selected":""; ?>>6.00Am</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="7.00Am") ? "selected":""; ?>>7.00Am</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="8.00Am") ? "selected":""; ?>>8.00Am</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="9.00Am") ? "selected":""; ?>>9.00Am</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="10.00Am") ? "selected":""; ?>>10.00Am</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="11.00Am") ? "selected":""; ?>>11.00Am</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="12.00Pm") ? "selected":""; ?>>12.00Pm</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="1.00Pm") ? "selected":""; ?>>1.00Pm</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="2.00Pm") ? "selected":""; ?>>2.00Pm</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="3.00Pm") ? "selected":""; ?>>3.00Pm</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="4.00Pm") ? "selected":""; ?>>4.00Pm</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="5.00Pm") ? "selected":""; ?>>5.00Pm</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="6.00Pm") ? "selected":""; ?>>6.00Am</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="7.00Pm") ? "selected":""; ?>>7.00Pm</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="8.00Pm") ? "selected":""; ?>>8.00Pm</option>
                                <option <?php echo ((isset($data['working_from'])) && $data['working_from']=="9.00Pm") ? "selected":""; ?>>9.00Pm</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['working_from_err']);
                            ?></div>
                        </div>
                        <div class="col-lg-2 my-1">
                        <select id="working_from" name="working_to" class="form-control shadow-none">
                                <option selected disabled>From</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="5.00Am") ? "selected":""; ?>>5.00Am</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="6.00Am") ? "selected":""; ?>>6.00Am</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="7.00Am") ? "selected":""; ?>>7.00Am</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="8.00Am") ? "selected":""; ?>>8.00Am</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="9.00Am") ? "selected":""; ?>>9.00Am</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="10.00Am") ? "selected":""; ?>>10.00Am</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="11.00Am") ? "selected":""; ?>>11.00Am</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="12.00Pm") ? "selected":""; ?>>12.00Pm</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="1.00Pm") ? "selected":""; ?>>1.00Pm</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="2.00Pm") ? "selected":""; ?>>2.00Pm</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="3.00Pm") ? "selected":""; ?>>3.00Pm</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="4.00Pm") ? "selected":""; ?>>4.00Pm</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="5.00Pm") ? "selected":""; ?>>5.00Pm</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="6.00Pm") ? "selected":""; ?>>6.00Am</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="7.00Pm") ? "selected":""; ?>>7.00Pm</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="8.00Pm") ? "selected":""; ?>>8.00Pm</option>
                                <option <?php echo ((isset($data['working_to'])) && $data['working_to']=="9.00Pm") ? "selected":""; ?>>9.00Pm</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['working_to_err']);
                            ?></div>
                        </div>
                        <div class="col-lg-4 my-1">
                            <input name="charge_amount" type="number" min="1" step="any" class="form-control shadow-none"
                                placeholder="Charge" />
                                <div><?php 
                                    echo getErrorMessage($data['charge_amount_err']);
                                ?></div>
                        </div>
                        <div class="col-lg-4 my-1">
                            <input name="discount" type="number" min="1" step="any" class="form-control shadow-none"
                                placeholder="Discount" />
                                <div><?php 
                                    echo getErrorMessage($data['discount_err']);
                                ?></div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-n btn-primary w-100 shadow-none my-1" name="submit" id="submit-reg">
                        Create Doctor Account
                    </button>
                    <p class="text-center">
                        <a href="#" id="sign-up" class="sign-up" onclick="history.back()">Back</a>
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