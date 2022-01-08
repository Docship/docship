<?php require_once APPROOT."/views/inc/header_patient.php"; ?>
<!-- Settings -->
<main role="main" class="settings col-md-9 ml-sm-auto col-lg-10 px-md-4" id="F">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="title">Update Account</h2>
    </div>
    <!-- <h2 class="subtitle">Update your account here</h2>
        <p>Messages are here</p> -->
    <div class="container rounded bg-white">
      <form action="">
      <div class="row">
            <div class="col-lg-4 border-right">
                <div class="d-flex flex-column align-items-center text-center py-5">
                  <img class="rounded-circle" src="<?php echo URLROOT; ?>/img/user.png" width="90">
                    <span class="font-weight-bold"><?php echo $data['patient']['firstname'] ?></span>
                    <span class="text-black-50"><?php echo $data['patient']['email'] ?></span>
                    <span><?php echo $data['patient']['gender'] ?></span></div>
                    <div class="row">
                      <div class="col-lg-6 mt-2 d-flex justify-content-center">
                        <button type="button" class="btn btn-sm btn-danger d-flex justify-content-center align-content-center"
                            id="appointment-form">
                            <span data-feather="edit" class="mr-2"></span> Edit Account
                        </button>
                      </div>
                      <div class="col-lg-6 mt-2 d-flex justify-content-center">
                        <button type="button" class="btn btn-sm btn-success d-flex justify-content-center align-content-center"
                            id="appointment-form">
                            <span data-feather="save" class="mr-2"></span> Save Changes
                        </button>
                      </div>                       
                    </div>
                </div>
            <div class="col-lg-8">
                <div class="p-3 py-1">
                    <div class="row">
                        <div class="col-lg-6 mt-2">
                          <input type="text" class="form-control" placeholder="First name" value=<?php echo $data['patient']['firstname'] ?>>
                          <div><?php ?></div>
                        </div>
                        <div class="col-lg-6 mt-2">
                          <input type="text" class="form-control" placeholder="Last name" value=<?php echo $data['patient']['lastname'] ?> >
                          <div></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mt-2">
                          <input type="email" class="form-control" placeholder="Email" value=<?php echo $data['patient']['email'] ?>>
                          <div></div>
                        </div>
                        <div class="col-lg-6 mt-2">
                          <input type="tel" class="form-control" placeholder="Phone number" value=<?php echo $data['patient']['telephone'] ?> >
                          <div></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mt-2">
                          <input type="password" class="form-control" placeholder="New Password" value="abX45@j4">
                          <div></div>
                        </div>
                        <div class="col-lg-6 mt-2">
                          <input type="password" class="form-control" placeholder="Re Type your password" value="abX45@j4" >
                          <div></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mt-2">
                          <input placeholder="Birthday" name="bday" class="form-control shadow-none" id="bday" type="text" value=<?php echo $data['patient']['bday'] ?>
                                onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                          <div></div>
                        </div>
                        <div class="col-lg-6 mt-2">
                        <select id="inputGender" name="gender" class="form-control shadow-none">
                                <option value="error" selected disabled>Gender</option>
                                <option value="Male" <?php echo ($data['patient']['gender']=="Male")? "selected":"" ?>>Male</option>
                                <option value="Female" <?php echo ($data['patient']['gender']=="Female")? "selected":"" ?>>Female</option>
                            </select>
                            <div></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
      </form>

    </div>

</main>

<?php require_once APPROOT."/views/inc/footer.php"; ?>