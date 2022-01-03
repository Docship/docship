<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
  <!-- FontAwesome pro -->
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/font-awesome-pro-5/css/all.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/index.css">
  <title>DocShip</title>
</head>

<body>
<nav class="navbar navbar-expand-lg position-fixed navbar-light py-0">
    <a class="navbar-brand ml-3" href="#"><span class="brand-color1">Doc</span><span
        class="brand-color2">Ship</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <a type="button" href="<?php echo URLROOT; ?>/user/login" class="btn btn-login mr-2"> LogIn</a>
        <a type="button" href="<?php echo URLROOT; ?>/patient/register" class="btn btn-register mr-3">Register</a>
      </form>
    </div>
  </nav>

  <header id="home">
    <div class="overlay"></div>
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
      <source src="<?php echo URLROOT; ?>/img/video.mp4" type="video/mp4">
    </video>

    <!-- The header content -->
    <div class="container h-100">
      <div class="d-flex h-100 align-items-center text-white">
        <div class="w-100">
        <h1 class="header text-center">Channel your Doctor from <br> <span id="change">Anywhere.</span> <span>Anytime.</span></h1>
        <h2 class="text-center">The #1 doctor channelling platform in SriLanka</h2>
        </div>
          
      </div>
    </div>
  </header>


  <section id="about" class="py-5">
  <h2 class="section-header-dark text-center">Our Team</h2>
  <div class="row row-cols-1 row-cols-md-3 g-4 mx-1 mx-md-3 mx-lg-5 align-items-baseline">
  <div class="col my-1">
  <div class="card">
      <img
        src="<?php echo URLROOT; ?>/img/doc0.jpg"
        class="card-img-top"
        alt="Hollywood Sign on The Hill"
      />
      <div class="card-body">
        <h5 class="card-title text-center">Limitless Checkups</h5>
        <p class="card-text">
        “Book limitless physical checkups by picking the best medical services plan for yourself as well as your family by utilizing an oDoc Subscription bundle.”
        </p>
        <footer class="blockquote-footer text-center">Bimsara Bodaragama <br> <cite title="Source Title">CEO - The Something Company</cite></footer>
      </div>
    </div>
  </div>
  <div class="col my-1">
  <div class="card">
      <img
        src="<?php echo URLROOT; ?>/img/doc1.jpg"
        class="card-img-top"
        alt="Hollywood Sign on The Hill"
      />
      <div class="card-body">
        <h5 class="card-title text-center">Future is Today</h5>
        <p class="card-text">
        “Need to do an oddball talk with a specialist? Basically pick a day and time and video channel a specialist inside the space of minutes through DocShip. Send notes and photographs at the hour of your counsel and get all the clinical guidance and care you want from the solace of your home.”
        </p>
        <footer class="blockquote-footer text-center">Dilusha Madushan <br> <cite title="Source Title">Chief Architect - DocShip</cite></footer>
      </div>
    </div>
  </div>
  <div class="col my-1">
  <div class="card">
      <img
        src="<?php echo URLROOT; ?>/img/doc2.jpg"
        class="card-img-top"
        alt="Hollywood Sign on The Hill"
      />
      <div class="card-body">
        <h5 class="card-title text-center">Reasonable Medical Service</h5>
        <p class="card-text">
      “Giving individuals available and reasonable medical services is the foundation of Docship. That incorporates your workers also. Join Docship and backing the wellbeing and prosperity of your workers.”
        </p>
        <footer class="blockquote-footer text-center">Dr. Prarthana ML <br> <cite title="Source Title">Doctor</cite></footer>
      </div>
    </div>
  </div>
</div>
  </section>

  <section id="services" class="services">
    <div class="container">
      <h2 class="section-header-light px-md-5">Consulting a doctor has never been this easy. </h2>
      <div class="row">
        <div class="col-md-6 d-block">
          <div class="step-container d-flex mr-md-4 align-items-center my-2">
            <div class="num mr-md-4">1 </div>
            <div class="step">Select your preferred doctor</div>
          </div>
          <div class="step-container d-flex mr-md-4 align-items-center my-2">
            <div class="num mr-md-4">2</div>
            <div class="step">Select your preferred date and time </div>
          </div>
          <div class="step-container d-flex mr-md-4 align-items-center my-2">
            <div class="num mr-md-4">3</div>
            <div class="step">Send any messages, pictures, or reports to your doctor </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="step-container d-flex ml-md-4 align-items-center my-2">
            <div class="num mr-md-4">4</div>
            <div class="step">The doctor will call you at the scheduled appointment time. </div>
          </div>
          <div class="step-container d-flex ml-md-4 align-items-center my-2">
            <div class="num mr-md-4">5</div>
            <div class="step">They will send you the prescription through the app </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="py-5">
  <h2 class="section-header-dark text-center mb-3">Contact With Us</h2>
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-lg-8 p-3 p-md-4 p-lg-5 rounded">
        <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="first-name">First Name</label>
                <input type="text" class="form-control" placeholder="First Name">
              </div>
              <div class="form-group col-md-6">
                <label for="last-name">Last Name</label>
                <input type="text" class="form-control" placeholder="First Name">
              </div>
            </div>

            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="email">Email Address</label>
              <input type="text" class="form-control"  placeholder="Email">
            </div>
            <div class="form-group col-md-6">
              <label for="inputAddress2">Phone Number</label>
              <input type="text" class="form-control" placeholder="Phone Number">
            </div>
            </div>           


            <div class="form-group">
              <label for="exampleFormControlTextarea1">Your Message</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="form-group">
              <button class="btn btn-primary w-100">Send Us The Message</button>
            </div>
      </form>
        </div>

        <div class="col-md-3 col-lg-4">

        </div>
      </div>
    </div>
  </section>

  <footer class="footer text-center py-4">
  Made with <i class="fa fa-heart pulse"></i> in <a href="#" target="_blank" class="text-decoration-none">The Something Company</a>
  </footer>
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="<?php echo URLROOT; ?>/js/jquery.js"></script>
  <script src="<?php echo URLROOT; ?>/js/bootstrap.min.js"></script>  
  <script src="<?php echo URLROOT; ?>/js/popper.min.js"></script>  
  <script src="<?php echo URLROOT; ?>/js/index.js"></script>
</body>

</html>