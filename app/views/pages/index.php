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
      <div class="d-flex h-100 text-center align-items-center">
        <div class="w-100 text-white">
          <h1 class="header">Channel your Doctor from <b>Anywhere.</b> <b>Anytime.</b></h1>

          <p class="lead mb-0">The #1 doctor channelling platform in SriLanka</p>
        </div>
      </div>
    </div>
  </header>

  <section class="about" id="about">
    <div class="container-fluid">
      <div class="row d-flex justify-content-center about-pos">
        <div class="col-md-12 d-flex justify-content-center">
          <h2 class="section-header-dark">About Us</h2>
        </div>
      </div>
        <div class="container about-inner">
          <div class="row d-flex justify-content-center">
            <div class="col-md-4 style-3">
              <div class="tour-item ">
                <div class="tour-desc bg-white">
                  <div class="tour-text color-grey-3 text-center">“Book limitless physical checkups by picking the best medical services plan for yourself as well as your family by utilizing an oDoc Subscription bundle.”</div>
                  <div class="d-flex justify-content-center pt-2 pb-2"><img class="tm-people" src="<?php echo URLROOT; ?>/img/doc0.jpg"
                      alt=""></div>
                  <div class="link-name d-flex justify-content-center">John Doe</div>
                  <div class="link-position d-flex justify-content-center">Manager</div>
                </div>
              </div>
            </div>
            <div class="col-md-4 style-3">
              <div class="tour-item">
                <div class="tour-desc bg-white">
                  <div class="tour-text color-grey-3 text-center">“Need to do an oddball talk with a specialist? Basically pick a day and time and video channel a specialist inside the space of minutes through DocShip. Send notes and photographs at the hour of your counsel and get all the clinical guidance and care you want from the solace of your home.”</div>
                  <div class="d-flex justify-content-center pt-2 pb-2"><img class="tm-people" src="<?php echo URLROOT; ?>/img/doc1.jpg"
                      alt=""></div>
                  <div class="link-name d-flex justify-content-center">Bimsara Bo</div>
                  <div class="link-position d-flex justify-content-center">Software Engineer</div>
                </div>
              </div>
            </div>
            <div class="col-md-4 style-3">
              <div class="tour-item ">
                <div class="tour-desc bg-white">
                  <div class="tour-text color-grey-3 text-center">“Giving individuals available and reasonable medical services is the foundation of Docship. That incorporates your workers also. Join Docship and backing the wellbeing and prosperity of your workers.”</div>
                  <div class="d-flex justify-content-center pt-2 pb-2"><img class="tm-people" src="<?php echo URLROOT; ?>/img/doc2.jpg"
                      alt=""></div>
                  <div class="link-name d-flex justify-content-center">John Smith</div>
                  <div class="link-position d-flex justify-content-center">Doctor</div>
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
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="<?php echo URLROOT; ?>/js/jquery.js"></script>
  <script src="<?php echo URLROOT; ?>/js/bootstrap.min.js"></script>
</body>

</html>