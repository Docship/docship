const inputTexts=document.querySelectorAll('.input-text-login');
const role = document.getElementById('inputRole');
const loginReg = document.getElementById('loginSubmit');


const patterns = {
    password: /^[\w@-]{8,20}$/,
    email: /^([a-zA-Z\d\.-]+)(@[a-zA-Z\d-]+)\.([a-zA-Z]+)(\.[a-zA-Z]+)?$/
};

var isRoleSelect = false;
var isInputed =false;

document.addEventListener('readystatechange', event => {
    if (event.target.readyState === "complete") {
        onChangeValidate();
    }
});


function onChangeValidate(){
    if (role.value!="I am a") {
        role.classList.add('valid');
        isRoleSelect = true;
    }

    inputTexts.forEach(element => {
        if (element.value!="") {
            validate(element, patterns[element.attributes.name.value]);
        }
        
        // check are there any warnings. if have submit button will disable 
    });
    var valids =0;
    inputTexts.forEach((input1) => {
        if (input1.classList.contains('valid')) {
            valids++;
        }
    });
    //console.log(valids);
    if ((valids == 2)) isInputed=true;
    else isInputed=false;
    buttonDisabler(isRoleSelect,isInputed);
}


role.addEventListener('change', (e) => {
    e.target.classList.add('valid');
    isRoleSelect = true;
    buttonDisabler(isRoleSelect,isInputed);
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

inputTexts.forEach((input) => {
    input.addEventListener('keyup', (e) => {
        validate(e.target, patterns[e.target.attributes.name.value])
        // check are there any warnings. if have submit button will disable 
        var valids = 0;
        inputTexts.forEach((input1) => {
            if (input1.classList.contains('valid')) {
                valids++;
            }
        });
        console.log(valids);
        if ((valids == 2)) isInputed=true;
        else isInputed=false;
        buttonDisabler(isRoleSelect,isInputed);
    });
});

function buttonDisabler(isRoleSelect,isInputed) {
    //console.log(inputData,genderSelect,isBdaySelect);
    if (isRoleSelect && isInputed) loginReg.disabled = false;
    else loginReg.disabled = true;
}