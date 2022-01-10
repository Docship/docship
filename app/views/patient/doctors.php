<?php require_once APPROOT."/views/inc/header_patient.php"; ?>


<main role="main" class="doctors col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <form class="my-4 d-flex justify-content-center border-bottom">
    <div class="form-row mx-2">
      <div class="col-12 col-md-auto">
        <input id="filter-name" type="text" class="form-control" placeholder="Search">
      </div>
      <div class="col-auto">
        <select id="doc-specialization" class="custom-select">
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
      <select id="doc-time" class="custom-select">
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
      <select id="doc-charge" class="custom-select">
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

      <div class="col-auto" style="visibility:hidden"> 
        <button type="submit" class="btn btn-primary mb-2 rounded-circle"> <i class="fas fa-search"></i> </button>
      </div>
    </div>
  </form>


    <div class="container-fluid">
    <div class="row">
      <?php

        function getStatus($s , $data){
          if(strpos($data['working_days'],$s)!== false){
            return true;
          }return false;
        }
        function getDiv($d , $n , $data){
          $result = getStatus($n , $data);
          if($result){
            return "<div class=active>".$d."</div>";
          }else {
            return "<div>".$d."</div>";
          }
        }
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
                    <div class="week d-flex justify-content-center">'
                      .getDiv('M' , "1" , $doctor).
                      getDiv('T' , "2" , $doctor).
                      getDiv('W' , "3" , $doctor).
                      getDiv('T' , "4" , $doctor).
                      getDiv('F' , "5" , $doctor).
                      getDiv('S' , "6" , $doctor).
                      getDiv('S' , "7" , $doctor).
                    '</div>
                    </div>
                    <p class="mb-3 h6 text-muted">'.date('h:i A', strtotime($doctor["working_from"])).' - '
                    .date('h:i A', strtotime($doctor["working_to"])).'</p>
                    <div class="d-flex justify-content-center text-center mb-2">
                      <div class="px-3">
                        <p class="h5 mb-0"> Rs. ' . $doctor["charge_amount"] .'</p>
                        <p class="text-muted mb-0">Charge per Person</p>
                      </div>
                      <div class="px-3">
                        <p class="h5 mb-0">' . $doctor["discount"] .'%</p>
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
<script>
        const listOfDoctors = document.getElementsByClassName('doctor-card');

        var time = document.getElementById('doc-time');
        //console.log(specialization.value);
        time.addEventListener('change', e => {
          if (time.value.toLowerCase().replace(/\s+/g, "") != "time") {
            const pp = time.value.split('-');

            var pstart = pp[0].split(':');
            var pend = pp[1].split(':');

            pstart[0] = parseInt(pstart[0]); //start hour
            pend[0] = parseInt(pend[0]); //start hour

            if (pstart[1][3] == "P") {
              pstart[0] += 12;
            }
            if (pend[1][3] == "P") {
              pend[0] += 12;
            }

            console.log(pstart[0], pend[0]);
            var patStartTime = new Date();
            patStartTime.setHours(parseInt(pstart[0]), 0, 0);
            //console.log(patStartTime.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"));

            var patEndTime = new Date();
            patEndTime.setHours(parseInt(pend[0]), 0, 0);
            //console.log(patEndTime.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"));
          }
          for (let i = 0; i < listOfDoctors.length; i++) {
            //console.log(listOfDoctors[i].getElementsByTagName('p'));
            const ss = listOfDoctors[i].getElementsByTagName('p')[1].innerHTML.split('-');

            var dstart = ss[0].split(':');
            var dend = ss[1].split(':');
            //console.log(dstart[1][3], dend[1][3]);

            dstart[0] = parseInt(dstart[0]); //start hour
            dend[0] = parseInt(dend[0]); //start hour

            if (dstart[1][3] == "P") {
              dstart[0] += 12;
            }
            if (dend[1][3] == "P") {
              dend[0] += 12;
            }

            //console.log(dstart[0], dend[0]);
            var docStartTime = new Date();
            docStartTime.setHours(parseInt(dstart[0]), 0, 0);
            //console.log(docStartTime.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"));

            var docEndTime = new Date();
            docEndTime.setHours(parseInt(dend[0]), 0, 0);
            console.log(docEndTime.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"));


            //console.log(ss.toLowerCase().replace(/\s+/g, ""),time.value.toLowerCase().replace(/\s+/g, ""));
            if (time.value.toLowerCase().replace(/\s+/g, "") == "time") {
              listOfDoctors[i].classList.remove('filter-time');
            } else if (docStartTime <= patStartTime && patEndTime <= docEndTime) {
              listOfDoctors[i].classList.remove('filter-time');
            } else listOfDoctors[i].classList.add('filter-time');
          }
        });








        var select = document.getElementById('doc-specialization');
        //console.log(specialization.value);
        select.addEventListener('change', e => {
          for (let i = 0; i < listOfDoctors.length; i++) {
            console.log(listOfDoctors[i].getElementsByTagName('p'));
            const ss = listOfDoctors[i].getElementsByTagName('p')[0].innerHTML;
            //console.log(ss.toLowerCase(),select.value.toLowerCase());
            //console.log(ss.toLowerCase().replace(/\s+/g, "")==select.value.toLowerCase().replace(/\s+/g, ""));
            if (select.value.toLowerCase().replace(/\s+/g, "") == "specification") {
              listOfDoctors[i].classList.remove('doc-specializion');
            } else if (ss.toLowerCase().replace(/\s+/g, "") == select.value.toLowerCase().replace(/\s+/g, "")) {
              listOfDoctors[i].classList.remove('doc-specializion');
            } else listOfDoctors[i].classList.add('doc-specializion');
          }
        });

        var charge = document.getElementById('doc-charge');
        //console.log(specialization.value);
        charge.addEventListener('change', e => {
          for (let i = 0; i < listOfDoctors.length; i++) {
            //console.log(listOfDoctors[i].getElementsByTagName('p')[2]);
            const ss = listOfDoctors[i].getElementsByTagName('p')[2].innerHTML;
            //console.log(ss.toLowerCase(),charge.value.toLowerCase());
            //console.log(ss.toLowerCase().replace(/\s+/g, ""),charge.value.toLowerCase().replace(/\s+/g, ""));
            //console.log(charge.value.toLowerCase().replace(/\s+/g, "")=="charge")
            if (charge.value.toLowerCase().replace(/\s+/g, "") == "charge") {
              listOfDoctors[i].classList.remove('filter-charge');
            } else if (ss.toLowerCase().replace(/\s+/g, "") == charge.value.toLowerCase().replace(/\s+/g, "")) {
              listOfDoctors[i].classList.remove('filter-charge');
            } else listOfDoctors[i].classList.add('filter-charge');
          }
        });

        var input = document.getElementById('filter-name');
        input.addEventListener('keyup', e => {
          var filterByName = input.value.toUpperCase();
          for (let i = 0; i < listOfDoctors.length; i++) {
            const name = listOfDoctors[i].getElementsByTagName('h4');
            //var currentObjectSpecializaion= listOfDoctors[i].getElementsByTagName('p')[0].innerHTML;
            // console.log();
            if (name[0]) {
              var nameInsideH4 = name[0].innerHTML;

              if (nameInsideH4.toUpperCase().indexOf(filterByName) > -1) {
                listOfDoctors[i].hidden = false;
              } else {
                listOfDoctors[i].hidden = true;
              }
            }
          }
        });
  </script>
<?php require_once APPROOT."/views/inc/footer.php"; ?>
