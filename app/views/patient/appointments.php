<?php require_once APPROOT."/views/inc/header_patient.php"; ?>


<!-- Appointments -->
<main role="main" class="appointments invisible col-md-9 ml-sm-auto col-lg-10 px-md-4" id="b">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="title">Appointments</h2>
          <div class="btn-toolbar mb-2 mb-md-0">
            <!-- <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div> -->
            <button type="button" class="btn btn-sm btn-outline-secondary" id="appointment-form">
              <!--<span data-feather="calendar"></span>-->
              New Appointment
            </button>
          </div>
        </div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-2">
        <h2 class="subtitle">Upcoming Appointments</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
          <button type="button" class="btn btn-sm btn-outline-danger d-flex justify-content-center" id="appointment-form">
            <!--<span data-feather="x-circle" class="mr-2"></span>-->
            Cancel
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

      <!-- Appointment form -->
      
      <div class="popup-container">
        <div class="close-btn">&times;</div>
        <div class="container">
          <form class="mx-sm-1 mx-md-2 mx-lg-3 my-5">
            <h2 class="text-center subtitle">New Appointment</h2>            

                <input placeholder="Date" name="day" class="form-control  my-2 " type="text"
                                    onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
        

                <select id="inputGender" class="form-control my-2 ">
                  <option selected>Doctor</option>
                  <option>Dr. Dilusha</option>
                  <option>Dr. Bimsara</option>
                  <option>Dr. Kasun</option>
                  <option>Dr. Nirmal</option>
              </select>

              <select id="inputTime" class="form-control my-2 ">
                <option selected>Time</option>
                <option>17.00</option>
                <option>17.30</option>
                <option>18.00</option>
                <option>18.30</option>
            </select>



              <button type="submit" class="btn btn-danger w-100 my-2">
                Create new Appointment
              </button>

            
          </form>
        </div>
      </div>


<?php require_once APPROOT."/views/inc/footer_patient.php"; ?>