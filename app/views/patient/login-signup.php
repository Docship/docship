
<?php
  //session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css" />
    <title>Login-Register</title>
  </head>

  <body>
    <div class="container-fluid sign-up-form invisible">
      <div class="row">
        <div class="col-lg-4 image"></div>
        <div class="col-lg-8 fill">
          <form class="mx-sm-3 mx-md-4 mx-lg-5 my-5">
            <h1 class="text-center my-2">Welcome to DocShip</h1>
            <p class="text-center my-2">
              Signed up today and bla bla bla
            </p>
            <div class="form-row">
              <div class="col-lg-6">
                <input
                  name="firstName"
                  type="text"
                  class="form-control form-control-lg my-2"
                  placeholder="First name"
                />
                <p>First name must be  and contain 5 - 12 characters</p>
              </div>
              <div class="col-lg-6">
                <input
                  name="lastName"
                  type="text"
                  class="form-control form-control-lg my-2"
                  placeholder="Last name"
                />
                
                <p>Last name must be  and contain 5 - 12 characters</p>
              </div>
            </div>

            <div class="form-row">
              <div class="col-lg-6">
                <input
                  name="email"
                  type="email"
                  class="form-control form-control-lg my-2"
                  placeholder="Email"
                />
                <p>Email must be a valid address, e.g. me@mydomain.com</p>
              </div>
              <div class="col-lg-6">
                <input
                  name="telephone"
                  type="tel"
                  class="form-control form-control-lg my-2"
                  placeholder="Whatsapp No"
                />
                <p>Telephone must be a valid telephone number (10 digits)</p>
              </div>
            </div>

            <div class="form-row">
              <div class="col-lg-6">
                <input
                  name="password"
                  id="passwordInput"
                  type="password"
                  class="form-control form-control-lg my-2"
                  placeholder="Password"
                />
                <p>Password must alphanumeric (@, _ and - are also allowed) and be 8 - 20 characters</p>
              </div>
              <div class="col-lg-6">
                <input
                  name="repassword"
                  type="password"
                  class="form-control form-control-lg my-2"
                  placeholder="Re-type password"
                />
                <p>not matched</p>
              </div>
            </div>

            <div class="form-row">
              <div class="col-lg-6">
                <input placeholder="Birthday" name="bday" class="form-control form-control-lg my-2" type="text"
                                    onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
              </div>
              <div class="col-lg-6">
                <select id="inputGender" name="gender" class="form-control form-control-lg my-2">
                  <option selected>Gender</option>
                  <option>Male</option>
                  <option>Female</option>
              </select>
              </div>
            </div>


            <button type="submit" class="btn btn-primary btn-lg w-100 my-2" name="submit">
              Create My Account
            </button>
            <p class="text-center">
              Already have an account? <a href="#" class="sign-in" id="sign-in">Sign in</a>
            </p>
          </form>
        </div>
      </div>
      <!--row-->
    </div>
    <!--register-form-->

    <div class="container-fluid sign-in-form">
      <div class="row">
        <div class="col-lg-5 image">
        </div>

        <div class="col-lg-7 fill">
          <form class="mx-sm-3 mx-md-4 mx-lg-5 my-5">
            <h1 class="text-center my-2">Sign in</h1>
            <p class="text-center">Welcome to DocShip</p>
            <div class="form-row">
              <div class="col-sm-12">
                <input
                  name="email"
                  type="email"
                  class="form-control form-control-lg my-2"
                  placeholder="Email"
                />
                <p>Email must be a valid address, e.g. me@mydomain.com</p>
              </div>
              <div class="col-sm-12">
                <input
                  type="password"
                  class="form-control form-control-lg my-2"
                  placeholder="Password"
                />
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100 my-2" name="submit_patient">
              Submit
            </button>
            <p class="text-center">New here? <a href="#" id="sign-up" class="sign-up">Sign up</a> | <a href="#" id="lost-password" class="lost-password">Lost Password</a></p>
          </form>
        </div>
      </div>
      <!--row-->
    </div>
    <!--login form-->

    <div class="container-fluid lost-password-form invisible">
      <div class="row">
        <div class="col-lg-5 image"></div>
        <div class="col-lg-7 fill">
          <form class="mx-sm-3 mx-md-4 mx-lg-5 my-5">
            <h1 class="text-center my-2">Forget password?</h1>
            <p class="text-center my-2">
              Don't worry! Put your email here
            </p>
            <div class="form-row">
              <div class="col-sm-12">
                <input
                  name="email"
                  type="email"
                  class="form-control form-control-lg my-2"
                  placeholder="Email"
                />
                <p>Email must be a valid address, e.g. me@mydomain.com</p>
              </div>
              <div class="col-sm-12 my-2">
                <button type="submit" class="btn btn-primary btn-lg w-100">
                  I lost my password
                </button>
                <p class="text-center"><a href="#" id="sign-in" class="sign-in">Sign in</a> </p>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--row-->
    </div>
    <!--login form-->

    <script src="<?php echo URLROOT; ?>/js/main.js"></script>

    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
