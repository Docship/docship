<?php require_once APPROOT."/views/inc/header_doctor.php"; ?>
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
<?php require_once APPROOT."/views/inc/footer.php"; ?>
