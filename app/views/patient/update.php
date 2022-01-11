<?php require_once APPROOT."/views/inc/header_patient.php"; ?>
<!-- Settings -->
<main role="main" class="settings col-md-9 ml-sm-auto col-lg-10 px-md-4" id="F">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="title">Update Account</h2>
  </div>
  <!-- <h2 class="subtitle">Update your account here</h2>
        <p>Messages are here</p> -->
  <div class="container rounded bg-white">
    <div class="row">
      <div class="col-lg-4 border-right">
        <div class="d-flex flex-column align-items-center text-center py-5">
          <img class="rounded-circle" src="<?php echo URLROOT; ?>/img/user.png" width="90">
          <span class="font-weight-bold"><?php echo $data['firstname'] ?></span>
          <span class="text-black-50"><?php echo $data['email'] ?></span>
          <span><?php echo $data['gender'] ?></span></div>
        <div class="row">
          <div class="col-lg-6 mt-2 d-flex justify-content-center">
            <button type="button" class="btn btn-sm btn-danger d-flex justify-content-center align-content-center"
              id="edit-account">
              <span data-feather="edit" class="mr-2"></span> Edit Account
            </button>
          </div>
          <div class="col-lg-6 mt-2 d-flex justify-content-center">
            <button type="button" form="myform"
              class="btn btn-sm btn-success d-flex justify-content-center align-content-center" id="save-changes">
              <span data-feather="save" class="mr-2"></span> Save Changes
            </button>
          </div>
        </div>
      </div>




      <div class="col-lg-8">
        <div class="p-3 py-1">
          <form id="myform" method="post" action="<?php echo URLROOT; ?>/patient/update">
            <div class="row">
              <div class="col-lg-6 mt-2">
                <input name="fname" type="text" class="form-control update-inputs update-patient"
                  placeholder="First name" value=<?php echo $data['fname'] ?>>
                <div><?php ?></div>
              </div>
              <div class="col-lg-6 mt-2">
                <input name="lname" type="text" class="form-control update-inputs update-patient"
                  placeholder="Last name" value=<?php echo $data['lname'] ?>>
                <div></div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 mt-2">
                <input name="email" type="email" class="form-control update-inputs update-patient" placeholder="Email"
                  value=<?php echo $data['email'] ?>>
                <div></div>
              </div>
              <div class="col-lg-6 mt-2">
                <input name="telephone" type="tel" class="form-control update-inputs update-patient"
                  placeholder="Phone number" value=<?php echo $data['telephone'] ?>>
                <div></div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 mt-2">
                <input name="password" id="passwordInput" type="password"
                  class="form-control update-inputs update-patient" placeholder="New Password" value="">
                <div></div>
              </div>
              <div class="col-lg-6 mt-2">
                <input name="repassword" type="password" class="form-control update-inputs update-patient"
                  placeholder="Re Type your password" value="">
                <div></div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 mt-2">
                <input name="bday" placeholder="Birthday"
                  class="form-control shadow-none update-patient" id="bday" type="text"
                  value=<?php echo $data['bday']?> onfocus="(this.type='date')" onblur="(this.type='text')" />
                <div></div>
              </div>
              <div class="col-lg-6 mt-2">
                <select aria-label="label for the select" id="gender-select" name="gender"
                  class="form-control shadow-none ">
                  <option value="error" selected disabled>Gender</option>
                  <option value="Male" <?php echo ($data['gender']=="Male")? "selected":"" ?>>Male</option>
                  <option value="Female" <?php echo ($data['gender']=="Female")? "selected":"" ?>>Female
                  </option>
                </select>
                <div></div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

</main>
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
  const save = document.getElementById('save-changes');
  const edit = document.getElementById('edit-account');
  const bday = document.getElementById('bday');
  const allInputs = document.getElementsByClassName('update-patient');

  var addedInputData = false;
  var isChooseGender = false;
  var selectBday = false;

  document.addEventListener('readystatechange', event => {
    if (event.target.readyState === "complete") {
      for (var i = 0; i < inputs.length; i++) {
        inputs[i].readOnly = true;
      }
      bday.readOnly = true;
      genderSelect.disabled = true;
      save.disabled = true;
    }
    for (let i = 0; i < inputs.length; i++) {
      validateInputs(inputs[i]);
    }
    genderValidate();
    bdayValidate();
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

  genderSelect.addEventListener('change', e => {
    genderValidate();
  });
  bday.addEventListener('change', e => {
    bdayValidate();
  });
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('keyup', (e) => {
      var field = e.target;
      validateInputs(field);
    });
  }

  function genderValidate() {
    if (genderSelect.value != "error") {
      genderSelect.classList.add('valid');
      isChooseGender = true;
    } else bday.classList.add('invalid');
    buttonDisabler(isChooseGender, selectBday, addedInputData);
  }

  function bdayValidate() {
    if (bday.value != "") {
      bday.classList.add('valid');
      bday.classList.remove('invalid');
      selectBday = true;
    } else {
      bday.classList.add('invalid');
      bday.classList.remove('valid');
    }
    buttonDisabler(isChooseGender, selectBday, addedInputData);
  }

  function validateInputs(field) {
    if (field.name == 'repassword') {
      //console.log('repassword is here bro')
      if (field.value == document.getElementById('passwordInput').value) {
        field.classList.add('valid');
        field.classList.remove('invalid');
      } else {
        field.classList.add('invalid');
        field.classList.remove('valid');
      }
    } else {
      validate(field, patterns[field.name]);
    }

    // check are there any warnings. if have submit button will disable 
    var valids = 0;
    for (let j = 0; j < inputs.length; j++) {
      if (inputs[j].classList.contains('valid')) {
        valids++;
      }
    }
    if ((valids == 6)) addedInputData = true;
    else addedInputData = false;
    buttonDisabler(isChooseGender, selectBday, addedInputData);
  }

  function buttonDisabler(isChooseGender, selectBday, addedInputData) {
    if (isChooseGender && selectBday && addedInputData) {
      save.disabled = false;
    }else save.disabled = true;
  }
  edit.addEventListener('click', (e) => {
    for (var i = 0; i < inputs.length; i++) {
      inputs[i].readOnly = false;
    }
    genderSelect.disabled = false;
    bday.readOnly = false;
  });
</script>
<?php require_once APPROOT."/views/inc/footer.php"; ?>