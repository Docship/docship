<?php require_once APPROOT."/views/inc/header_patient.php"; ?>
<!-- Settings -->
<main role="main" class="settings col-md-9 ml-sm-auto col-lg-10 px-md-4" id="F">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="title">Update Account</h2>
  </div>
  <!-- <h2 class="subtitle">Update your account here</h2>
        <p>Messages are here</p> -->



  <script type="text/javascript">
    //regex for validation
    const patterns = {
      telephone: /^\d{10}$/,
      fname: /^[a-zA-Z\d]{3,12}$/,
      lname: /^[a-zA-Z\d]{3,12}$/,
      password: /^[\w@-]{8,20}$/,
      email: /^([a-z\d\.-]+)(@[a-z\d-]+)\.([a-z]+)(\.[a-z]+)?$/,
      //repassword: /^$/,
      nic: /^\d{9}\w$/,
      college: /^[a-zA-Z\d\s]+$/,
      accountNo: /^\d/
    };
    const inputs = document.getElementsByClassName('update-inputs');
    const genderSelect = document.getElementById('gender-select');

    var addedInputData=false;
    var chooseGender=false;

    document.addEventListener('readystatechange', event => {
      if (event.target.readyState === "complete") {
        inputs.forEach(element => {
          element.attributes.readonly = true;
        });
        genderSelect.attributes.disable = true;
      }
    });

    function validate(field, regex) {
      if (regex.test(field.value)) {
        field.classList.add('valid');
        field.classList.remove('invalid');
      } else {
        field.classList.add('invalid');
        field.classList.remove('valid');
      }
    }

    inputs.forEach((input) => {
      input.addEventListener('keyup', (e) => {
        if (e.target.attributes.name.value == 'repassword') {
          if (e.target.value == document.getElementById('passwordInput').value) {
            e.target.classList.add('valid');
            e.target.classList.remove('invalid');
          } else {
            e.target.classList.add('invalid');
            e.target.classList.remove('valid');
          }
        } else {
          validate(e.target, patterns[e.target.attributes.name.value])
        }

        // check are there any warnings. if have submit button will disable 
        var valids = 0;
        inputs.forEach((input1) => {
          if (input1.classList.contains('valid')) {
            valids++;
          }
        });

        if ((valids == 8)) addedInputData = true;
        else addedInputData = false;
        buttonDisabler(chooseGender, addedInputData);
      });
    });
    function buttonDisabler(chooseGender, addedInputData){
      if (chooseGender&&addedInputData) {
        
      }
    }
  </script>



  <div class="container rounded bg-white">
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
              <input type="text" class="form-control update-inputs" placeholder="First name"
                value=<?php echo $data['patient']['firstname'] ?>>
              <div><?php ?></div>
            </div>
            <div class="col-lg-6 mt-2">
              <input type="text" class="form-control update-inputs" placeholder="Last name"
                value=<?php echo $data['patient']['lastname'] ?>>
              <div></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mt-2">
              <input type="email" class="form-control update-inputs" placeholder="Email"
                value=<?php echo $data['patient']['email'] ?>>
              <div></div>
            </div>
            <div class="col-lg-6 mt-2">
              <input type="tel" class="form-control update-inputs" placeholder="Phone number"
                value=<?php echo $data['patient']['telephone'] ?>>
              <div></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mt-2">
              <input type="password" class="form-control update-inputs" placeholder="New Password" value="abX45@j4">
              <div></div>
            </div>
            <div class="col-lg-6 mt-2">
              <input type="password" class="form-control update-inputs" placeholder="Re Type your password"
                value="abX45@j4">
              <div></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 mt-2">
              <input placeholder="Birthday" name="bday" class="form-control shadow-none update-inputs" id="bday"
                type="text" value=<?php echo $data['patient']['bday'] ?> onfocus="(this.type='date')"
                onblur="(this.type='text')" id="date" />
              <div></div>
            </div>
            <div class="col-lg-6 mt-2">
              <select id="inputGender" id="gender-select" name="gender" class="form-control shadow-none">
                <option value="error" selected disabled>Gender</option>
                <option value="Male" <?php echo ($data['patient']['gender']=="Male")? "selected":"" ?>>Male</option>
                <option value="Female" <?php echo ($data['patient']['gender']=="Female")? "selected":"" ?>>Female
                </option>
              </select>
              <div></div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</main>

<?php require_once APPROOT."/views/inc/footer.php"; ?>