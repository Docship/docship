<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>DocShip | Dashboard</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link href="<?php echo URLROOT; ?>/css/dashboard.css" rel="stylesheet">
  
</head>

<body>

  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-4" href="#"><span class="brand-color1">Doc</span><span class="brand-color2">Ship</span></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
      data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="user-wrapper mx-2">
      <img src="<?php echo URLROOT; ?>/img/user.png" alt="" width="40px" height="40px" />
    </div>
  </nav>


  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar menu -->
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo URLROOT; ?>\doctor\index" id="a">
                <span data-feather="home"></span>
                Home 
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>\doctor\appointments" id="b">
                <span data-feather="calendar"></span>
                Appointments
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>\doctor\patients" id="c">
                <span data-feather="users"></span>
                Patients
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>\doctor\messages" id="d">
                <span data-feather="message-circle"></span>
                Messages
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>\doctor\prescriptions" id="e">
                <span data-feather="file-plus"></span>
                Prescriptions
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>\doctor\settings" id="f">
                <span data-feather="settings"></span>
                Settings
              </a>
            </li>
          </ul>          
        </div>
      </nav>