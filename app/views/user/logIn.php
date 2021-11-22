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
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/loginSignup.css" />

    <title>DocShip | LogIn</title>
  </head>
  <body>
    <div class="container-fluid sign-in-form">
      <div class="row">
        <div class="col-lg-5 image"></div>

        <div class="col-lg-7 px-5 fill">
          <form
            action="<?php echo URLROOT; ?>/user/login"
            method="post"
            class="mx-sm-3 mx-md-4 mx-lg-5 my-5"
          >
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
              <div class="col-sm-12" id="role">
                <select id="inputGender" name="role" class="form-control form-control-lg shadow-none">
                    <option selected disabled>I am a</option>
                    <option value="doctor">Doctor</option>
                    <option value="patient">Patient</option>
                    <option value="admin">Admin</option>
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
              Submit
            </button>
            <p class="text-center">
              New here? <a href="<?php echo URLROOT; ?>/patient/register" id="sign-up" class="sign-up">Sign up</a> |
              <a href="#" id="lost-password" class="lost-password"
                >Lost Password</a
              >
            </p>
          </form>
        </div>
      </div>
      <!--row-->
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
      crossorigin="anonymous"
    ></script>

    <script src="<?php echo URLROOT; ?>/js/loginSignup.js"></script>
  </body>
</html>
