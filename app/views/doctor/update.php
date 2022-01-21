<?php
  function getErrorMessage($error)
  {
    $message = "";
    if (empty($error)) {
      $message = "<small></small>";
      return $message;
    }else{
      $message = "<small style = 'color:red;'> ".$error." </small>";
      return $message;
    }
  }

  function isExist($var)
  {
    $message = "";
    if($var){
      $error = "Email already exist.";
      $message = "<small style = 'color:red;'> ".$error." </small>";
    }
    return $message;
    
  }
?>
<?php require_once APPROOT."/views/inc/header_doctor.php"; ?>
<!-- Settings -->
<main role="main" class="settings col-md-9 ml-sm-auto col-lg-10 px-md-4" id="F">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="text-center topic mb-2">Profile Details</h1>
    </div>
    <div class="d-flex justify-content-center sign-up-form">
        <div class="row">
            <div class="col-lg-12 px-5 my-5 fill">
                <form action="<?php echo URLROOT; ?>/doctor/update" method="POST" class="mx-sm-3 mx-md-2 mx-lg-3">

                    <h5 class="text-center mt-3">Personal Information</h5>
                    <div class="form-row">
                        <div class="col-lg-5 my-1">
                            <input name="fname" type="text" class="form-control shadow-none doc-reg"
                                value="<?php echo $data['fname']; ?>" placeholder="First name" />
                            <div><?php 
                                    echo getErrorMessage($data['fname_err']);
                                ?></div>
                        </div>
                        <div class="col-lg-7 my-1">
                            <input name="lname" type="text" class="form-control shadow-none doc-reg"
                                value="<?php echo $data['lname']; ?>" placeholder="Last name" />
                            <div><?php 
                                    echo getErrorMessage($data['lname_err']);
                                ?></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-4 my-1">
                            <input name="email" type="email" class="form-control shadow-none doc-reg"
                                placeholder="Email" value="<?php echo $data['email']; ?>" />
                            <div>
                                <?php
                                    $e = getErrorMessage($data['email_err']);
                                    if($e!=""){
                                        echo $e;
                                    }else{
                                        if($data['isExist']){
                                            echo "Already account exist for this email";
                                        }
                                    } 
                                    
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-4 my-1">
                            <input name="telephone" type="tel" class="form-control shadow-none doc-reg"
                                value="<?php echo $data['telephone']; ?>" placeholder="Whatsapp No" />
                            <div><?php 
                                    echo getErrorMessage($data['telephone_err']);
                                ?></div>
                        </div>
                        <div class="col-lg-4 my-1">
                            <input name="nic" type="text" class="form-control shadow-none doc-reg" placeholder="NIC"
                                value="<?php echo $data['nic']; ?>" />
                            <div><?php 
                                    echo getErrorMessage($data['nic_err']);
                            ?></div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-start" style="margin: 0 0 10px 0;">
                        <button class="btn btn-primary" id="button_password" type="button">change
                            password</button>
                    </div>     
                    <div class="form-row row" id="passwordSector" style="display: none;"> 
                        <div class="col-lg-6 my-1">
                            <input name="password" id="passwordInput" type="password"
                                class="form-control shadow-none doc-reg" value="<?php echo $data['password']; ?>"
                                placeholder="Password" />
                            <div><?php 
                                    echo getErrorMessage($data['password_err']);
                                ?></div>
                        </div>
                        <div class="col-lg-6 my-1">
                            <input name="repassword" id="rePasswordInput" type="password" class="form-control shadow-none doc-reg"
                                value="<?php echo $data['repassword']; ?>" placeholder="Re-type password" />
                            <div><?php 
                                    echo getErrorMessage($data['repassword_err']);
                                ?></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-4 my-1">
                            <input placeholder="Birthday" name="bday" class="form-control shadow-none input-change"
                                type="text" value="<?php echo $data['bday']; ?>" onfocus="(this.type='date')"
                                onblur="(this.type='text')" id="date" />
                            <div><?php 
                                    echo getErrorMessage($data['bday_err']);
                                ?></div>
                        </div>
                        <div class="col-lg-3 my-1">
                            <select id="inputGender" name="gender" class="form-control shadow-none">
                                <option selected disabled>Gender</option>
                                <option
                                    <?php echo ((isset($data['gender'])) && $data['gender']=="Male") ? "selected":""; ?>>
                                    Male</option>
                                <option
                                    <?php echo ((isset($data['gender'])) && $data['gender']=="Female") ? "selected":""; ?>>
                                    Female</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['gender_err']);
                            ?></div>
                        </div>
                        
                    </div>

                    <h5 class="text-center mt-3">Educational Qualification</h5>

                    <div class="form-row">
                        <div class="col-lg-8 my-1">
                            <input name="college" type="text" class="form-control shadow-none doc-reg"
                                placeholder="College" value="<?php echo $data['college']; ?>" />
                            <div><?php 
                                    echo getErrorMessage($data['college_err']);
                            ?></div>
                        </div>
                        <div class="col-lg-4 my-1">
                            <select id="category" name="category" class="form-control shadow-none">
                                <option selected disabled>Specialization</option>
                                <option
                                    <?php echo ((isset($data['category'])) && $data['category']=="Allergist") ? "selected":""; ?>>
                                    Allergist</option>
                                <option
                                    <?php echo ((isset($data['category'])) && $data['category']=="Dermatologist") ? "selected":""; ?>>
                                    Dermatologist</option>
                                <option
                                    <?php echo ((isset($data['category'])) && $data['category']=="Ophthalmologist") ? "selected":""; ?>>
                                    Ophthalmologist</option>
                                <option
                                    <?php echo ((isset($data['category'])) && $data['category']=="Obstetrician") ? "selected":""; ?>>
                                    Obstetrician</option>
                                <option
                                    <?php echo ((isset($data['category'])) && $data['category']=="Gynecologist") ? "selected":""; ?>>
                                    Gynecologist</option>
                                <option
                                    <?php echo ((isset($data['category'])) && $data['category']=="Cardiologist") ? "selected":""; ?>>
                                    Cardiologist</option>
                                <option
                                    <?php echo ((isset($data['category'])) && $data['category']=="Endocrinologist") ? "selected":""; ?>>
                                    Endocrinologist</option>
                                <option
                                    <?php echo ((isset($data['category'])) && $data['category']=="Gastroenterologist") ? "selected":""; ?>>
                                    Gastroenterologist</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['category_err']);
                            ?></div>
                        </div>
                    </div>

                    <h5 class="text-center mt-3">Work Information</h5>

                    <div class="form-row">
                        <div class="col-lg-12 my-auto pl-lg-2">
                            <div class="days my-0 d-flex justify-content-between align-items-baseline">
                                <label class="checkbox-inline my-0">
                                    Days can Work:
                                </label>
                                <label class="checkbox-inline my-0">
                                    <input class="doc-reg-check" name="sunday" type="checkbox" value="7"> Sun
                                </label>
                                <label class="checkbox-inline">
                                    <input class="doc-reg-check" name="monday" type="checkbox" value="1"> Mon
                                </label>
                                <label class="checkbox-inline">
                                    <input class="doc-reg-check" name="tuesday" type="checkbox" value="2"> Tue
                                </label>
                                <label class="checkbox-inline">
                                    <input class="doc-reg-check" name="wednesday" type="checkbox" value="3"> Wed
                                </label>
                                <label class="checkbox-inline">
                                    <input class="doc-reg-check" name="thursday" type="checkbox" value="4"> Thu
                                </label>
                                <label class="checkbox-inline">
                                    <input class="doc-reg-check" name="friday" type="checkbox" value="5"> Fri
                                </label>
                                <label class="checkbox-inline">
                                    <input class="doc-reg-check" name="saturday" type="checkbox" value="6"> Sat
                                </label>
                                <input type="hidden" id="daysSelected" name="days"
                                    value="<?php echo $data['working_days']; ?>">
                            </div>
                            <div><?php 
                                    echo getErrorMessage($data['working_days_err']);
                            ?></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 my-1">
                            <select id="working_from" name="working_from" class="form-control shadow-none">
                                <option selected disabled>From</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="05.00 AM") ? "selected":""; ?>>
                                    05.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="06.00 AM") ? "selected":""; ?>>
                                    06.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="07.00 AM") ? "selected":""; ?>>
                                    07.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="08.00 AM") ? "selected":""; ?>>
                                    08.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="09.00 AM") ? "selected":""; ?>>
                                    09.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="10.00 AM") ? "selected":""; ?>>
                                    10.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="11.00 AM") ? "selected":""; ?>>
                                    11.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="12.00 PM") ? "selected":""; ?>>
                                    12.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="01.00 PM") ? "selected":""; ?>>
                                    01.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="02.00 PM") ? "selected":""; ?>>
                                    02.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="03.00 PM") ? "selected":""; ?>>
                                    03.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="04.00 PM") ? "selected":""; ?>>
                                    04.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="05.00 PM") ? "selected":""; ?>>
                                    05.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="06.00 PM") ? "selected":""; ?>>
                                    06.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="07.00 PM") ? "selected":""; ?>>
                                    07.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="08.00 PM") ? "selected":""; ?>>
                                    08.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="09.00 PM") ? "selected":""; ?>>
                                    09.00 PM</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['working_from_err']);
                            ?></div>
                        </div>
                        <div class="col-lg-6 my-1">
                            <select id="working_to" name="working_to" class="form-control shadow-none">
                                <option selected disabled>To</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="05.00 AM") ? "selected":""; ?>>
                                    05.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="06.00 AM") ? "selected":""; ?>>
                                    06.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="07.00 AM") ? "selected":""; ?>>
                                    07.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="08.00 AM") ? "selected":""; ?>>
                                    08.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="09.00 AM") ? "selected":""; ?>>
                                    09.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="10.00 AM") ? "selected":""; ?>>
                                    10.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="11.00 AM") ? "selected":""; ?>>
                                    11.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="12.00 PM") ? "selected":""; ?>>
                                    12.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="01.00 PM") ? "selected":""; ?>>
                                    01.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="02.00 PM") ? "selected":""; ?>>
                                    02.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="03.00 PM") ? "selected":""; ?>>
                                    03.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="04.00 PM") ? "selected":""; ?>>
                                    04.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="05.00 PM") ? "selected":""; ?>>
                                    05.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="06.00 PM") ? "selected":""; ?>>
                                    06.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="07.00 PM") ? "selected":""; ?>>
                                    07.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="08.00 PM") ? "selected":""; ?>>
                                    08.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="09.00 PM") ? "selected":""; ?>>
                                    09.00 PM</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['working_to_err']);
                            ?></div>
                        </div>
                    </div>

                    <h5 class="text-center mt-3">Payment</h5>
                    <div class="form-row">
                        <div class="col-lg-7 my-1">
                            <select id="bank" name="bank" class="form-control shadow-none">
                                <option selected disabled value="Bank">Bank</option>
                                <option value="Peoples Bank"
                                    <?php echo ((isset($data['bank_name'])) && $data['bank_name']=="Peoples Bank") ? "selected":""; ?>>
                                    Peoples Bank</option>
                                <option value="Bank Of Ceylon"
                                    <?php echo ((isset($data['bank_name'])) && $data['bank_name']=="Bank Of Ceylon") ? "selected":""; ?>>
                                    Bank Of Ceylon</option>
                                <option value="Commercial Bank"
                                    <?php echo ((isset($data['bank_name'])) && $data['bank_name']=="Commercial Bank") ? "selected":""; ?>>
                                    Commercial Bank</option>
                                <option value="Sampath Bank"
                                    <?php echo ((isset($data['bank_name'])) && $data['bank_name']=="Sampath Bank") ? "selected":""; ?>>
                                    Sampath Bank</option>
                                <option value="Selan Bank"
                                    <?php echo ((isset($data['bank_name'])) && $data['bank_name']=="Selan Bank") ? "selected":""; ?>>
                                    Selan Bank</option>
                                <option value="HNB Bank"
                                    <?php echo ((isset($data['bank_name'])) && $data['bank_name']=="HNB Bank") ? "selected":""; ?>>
                                    HNB Bank</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['bank_name_err']);
                            ?></div>
                        </div>
                        <div class="col-lg-5 my-1">
                            <select id="branch" name="branch" class="form-control shadow-none">
                                <option selected disabled value="Branch">Branch</option>
                                <option value="Colombo"
                                    <?php echo ((isset($data['bank_branch'])) && $data['bank_branch']=="Colombo") ? "selected":""; ?>>
                                    Colombo</option>
                                <option value="Gampaha"
                                    <?php echo ((isset($data['bank_branch'])) && $data['bank_branch']=="Gampaha") ? "selected":""; ?>>
                                    Gampaha</option>
                                <option value="Kegalle"
                                    <?php echo ((isset($data['bank_branch'])) && $data['bank_branch']=="Kegalle") ? "selected":""; ?>>
                                    Kegalle</option>
                                <option value="Negombo"
                                    <?php echo ((isset($data['bank_branch'])) && $data['bank_branch']=="Negombo") ? "selected":""; ?>>
                                    Negombo</option>
                                <option value="Galle"
                                    <?php echo ((isset($data['bank_branch'])) && $data['bank_branch']=="Galle") ? "selected":""; ?>>
                                    Galle</option>
                                <option value="Chilaw"
                                    <?php echo ((isset($data['bank_branch'])) && $data['bank_branch']=="Chilaw") ? "selected":""; ?>>
                                    Chilaw</option>
                                <option value="Matara"
                                    <?php echo ((isset($data['bank_branch'])) && $data['bank_branch']=="Matara") ? "selected":""; ?>>
                                    Matara</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['bank_branch_err']);
                            ?></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 my-1">
                            <input name="account_no" type="number" min="1" step="any"
                                class="form-control shadow-none input-change" placeholder="Account No"
                                value="<?php echo $data['bank_acc_no'];?>" />
                            <div><?php 
                                    echo getErrorMessage($data['bank_acc_err']);
                                ?></div>
                        </div>
                        <div class="col-lg-3 my-1">
                            <input name="charge" type="number" min="1" step="any"
                                class="form-control shadow-none input-change" placeholder="Charge "
                                value="<?php echo $data['charge_amount'];?>" />
                            <div><?php 
                                    echo getErrorMessage($data['charge_amount_err']);
                                ?></div>
                        </div>
                        <div class="col-lg-3 my-1">
                            <input name="discount" type="number" min="1" step="any"
                                class="form-control shadow-none input-change" placeholder="Discount"
                                value="<?php echo $data['discount'];?>" />
                            <div><?php 
                                    echo getErrorMessage($data['discount_err']);
                                ?></div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-around">
                        <button type="submit" class="btn btn-n btn-primary w-25 shadow-none my-1" name="submit"
                            id="submit-reg" disabled=true>
                            Update Doctor Account
                        </button>
                        <button type="button" onclick="lockInpututsSelects(false)"
                            class="btn btn-n btn-primary w-25 shadow-none my-1" id="edit">Edit Details</button>
                    </div>
                </form>
            </div>
        </div>
        <!--row-->
    </div>

</main>
<?php require_once APPROOT."/views/inc/footer.php"; ?>