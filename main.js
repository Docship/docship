const signIn = document.querySelectorAll(".sign-in"),
signUp = document.querySelectorAll(".sign-up"),
lostPassword = document.querySelectorAll(".lost-password"),
signInForm = document.querySelector(".sign-in-form"),
signUpForm = document.querySelector(".sign-up-form"),
lostPasswordForm = document.querySelector(".lost-password-form");
const inputs = document.querySelectorAll('input');


//regex for validation
const patterns = {
    telephone:/^\d{10}$/,
    firstName:/^[a-z\d]{5,12}$/,
    lastName:/^[a-z\d]{5,12}$/,
    password:/^[\w@-]{8,20}$/,
    email:/^([a-z\d\.-]+)(@[a-z\d-]+)\.([a-z]+)(\.[a-z]+)?$/,
    repassword:/^$/
};

//validation function
function validate(field,regex) {
    if (regex.test(field.value)) {
        field.classList.add('valid');
        field.classList.remove('invalid');
    }else{
        field.classList.add('invalid');
        field.classList.remove('valid');
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup',(e)=>{
        //console.log(e.target.attributes.name.value);
        //console.log(e.target);
        console.log(document.getElementById('passwordInput').value);
        if (e.target.attributes.name.value=='repassword') {
            //console.log(e.target.attributes.name.value);
            validate(e.target, document.getElementById('passwordInput'))
        }else{
            validate(e.target, patterns[e.target.attributes.name.value])
        }
    })    
});

// @ts-ignore
signIn.forEach((link) => {
    link.addEventListener("click", () => {
        signInForm.classList.remove("invisible");
        signUpForm.classList.add("invisible");
        lostPasswordForm.classList.add("invisible");
    });
});

signUp.forEach((link) => {
    link.addEventListener("click", () => {
        signUpForm.classList.remove("invisible");
        signInForm.classList.add("invisible");
        lostPasswordForm.classList.add("invisible");
    });
});

lostPassword.forEach((link) => {
    link.addEventListener("click", () => {
        lostPasswordForm.classList.remove("invisible");
        signInForm.classList.add("invisible");
        signUpForm.classList.add("invisible");
    });
});