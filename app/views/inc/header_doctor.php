<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>DocShip | Dashboard</title>

    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
  <!-- FontAwesome pro -->
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome-pro-5/css/all.css">
  <script src="<?php echo URLROOT; ?>/js/feather-icons.js"></script>
  <link href="<?php echo URLROOT; ?>/css/dashboard.css" rel="stylesheet">
  
</head>

<body>

  <nav class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-4" href="#"><span class="brand-color1">Doc</span><span class="brand-color2">Ship</span></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
      data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="user-wrapper mx-2">
      <img src="<?php echo URLROOT; ?>/img/user.png" alt="" width="40px" height="40px" 
      data-toggle="modal" data-target=".logout-popup"
      />
    </div>
  </nav>

  <div class="modal logout-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header"><h4>Logout <i class="fa fa-lock"></i></h4></div>
        <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?</div>
        <div class="modal-footer"><a href="<?php echo URLROOT; ?>/user/logout" class="btn btn-primary btn-block">Logout</a></div>
      </div>
    </div>
  </div>


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
              <a class="nav-link" href="<?php echo URLROOT; ?>\doctor\appointments_confirmed" id="b">
                <span data-feather="calendar"></span>
                Appointments Confirmed
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>\doctor\message" id="d">
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
              <a class="nav-link" href="<?php echo URLROOT; ?>\doctor\update" id="f">
                <span data-feather="settings"></span>
                Edit Account
              </a>
            </li>
          </ul>          
        </div>
      </nav>