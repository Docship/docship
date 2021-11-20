const signIn = document.querySelectorAll(".sign-in"),
    signUp = document.querySelectorAll(".sign-up"),
    lostPassword = document.querySelectorAll(".lost-password"),
    signInForm = document.querySelector(".sign-in-form"),
    signUpForm = document.querySelector(".sign-up-form"),
    lostPasswordForm = document.querySelector(".lost-password-form");
const inputs = document.querySelectorAll('input');
const smalls = document.querySelectorAll('small');
const submitReg = document.getElementById('submit-reg');
const select = document.querySelector('select');

//regex for validation
const patterns = {
    telephone: /^\d{10}$/,
    firstName: /^[a-z\d]{5,12}$/,
    lastName: /^[a-z\d]{5,12}$/,
    password: /^[\w@-]{8,20}$/,
    email: /^([a-z\d\.-]+)(@[a-z\d-]+)\.([a-z]+)(\.[a-z]+)?$/,
    repassword: /^$/
};

//validation function
var genderSelect = false;
var addedInputData = false;
var isBdaySelect=false;

function validate(field, regex) {
    if (regex.test(field.value)) {
        field.classList.add('valid');
        field.classList.remove('invalid');
    } else {
        field.classList.add('invalid');
        field.classList.remove('valid');
    }
}

inputs[6].addEventListener('change', (e) => {
    if (e.target.value != '') {
        e.target.classList.add('valid');
        isBdaySelect=true;
    }
    buttonDisabler(addedInputData,genderSelect,isBdaySelect);
});



select.addEventListener('change', (e) => {
    e.target.classList.add('valid')
    genderSelect = true;
    console.log(addedInputData,genderSelect,isBdaySelect);
    buttonDisabler(addedInputData,genderSelect,isBdaySelect);
});

inputs.forEach((input) => {
    input.addEventListener('keyup', (e) => {

        //console.log(e.target.value);
        //console.log(e.target);
        //console.log(document.getElementById('passwordInput').value);
        if (e.target.attributes.name.value == 'repassword') {
            if (e.target.value == document.getElementById('passwordInput').value) {
                e.target.classList.add('valid');
                e.target.classList.remove('invalid');
            } else {
                e.target.classList.add('invalid');
                e.target.classList.remove('valid');
            }
        }
        
         else {
            validate(e.target, patterns[e.target.attributes.name.value])
        }

        // check are there any warnings. if have submit button will disable 
        var valids = 0;
        inputs.forEach((input1) => {
            if (input1.classList.contains('valid')) {
                valids++;
            }
        });
        console.log(valids);
        if ((valids == 6)) addedInputData=true;
        else inputData=false;
        buttonDisabler(addedInputData,genderSelect,isBdaySelect);
    });
});

function buttonDisabler(inputData,genderSelect,isBdaySelect) {
    //console.log(inputData,genderSelect,isBdaySelect);
    if (inputData && genderSelect && isBdaySelect) submitReg.disabled = false;
    else submitReg.disabled = true;
}


inputs.forEach((input) => {
    if (input.classList.contains('invalid')) {
        submitReg.disabled = true;
    }
});
/* ========= Hiding forms ========= */
function showSignIn() {
    signInForm.classList.remove("invisible");
    signUpForm.classList.add("invisible");
    lostPasswordForm.classList.add("invisible");
}

function showSignUp() {
    signUpForm.classList.remove("invisible");
    signInForm.classList.add("invisible");
    lostPasswordForm.classList.add("invisible");
}

function showLostPassword() {
    lostPasswordForm.classList.remove("invisible");
    signInForm.classList.add("invisible");
    signUpForm.classList.add("invisible");
}

// @ts-ignore
signIn.forEach((link) => {
    link.addEventListener("click", () => {
        showSignIn();
    });
});

signUp.forEach((link) => {
    link.addEventListener("click", () => {
        showSignUp();
    });
});

lostPassword.forEach((link) => {
    link.addEventListener("click", () => {
        showLostPassword();
    });
});


/* ======== Restricting date ======== */
var today = new Date().toISOString().split('T')[0];
document.getElementsByName("bday")[0].setAttribute('max', today);



function showError(parentId, errorMessage) {
    let children = document.getElementById("parentId").childNodes;
    children[2].innerHTML = errorMessage;
    children[1].classList.add("form-control-error");
    children[2].classList.add("error");
}



/* ========= Backend error Handling ======= */
function readError() {
    let url = window.location.href;
    let urlError = url.split("?")[1].split("=")[1].replace("#", "");
    let redirect = url.split("?")[0];
    // console.log(urlError);
    return [redirect, urlError];
}
// readError();

function HandleBackendError(url, urlError) {
    switch (urlError) {
        case "patientexist":
            // alert("This email is already taken");  
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'This email is already taken',
            });
            showSignUp();
            // location.assign(url);
            break;

        case "pwdnotmatched":
            // alert("Password is not matched");  
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'This email is already taken',
            });
            showSignIn();
            break;

        case "patientinvalid":
            // alert("Email doesn't exist");     
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'This email is already taken',
            });
            showSignIn();
            break;

        default:
            break;
    }
}

let error = readError();
HandleBackendError(error[0], error[1]);