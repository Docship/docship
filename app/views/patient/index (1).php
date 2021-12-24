<?php require_once APPROOT."/views/inc/header_patient.php"; ?>
      <!-- Home -->
      <main role="main" class="home col-md-9 ml-sm-auto col-lg-10 px-md-4" id="A">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Home</h1>

        </div>
        <h2 class="subtitle">Upcoming Appointments</h2>
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
                <td>Dr.Dilusha</td>
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



      <?php require_once APPROOT."/views/inc/footer_patient.php"; ?>