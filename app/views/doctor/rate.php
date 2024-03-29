<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
  <style>
    .card{
  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }

    h4{
      font-weight: 700;
    }

    h5{
      font-weight: 600;
    }

    .card-body .mt-3{  
      width: 100px; 
      height: 100px; 
      overflow: hidden; 
      border-radius: 50%; 
    }

    .card-body .mt-3 img {
      width: 100%; 
      height: auto; 
      object-fit: cover; 
    }


    svg {
      fill: rgb(129, 129, 129);
      height: 2.5rem;
      width: 2.5rem;
      margin: 0 0.2rem 0.2rem 0.2rem;
    }



    #radios label {
      position: relative;
    }

    input[type="radio"] {
      position: absolute;
      opacity: 0;
    }

    input[type="radio"] + svg {
      -webkit-transition: all 0.2s;
      transition: all 0.2s;
    }

    input + svg {
      cursor: pointer;
    }

    input[class="super-happy"]:hover + svg,
    input[class="super-happy"]:checked + svg,
    input[class="super-happy"]:focus + svg {
      fill: #5cb85c ;
    }

    input[class="happy"]:hover + svg,
    input[class="happy"]:checked + svg,
    input[class="happy"]:focus + svg {
      fill: #0275d8 ;
    }

    input[class="neutral"]:hover + svg,
    input[class="neutral"]:checked + svg,
    input[class="neutral"]:focus + svg {
      fill: #292b2c  ;
    }

    input[class="sad"]:hover + svg,
    input[class="sad"]:checked + svg,
    input[class="sad"]:focus + svg {
      fill: #f0ad4e ;
    }

    input[class="super-sad"]:hover + svg,
    input[class="super-sad"]:checked + svg,
    input[class="super-sad"]:focus + svg {
      fill: #d9534f ;
    }
  </style>
  <title>Rate The Doctor</title>
</head>

<body>

  <div class="container-fluid ">
    <div class="row vh-100 align-items-center justify-content-center">
      <div class="col-md-6 col-lg-4 my-2">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body text-center">
            <div class="mt-3 mb-2 d-flex justify-content-center mx-auto">
              <img src="<?php echo URLROOT; ?>/img/user.png" class="img-fluid" />
            </div>
            <h4 class="m-0 p-0"> Dr. <?php echo $data['doctor']['firstname']; ?></h4>
            <div class="text-muted m-0 pb-2"><?php echo $data['doctor']['category']; ?></div>
            <h5 class="mb-3">Appointment Id: <span id="appointment id" class="text-muted"><?php echo $data['appointment_id']; ?></span></h5>
          

              <div class="rating-container">

                <h5 class="text-muted">I'm feeling...</h5>
                <div class="rating">
                  <form class="rating-form" method="POST" action="<?php echo URLROOT."/rate/add/".$data['appointment_id']; ?>">
            
                    <label for="super-happy">
                  <input type="radio" name="rating" class="super-happy" id="super-happy" value=5 />
                  <svg viewBox="0 0 24 24"><path d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
                  </label>
            
                    <label for="happy">
                  <input type="radio" name="rating" class="happy" id="happy" value=4 checked />
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24"><path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23Z" /></svg>
                  </label>
            
                    <label for="neutral">
                  <input type="radio" name="rating" class="neutral" id="neutral" value=3 />
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24"><path d="M8.5,11A1.5,1.5 0 0,1 7,9.5A1.5,1.5 0 0,1 8.5,8A1.5,1.5 0 0,1 10,9.5A1.5,1.5 0 0,1 8.5,11M15.5,11A1.5,1.5 0 0,1 14,9.5A1.5,1.5 0 0,1 15.5,8A1.5,1.5 0 0,1 17,9.5A1.5,1.5 0 0,1 15.5,11M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M9,14H15A1,1 0 0,1 16,15A1,1 0 0,1 15,16H9A1,1 0 0,1 8,15A1,1 0 0,1 9,14Z" /></svg>
                  </label>
            
                    <label for="sad">
                  <input type="radio" name="rating" class="sad" id="sad" value=2 />
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24"><path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M15.5,8C16.3,8 17,8.7 17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M12,14C13.75,14 15.29,14.72 16.19,15.81L14.77,17.23C14.32,16.5 13.25,16 12,16C10.75,16 9.68,16.5 9.23,17.23L7.81,15.81C8.71,14.72 10.25,14 12,14Z" /></svg>
                  </label>
            
                    <label for="super-sad">
                  <input type="radio" name="rating" class="super-sad" id="super-sad" value=1 />
                  <svg viewBox="0 0 24 24"><path d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" /></svg>
                  </label>

                  <div class="row align-items-center my-3">
                    <div class="col">
                      <button class="btn btn-primary align-items-center w-50">Submit Rating</button>
                    </div>                    
                  </div>
                  
            
                  </form>
                </div>
              </div>


          </div>
        </div>
      </div>
      <!--profile ends-->



    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>