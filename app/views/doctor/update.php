<?php require_once APPROOT."/views/inc/header_doctor.php"; ?>
<!-- Settings -->
<main role="main" class="settings col-md-9 ml-sm-auto col-lg-10 px-md-4" id="F">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="text-center topic mb-2"> Doctor Registration</h1>
  </div>
  <div class="d-flex justify-content-center sign-up-form">
        <div class="row">
            <div class="col-lg-12 px-5 my-5 fill">
                <form action="<?php echo URLROOT; ?>/admin/doctor_register" method="POST"
                    class="mx-sm-3 mx-md-2 mx-lg-3">
                    
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

                    <div class="form-row">
                        <div class="col-lg-6 my-1">
                            <input name="password" id="passwordInput" type="password"
                                class="form-control shadow-none doc-reg" value="<?php echo $data['password']; ?>"
                                placeholder="Password" />
                            <div><?php 
                                    echo getErrorMessage($data['password_err']);
                                ?></div>
                        </div>
                        <div class="col-lg-6 my-1">
                            <input name="repassword" type="password" class="form-control shadow-none doc-reg"
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
                        <div class="col-lg-5 my-1">
                            <div class="custom-file">
                                <!-- <input type="file" class="custom-file-input" id="uploadImage"> -->
                                <label class="custom-file-label" for="uploadImage" data-browse="choose">Upload your
                                    image</label>
                            </div>
                            <div><?php 
                                    echo getErrorMessage($data['telephone_err']);
                                ?>
                            </div>
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
                                <input type="hidden" id="daysSelected" name="days" value="">
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
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="5.00 AM") ? "selected":""; ?>>
                                    5.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="6.00 AM") ? "selected":""; ?>>
                                    6.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="7.00 Am") ? "selected":""; ?>>
                                    7.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="8.00 Am") ? "selected":""; ?>>
                                    8.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="9.00 Am") ? "selected":""; ?>>
                                    9.00 AM</option>
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
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="1.00 PM") ? "selected":""; ?>>
                                    1.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="2.00 PM") ? "selected":""; ?>>
                                    2.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="3.00 PM") ? "selected":""; ?>>
                                    3.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="4.00 PM") ? "selected":""; ?>>
                                    4.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="5.00 PM") ? "selected":""; ?>>
                                    5.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="6.00 PM") ? "selected":""; ?>>
                                    6.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="7.00 PM") ? "selected":""; ?>>
                                    7.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="8.00 PM") ? "selected":""; ?>>
                                    8.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_from'])) && $data['working_from']=="9.00 PM") ? "selected":""; ?>>
                                    9.00 PM</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['working_from_err']);
                            ?></div>
                        </div>
                        <div class="col-lg-6 my-1">
                            <select id="working_to" name="working_to" class="form-control shadow-none">
                                <option selected disabled>To</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="5.00 AM") ? "selected":""; ?>>
                                    5.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="6.00 AM") ? "selected":""; ?>>
                                    6.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="7.00 Am") ? "selected":""; ?>>
                                    7.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="8.00 Am") ? "selected":""; ?>>
                                    8.00 AM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="9.00 Am") ? "selected":""; ?>>
                                    9.00 AM</option>
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
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="1.00 PM") ? "selected":""; ?>>
                                    1.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="2.00 PM") ? "selected":""; ?>>
                                    2.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="3.00 PM") ? "selected":""; ?>>
                                    3.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="4.00 PM") ? "selected":""; ?>>
                                    4.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="5.00 PM") ? "selected":""; ?>>
                                    5.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="6.00 PM") ? "selected":""; ?>>
                                    6.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="7.00 PM") ? "selected":""; ?>>
                                    7.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="8.00 PM") ? "selected":""; ?>>
                                    8.00 PM</option>
                                <option
                                    <?php echo ((isset($data['working_to'])) && $data['working_to']=="9.00 PM") ? "selected":""; ?>>
                                    9.00 PM</option>
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
                                <option value="Peoples Bank">Peoples Bank</option>
                                <option value="Bank Of Ceylon">Bank Of Ceylon</option>
                                <option value="Commercial Bank">Commercial Bank</option>
                                <option value="Sampath Bank">Sampath Bank</option>
                                <option value="Selan Bank">Selan Bank</option>
                                <option value="HNB Bank">HNB Bank</option>
                            </select>
                            <div><?php 
                                    echo getErrorMessage($data['bank_name_err']);
                            ?></div>
                        </div>
                        <div class="col-lg-5 my-1">
                            <select id="branch" name="branch" class="form-control shadow-none">
                                <option selected disabled value="Branch">Branch</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Gampaha">Gampaha</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Nigambo">Nigambo</option>
                                <option value="Galle">Galle</option>
                                <option value="Chilaw">Chilaw</option>
                                <option value="Matara">Matara</option>
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
                                value="<?php echo $data['charge_amount'];?>" />
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


                    <button type="submit" class="btn btn-n btn-primary w-100 shadow-none my-1" name="submit"
                        id="submit-reg" disabled=true>
                        Create Doctor Account
                    </button>
                    <p class="text-center">
                        <a href="<?php echo URLROOT; ?>\admin\doctors" id="sign-up" class="sign-up"> <i
                                class="fas fa-arrow-left"></i> Back</a>
                    </p>
                </form>
            </div>
        </div>
        <!--row-->
    </div>

</main>
<?php require_once APPROOT."/views/inc/footer.php"; ?>