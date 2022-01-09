
<?php require_once APPROOT."/views/inc/header_admin.php"; ?>
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

        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 highlight-card">
              <div class="card text-white bg-primary mb-3" style="max-width: 50rem;">
                <div class="card-header">Patients</div>
                  <div class="card-body">
                    <h5 class="card-title">Patient Count</h5>
                    <p class="card-text">
                    <?php
                        if(isset($data['patients_size'])){
                          echo $data['patients_size'];
                        }elseif(isset($data['db_err_1']) && !empty($data['db_err_1'])){
                          echo $data['db_err_1'];
                        }else {
                          echo "System Error";
                        }
                      ?>
                    </p>
                  </div><!-- card body ends -->
              </div><!-- card ends -->
            </div><!-- column ends -->

            <div class="col-lg-4 highlight-card">
              <div class="card text-white bg-success mb-3" style="max-width: 50rem;">
                <div class="card-header">Doctors</div>
                  <div class="card-body">
                    <h5 class="card-title">Doctors count</h5>
                    <p class="card-text">
                    <?php
                        if(isset($data['doctors_size'])){
                          echo $data['doctors_size'];
                        }elseif(isset($data['db_err_2']) && !empty($data['db_err_2'])){
                          echo $data['db_err_2'];
                        }else {
                          echo "System Error";
                        }
                      ?>
                    </p>
                  </div><!-- card body ends -->
              </div><!-- card ends -->
            </div><!-- column ends -->

            <div class="col-lg-4 highlight-card">
              <div class="card text-white bg-danger mb-3" style="max-width: 50rem;">
                <div class="card-header">Appointments</div>
                  <div class="card-body">
                    <h5 class="card-title">Appointments count</h5>
                    <p class="card-text">
                    <?php
                        if(isset($data['appointments_size'])){
                          echo $data['appointments_size'];
                        }elseif(isset($data['db_err_3']) && !empty($data['db_err_3'])){
                          echo $data['db_err_3'];
                        }else {
                          echo "System Error";
                        }
                      ?>
                    </p>
                  </div><!-- card body ends -->
              </div><!-- card ends -->
            </div><!-- column ends -->

          </div><!-- Row ends -->           
        </div><!-- Container-fluid ends -->
        
      </main>
<?php require_once APPROOT."/views/inc/footer.php"; ?>
