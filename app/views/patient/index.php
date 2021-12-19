<?php require_once APPROOT."/views/inc/header_patient.php"; ?>
      <!-- Home -->
      <main role="main" class="home col-md-9 ml-sm-auto col-lg-10 px-md-4" id="A">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Home</h1>

        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 highlight-card">
              <div class="card text-white bg-primary mb-3" style="max-width: 50rem;">
                <div class="card-header">Appointments</div>
                  <div class="card-body">
                    <h5 class="card-title">Next Appointment</h5>
                    <p class="card-text">
                      Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                  </div><!-- card body ends -->
              </div><!-- card ends -->
            </div><!-- column ends -->

            <div class="col-lg-4 highlight-card">
              <div class="card text-white bg-success mb-3" style="max-width: 50rem;">
                <div class="card-header">prescriptions</div>
                  <div class="card-body">
                    <h5 class="card-title">Last Prescription</h5>
                    <p class="card-text">
                      Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                  </div><!-- card body ends -->
              </div><!-- card ends -->
            </div><!-- column ends -->

            <div class="col-lg-4 highlight-card">
              <div class="card text-white bg-danger mb-3" style="max-width: 50rem;">
                <div class="card-header">Header</div>
                  <div class="card-body">
                    <h5 class="card-title">Primary card title</h5>
                    <p class="card-text">
                      Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                  </div><!-- card body ends -->
              </div><!-- card ends -->
            </div><!-- column ends -->

          </div><!-- Row ends -->           
        </div><!-- Container-fluid ends -->

        
        <h2 class="subtitle my-3">Upcoming Appointments</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Doctor</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2021/10/29</td>
                <td>15:10</td>
                <td>Dr.Bimsara</td>
                <td><span class="status green"></span>
                  Confirmed</td>
              </tr>
              <tr>
                <td>2021/10/30</td>
                <td>14:10</td>
                <td>Dr.Nirmal</td>
                <td><span class="status orange"></span>
                  Pending</td>
              </tr>
              <tr>
                <td>2021/10/30</td>
                <td>15:10</td>
                <td>Dr.Kasun</td>
                <td><span class="status red"></span>
                  Cancelled</td>
              </tr>
              <tr>
                <td>2021/11/3</td>
                <td>18:00</td>
                <td>Dr.Nirmal</td>
                <td><span class="status green"></span>
                  Confirmed</td>
              </tr>
              <tr>
                <td>2021/10/29</td>
                <td>15:10</td>
                <td>Dr.Bimsara</td>
                <td><span class="status orange"></span>
                  Pending</td>
              </tr>             
            </tbody>
          </table>
        </div>
      </main>

      <?php require_once APPROOT."/views/inc/footer.php"; ?>
