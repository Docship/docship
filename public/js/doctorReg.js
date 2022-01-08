const inputs = document.querySelectorAll('.doc-reg');
const smalls = document.querySelectorAll('small');
const submitReg = document.getElementById('submit-reg');
const selects = document.querySelectorAll('select');
const checkBoxes = document.querySelectorAll('.doc-reg-check');
const inputChanges = document.querySelectorAll('.input-change'); //birthday charge discount
const daysDiv = document.querySelector('.days');
const dayOut = document.getElementById("daysSelected");
const days = document.getElementById('daysSelected');

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

//validation function
/*///////////////////////////////////////////////////// */

//birthday charge discount 
var isInputChanged = false;
//checkboxes
var isCheked = false;
//selects
var isValidSelected = false;
//input texts (8)
var addedInputData = false;


document.addEventListener('readystatechange', event => {
    if (event.target.readyState === "complete") {
        checkWhenLoad();
    }
});
//window.addEventListener('load', checkWhenLoad);


function checkWhenLoad() {
    /////////////////////////////////////////////////////
    inputs.forEach(input => {
        validInputs(input);
    });
    inputChanges.forEach((inputChange1) => {
        validateInputChanges(inputChange1);
    });
    ///////////////////////////////////////////////////////
    var daysArray = days.value.split("");
    checkBoxes.forEach(e => {
        if (daysArray.indexOf(e.value) !== -1) {
            e.checked = true;
        }
    });
    validCheckBoxes();
    /////////////////////////////////////////////////////
    selects.forEach(e => {
        validateSelects(e);
    });
}

function validate(field, regex) {
    if (regex.test(field.value)) {
        field.classList.add('valid');
        field.classList.remove('invalid');
    } else {
        field.classList.add('invalid');
        field.classList.remove('valid');
    }
}

//birthday charge discount
///////////////////////////////////////////////////////
inputChanges.forEach((inputChange) => {
    inputChange.addEventListener('change', (e) => {
        var field = e.target;
        validateInputChanges(field);
    });
});
//selects
//////////////////////////////////////////////////////
selects.forEach((select) => {
    select.addEventListener('change', (e) => {
        var field = e.target;
        validateSelects(field);
    });
});
//check boxes
//////////////////////////////////////////////////////
var days2 = "";
checkBoxes.forEach((box) => {
    box.addEventListener('change', (e) => {
        var boxselect = 0;
        days2 = "";
        checkBoxes.forEach((box1) => {

            if (box1.checked) {
                boxselect++;
                days2 += box1.value;
                //console.log(days2);
            }
        });
        dayOut.value = days2;
        validCheckBoxes();
    });
});

//input text
//////////////////////////////////////////////////////
inputs.forEach((input) => {
    input.addEventListener('keyup', (e) => {
        var field = e.target;
        validInputs(field);
    });
});

//////////VALIDATE FUNCTIONS/////////////////////////
function validateInputChanges(field) {
    if (field.value != "") {
        field.classList.add('valid');
    }
    var changes = 0;
    inputChanges.forEach((inputChange1) => {
        if (inputChange1.classList.contains('valid')) {
            changes++;
        }
    });
    if (changes == 3) {
        isInputChanged = true;
    } else isInputChanged = false;
    //console.log(changes);
    buttonDisabler(isInputChanged, isCheked, isValidSelected, addedInputData);
}



function validCheckBoxes() {
    if (dayOut.value != "") {
        daysDiv.classList.remove('invalid');
        isCheked = true;
    } else {
        daysDiv.classList.add('invalid');
        isCheked = false;
    }
    buttonDisabler(isInputChanged, isCheked, isValidSelected, addedInputData);
}


function validateSelects(field) {
    if (field.value != "") {
        field.classList.add('valid');
    }
    var validSelects = 0;
    selects.forEach((select1) => {
        if (select1.classList.contains('valid')) {
            validSelects++;
        }
    });
    if (validSelects == 4) {
        isValidSelected = true;
    }
    buttonDisabler(isInputChanged, isCheked, isValidSelected, addedInputData);
}


function validInputs(field) {
    if (field.name == 'repassword') {
        if (field.value == "") {
            console.log("nothing in inputs");
        } else if (field.value == document.getElementById('passwordInput').value) {
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
    inputs.forEach((input1) => {
        if (input1.classList.contains('valid')) {
            valids++;
        }
    });
    //console.log(valids);
    if ((valids == 8)) addedInputData = true;
    else addedInputData = false;
    buttonDisabler(isInputChanged, isCheked, isValidSelected, addedInputData);
}

function buttonDisabler(isInputChanged, isCheked, isValidSelected, addedInputData) {
    //console.log(isInputChanged,isCheked,isValidSelected,addedInputData);
    if (isInputChanged && isCheked && isValidSelected && addedInputData) submitReg.disabled = false;
    else submitReg.disabled = true;
}