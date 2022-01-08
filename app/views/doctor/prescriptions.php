<?php require_once APPROOT."/views/inc/header_doctor.php"; ?>
<!-- Prescriptions -->
<main role="main" class="prescriptions col-md-9 ml-sm-auto col-lg-10 px-md-4" id="E">
  <div class="container">
    <div
      class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="title">Prescription</h2>
    </div>
    <form class="" action="" method="post">
      <div class="">
        <p class="subtitle">patient name</p>
        <p class="subtitle">patient age</p>
        <p class="subtitle">patient telephone number</p>
        <p class="subtitle">patient email</p>

      </div>
      <div class="">
        <label class="form-label subtitle" for="">Prescription</label><br>
        <textarea class="form-control" name="postBody" rows="8" cols="160"></textarea><br>
      </div>
      <button class="btn btn-primary" type="submit" name="button">Publish</button>
    </form>
  </div>
</main>
<?php require_once APPROOT."/views/inc/footer.php"; ?>