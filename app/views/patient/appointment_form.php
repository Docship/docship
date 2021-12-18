<?php require_once APPROOT."/views/inc/error_input.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
    <!-- Fontawesome Css -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome-pro-5/css/all.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/form.css">

    <title>DocShip | LogIn</title>
  </head>
  <body>
  <div class="container-fluid appointments-form">
      <div class="row">
        <div class="col-lg-5 image-appointments"></div>

        <div class="col-lg-7 px-5 fill">
          <form
            action="web/Login.ctr.php"
            method="post"
            class="mx-sm-3 mx-md-4 mx-lg-5 my-5"
          >
            <h1 class="text-center topic my-0">New Appointment</h1>
            <p class="text-center mb-2"></p>
            <div class="form-row">
              <div class="col-sm-12" id="log-email">
                <input
                placeholder="Date" name="day" type="text"
                onfocus="(this.type='date')" onblur="(this.type='text')" id="date"                  
                  class="form-control form-control-lg shadow-none"
                />
                <small>demo</small>
              </div>

              <div class="col-sm-12" id="role">
                <select id="doctors" name="doctors" class="form-control form-control-lg shadow-none">
                  <option selected>Doctor</option>
                  <option>Dr. Dilusha</option>
                  <option>Dr. Bimsara</option>
                  <option>Dr. Kasun</option>
                  <option>Dr. Nirmal</option>
                </select>
                <small>demo</small>
              </div>

              <div class="col-sm-12" id="role">
                <input class="form-control form-control-lg shadow-none" name="charge" type="text" placeholder="charge" disabled>

                <small>demo</small>
              </div>

              
              <div class="col-sm-12" id="role">
                <select id="inputGender" name="gender" class="form-control form-control-lg shadow-none">
                  <option selected>Time</option>
                  <option>17.00</option>
                  <option>17.30</option>
                  <option>18.00</option>
                  <option>18.30</option>
                </select>  
                <small>demo</small>
              </div>

            </div>
            <button
              type="submit"
              class="btn btn-primary btn-lg w-100 shadow-none my-1"
              name="submit_patient"
              id="submit-log"
            >
              Create new Appointment
            </button>
            <p class="text-center">
              Want to quit?  <a href="#" id="sign-up" class="sign-up">cancel</a>
            </p>
          </form>
        </div>
      </div>
      <!--row-->
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="<?php echo URLROOT; ?>/js/jquery.js"></script>
    <script src="<?php echo URLROOT; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo URLROOT; ?>/js/loginSignup.js"></script>

  </body>
</html>
