<?php require_once APPROOT."/views/inc/header_patient.php"; ?>


<main role="main" class="doctors col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <form class="my-4 d-flex justify-content-center border-bottom">
    <div class="form-row mx-2">
      <div class="col-12 col-md-auto">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <div class="col-auto">
        <select class="custom-select">
          <option selected>Specification</option>
          <option value="allergist">Allergist</option>
          <option value="dermatologist">Dermatologist</option>
          <option value="ophthalmologist">Ophthalmologist</option>
          <option value="obstetrician">Obstetrician</option>
          <option value="gynecologist">Gynecologist</option>
          <option value="cardiologist">Cardiologist</option>
          <option value="endocrinologist">Endocrinologist</option>
          <option value="gastroenterologist">Gastroenterologist</option>
        </select>
      </div>

      <div class="col-auto">
      <select class="custom-select">
          <option selected>Day</option>
          <option value="monday">Monday</option>
          <option value="tuesday">Tuesday</option>
          <option value="wednesday">Wednesday</option>
          <option value="thursday">Tuesday</option>
          <option value="friday">Friday</option>
          <option value="saturday">Saturday</option>
          <option value="sunday">Sunday</option>
        </select>
      </div>

      <div class="col-auto">
      <select class="custom-select">
          <option selected>Time</option>
          <option value="5.00 AM - 6.00 AM">5.00 AM - 6.00 AM</option>
          <option value="6.00 AM - 7.00 AM">6.00 AM - 7.00 AM</option>
          <option value="7.00 AM - 8.00 AM">7.00 AM - 8.00 AM</option>
          <option value="8.00 AM - 9.00 AM">8.00 AM - 9.00 AM</option>
          <option value="9.00 AM - 10.00 AM">9.00 AM - 10.00 AM</option>
          <option value="10.00 AM - 11.00 AM">10.00 AM - 11.00 AM</option>
          <option value="11.00 AM - 12.00 PM">11.00 AM - 12.00 PM</option>
          <option value="12.00 PM - 1.00 PM">12.00 PM - 1.00 PM</option>
          <option value="1.00 PM - 2.00 PM">1.00 PM - 2.00 PM</option>
          <option value="2.00 PM - 3.00 PM">2.00 PM - 3.00 PM</option>
          <option value="3.00 PM - 4.00 PM">3.00 PM - 4.00 PM</option>
          <option value="4.00 PM - 5.00 PM">4.00 PM - 5.00 PM</option>
          <option value="5.00 PM - 6.00 PM">5.00 PM - 6.00 PM</option>
          <option value="6.00 PM - 7.00 PM">6.00 PM - 7.00 PM</option>
          <option value="7.00 PM - 8.00 PM">7.00 PM - 8.00 PM</option>
          <option value="8.00 PM - 9.00 PM">8.00 PM - 9.00 PM</option>
        </select>
      </div>

      <div class="col-auto">
      <select class="custom-select">
          <option selected>Charge</option>
          <option value="500">RS. 500</option>
          <option value="1000">RS .1000</option>
          <option value="1500">RS .1500</option>
          <option value="2000">RS .2000</option>
          <option value="2500">RS .2500</option>
          <option value="3000">RS .3000</option>
          <option value="3500">RS .3500</option>
          <option value="4000">RS .4000</option>
          <option value="4500">RS .4500</option>
          <option value="5000">RS .5000</option>
        </select>
      </div>

      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-2 rounded-circle"> <i class="fas fa-search"></i> </button>
      </div>
    </div>
  </form>


    <div class="container-fluid">
    <div class="row">
      <?php
        if(isset($data['doctors'])){
          if(!empty($data['doctors'])){
            foreach($data['doctors'] as $doctor){
              echo 
              '<div class="col-md-6 col-lg-4 my-2">
              <div class="card" style="border-radius: 15px;">
                <div class="card-body text-center">
                  <div class="mt-3 mb-2 d-flex justify-content-center mx-auto">
                    <img src="' . URLROOT . '/img/user.png" class="img-fluid" />
                  </div>
                    <h4 class="m-0">Dr. ' . $doctor["firstname"] . ' ' . $doctor["lastname"] . ' </h4>
                    <p class="text-muted"> ' . $doctor["category"] . ' </p>
                    <div class="progress mx-4 mb-2">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 60%"></div>
                    </div>
                    <button class="btn btn-primary btn-sm mb-3">Subscribe</button>
        
                    <div class="my-1 days">
                      <div class="week d-flex justify-content-center">
                        <div>M</div>
                        <div class="active">T</div>
                        <div>W</div>
                        <div class="active">T</div>
                        <div>F</div>
                        <div class="active">S</div>
                        <div class="active">S</div>
                      </div>
                    </div>
                    <p class="mb-3 h6 text-muted">5.00pm - 8.00pm</p>
                    <div class="d-flex justify-content-center text-center mb-2">
                      <div class="px-3">
                        <p class="h5 mb-0"> ' . $doctor["charge_amount"] . '</p>
                        <p class="text-muted mb-0">Charge per Person</p>
                      </div>
                      <div class="px-3">
                        <p class="h5 mb-0">15%</p>
                        <p class="text-muted mb-0">Discount</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>';
            }
          }else {
            echo "<br><p>" . 'No any Doctor available in the System.' . "</p>";
          }
        }else {
          echo "<br><p style='color:red'>" . 'System failure.' . "</p>";
        }
      ?>



    </div>
  </div>
</main>
<?php require_once APPROOT."/views/inc/footer.php"; ?>
