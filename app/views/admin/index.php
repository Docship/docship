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
              <a class="nav-link active" href="#" id="a">
                <span data-feather="home"></span>
                Home <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="b">
                <span data-feather="calendar"></span>
                Doctors
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="c">
                <span data-feather="users"></span>
                Patients
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#" id="d">
                <span data-feather="file-plus"></span>
                Appointments
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#" id="e">
                <span data-feather="message-circle"></span>
                Messages
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="#" id="f">
                <span data-feather="settings"></span>
                Settings
              </a>
            </li>
          </ul>          
        </div>
      </nav>

      <!-- Home -->
      <main role="main" class="home col-md-9 ml-sm-auto col-lg-10 px-md-4" id="A">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Home</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary ">
              <span data-feather="calendar"></span>
            </button>
          </div>
        </div>
        <h2 class="subtitle">Section title</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1,001</td>
                <td>random</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
              </tr>
              <tr>
                <td>1,002</td>
                <td>placeholder</td>
                <td>irrelevant</td>
                <td>visual</td>
                <td>layout</td>
              </tr>
              <tr>
                <td>1,003</td>
                <td>data</td>
                <td>rich</td>
                <td>dashboard</td>
                <td>tabular</td>
              </tr>
              <tr>
                <td>1,003</td>
                <td>information</td>
                <td>placeholder</td>
                <td>illustrative</td>
                <td>data</td>
              </tr>
              <tr>
                <td>1,004</td>
                <td>text</td>
                <td>random</td>
                <td>layout</td>
                <td>dashboard</td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>


      <!-- Doctors -->
      <main role="main" class="doctors invisible col-md-9 ml-sm-auto col-lg-10 px-md-4" id="B">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Doctors</h2>
          <div class="btn-toolbar mb-2 mb-md-0">
            <!-- <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div> -->
            <a href="doctor-reg.html" type="button" class="btn btn-sm btn-outline-primary" id="appointment-form">
              <span data-feather="user-plus"></span>
              Add a doctor
            </a>
          </div>
        </div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-2">
        <h2 class="subtitle">Upcoming Appointments</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
          <button type="button" class="btn btn-sm btn-outline-danger d-flex justify-content-center" id="appointment-form">
            <span data-feather="trash-2" class="mr-2"></span>
            Delete
          </button>

        </div>
      </div>
        
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Date</th>
                <th>Time</th>
                <th>Doctor</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="checkbox" name="" id=""> 1</td>
                <td>2021/10/29</td>
                <td>15:10</td>
                <td>Dr.Bimsara</td>
                <td><span class="status green"></span>
                  Confirmed</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="" id=""> 2</td>
                <td>2021/10/30</td>
                <td>14:10</td>
                <td>Dr.Dilusha</td>
                <td><span class="status orange"></span>
                  Pending</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="" id=""> 3</td>
                <td>2021/10/30</td>
                <td>15:10</td>
                <td>Dr.Kasun</td>
                <td><span class="status red"></span>
                  Cancelled</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="" id=""> 4</td>
                <td>2021/11/3</td>
                <td>18:00</td>
                <td>Dr.Nirmal</td>
                <td><span class="status green"></span>
                  Confirmed</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="" id=""> 5</td>
                <td>2021/10/29</td>
                <td>15:10</td>
                <td>Dr.Bimsara</td>
                <td><span class="status orange"></span>
                  Pending</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="" id=""> 6</td>
                <td>2021/10/30</td>
                <td>14:10</td>
                <td>Dr.Dilusha</td>
                <td><span class="status red"></span>
                  Cancelled</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="" id=""> 7</td>
                <td>2021/10/30</td>
                <td>15:10</td>
                <td>Dr.Kasun</td>
                <td><span class="status green"></span>
                  Confirmed</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="" id=""> 8</td>
                <td>2021/11/3</td>
                <td>18:00</td>
                <td>Dr.Nirmal</td>
                <td><span class="status orange"></span>
                  Pending</td>
              </tr>
             
            </tbody>
          </table>
        </div>
      </main>
      
      <!-- Patients -->
      <main role="main" class="patients invisible col-md-9 ml-sm-auto col-lg-10 px-md-4" id="C">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Patients</h2>
          <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-secondary">
              <span data-feather="calendar"></span>
              New Appointment
            </button>
          </div>
        </div>
        <h2 class="subtitle">Patient List</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
                <th>Header</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1,001</td>
                <td>random</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
              </tr>
              <tr>
                <td>1,002</td>
                <td>placeholder</td>
                <td>irrelevant</td>
                <td>visual</td>
                <td>layout</td>
              </tr>
              <tr>
                <td>1,003</td>
                <td>data</td>
                <td>rich</td>
                <td>dashboard</td>
                <td>tabular</td>
              </tr>
              <tr>
                <td>1,003</td>
                <td>information</td>
                <td>placeholder</td>
                <td>illustrative</td>
                <td>data</td>
              </tr>             
            </tbody>
          </table>
        </div>
      </main>

            <!-- Appointments -->
            <main role="main" class="appointments invisible col-md-9 ml-sm-auto col-lg-10 px-md-4" id="D">
              <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="title">Appointments Here</h2>
                <div class="btn-toolbar mb-2 mb-md-0">
                  <button type="button" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="calendar"></span>
                    New Appointment
                  </button>
                </div>
              </div>
              <h2 class="subtitle">Doctor List</h2>
              <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Header</th>
                      <th>Header</th>
                      <th>Header</th>
                      <th>Header</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1,001</td>
                      <td>random</td>
                      <td>data</td>
                      <td>placeholder</td>
                      <td>text</td>
                    </tr>
                    <tr>
                      <td>1,002</td>
                      <td>placeholder</td>
                      <td>irrelevant</td>
                      <td>visual</td>
                      <td>layout</td>
                    </tr>
                    <tr>
                      <td>1,003</td>
                      <td>data</td>
                      <td>rich</td>
                      <td>dashboard</td>
                      <td>tabular</td>
                    </tr>
                    <tr>
                      <td>1,003</td>
                      <td>information</td>
                      <td>placeholder</td>
                      <td>illustrative</td>
                      <td>data</td>
                    </tr>             
                  </tbody>
                </table>
              </div>
            </main>
      
      <!-- Messages -->
      <main role="main" class="messages invisible col-md-9 ml-sm-auto col-lg-10 px-md-4" id="E">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Messages</h2>
          <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-secondary">
              <span data-feather="calendar"></span>
              New chat
            </button>
          </div>
        </div>
        <h2 class="subtitle">Messages</h2>
        <p>Messages are here</p>
      </main>
      
      <!-- Settings -->
      <main role="main" class="settings invisible col-md-9 ml-sm-auto col-lg-10 px-md-4" id="F">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Settings</h2>
          <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-secondary">
              <span data-feather="calendar"></span>
              New Appointment
            </button>
          </div>
        </div>
        <h2 class="subtitle">Settings Here</h2>
        <p>Messages are here</p>

      </main>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

  <script src="<?php echo URLROOT; ?>/js/dashboard.js"></script>
</body>

</html>