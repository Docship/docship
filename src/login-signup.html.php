<?php
  session_start();
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
    <link rel="stylesheet" href="public/css/login-signup.css" />
    <script src="public/js/sweetalert2.all.min.js"></script>
    <title>Login-Register</title>
  </head>

  <body>
    <div class="container-fluid sign-up-form invisible">
      <div class="row">
        <div class="col-lg-4 image"></div>
        <div class="col-lg-8 px-5 fill">
          <form action="web/PatientSignup.ctr.php" method="POST" class="mx-sm-3 mx-md-4 mx-lg-5">
            <h1 class="text-center my-0 topic">Welcome to DocShip</h1>
            <p class="text-center mb-2">
              Signed up today and bla bla bla
            </p>
            <div class="form-row">
              <div class="col-lg-6" id="first-name">
                <input
                  name="firstName"
                  type="text"
                  class="form-control shadow-none"
                  placeholder="First name"
                />
                <small>Please enter a valid name</small>
              </div>
              <div class="col-lg-6">
                <input
                  name="lastName"
                  type="text"
                  class="form-control shadow-none"
                  placeholder="Last name"
                />                
                <small id="error-first-name">Please enter a valid name</small>
              </div>
            </div>

            <div class="form-row">
              <div class="col-lg-6">
                <input
                  name="email"
                  type="email"
                  class="form-control shadow-none"
                  placeholder="Email"
                />
                <small id="error-email">Please enter a valid email</small>
              </div>
              <div class="col-lg-6">
                <input
                  name="telephone"
                  type="tel"
                  class="form-control shadow-none"
                  placeholder="Whatsapp No"
                />
                <small id="error-whatsapp-no">Please enter a valid phone no</small>
              </div>
            </div>

            <div class="form-row">
              <div class="col-lg-6">
                <input
                  name="password"
                  id="passwordInput"
                  type="password"
                  class="form-control shadow-none"
                  placeholder="Password"
                />
                <small id="error-password">Please enter a valid password</small>
              </div>
              <div class="col-lg-6">
                <input
                  name="repassword"
                  type="password"
                  class="form-control shadow-none"
                  placeholder="Re-type password"
                />
                <small id="re-type-password">Please enter a valid password</small>
              </div>
            </div>

            <div class="form-row">
              <div class="col-lg-6">
                <input placeholder="Birthday" name="bday" class="form-control shadow-none" type="text"
                                    onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                <small id="error-bday">Please enter a valid birthday</small>
              </div>
              <div class="col-lg-6">
                <select id="inputGender" name="gender" class="form-control shadow-none">
                  <option selected disabled>Gender</option>
                  <option>Male</option>
                  <option>Female</option>
              </select>
              <small id="error-gender">Please enter the gender</small>
              </div>
            </div>


            <button type="submit" class="btn btn-primary w-100 shadow-none my-1" name="submit" id="submit-reg">
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

        <div class="col-lg-7 px-5 fill">
          <form action="web/Login.ctr.php" method="post" class="mx-sm-3 mx-md-4 mx-lg-5 my-5">
            <h1 class="text-center topic my-0">Sign in</h1>
            <p class="text-center mb-2">Welcome to DocShip</p>
            <div class="form-row">
              <div class="col-sm-12" id="log-email">
                <input
                  name="email"
                  type="email"
                  class="form-control form-control-lg shadow-none"
                  placeholder="Email"
                />
                <small>demo</small>
              </div>
              <div class="col-sm-12" id="log-password">
                <input
                  name="password"
                  type="password"
                  class="form-control form-control-lg shadow-none"
                  placeholder="Password"
                />
                <small>demo</small>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100 shadow-none my-1" name="submit_patient" id="submit-log">
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
        <div class="col-lg-7 px-5 fill">
          <form class="mx-sm-3 mx-md-4 mx-lg-5 my-5">
            <h1 class="text-center topic my-0">Forget password?</h1>
            <p class="text-center mb-2">
              Don't worry! Put your email here
            </p>
            <div class="form-row">
              <div class="col-sm-12">
                <input
                  name="email"
                  type="email"
                  class="form-control form-control-lg shadow-none"
                  placeholder="Email"
                />
                <small id="lost-password-email">demo</small>
              </div>
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary btn-lg w-100 shadow-none my-1" id="submit-email">
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

    <script src="public/js/login-signup.js"></script>

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
