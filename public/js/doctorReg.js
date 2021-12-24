const inputs = document.querySelectorAll('.doc-reg');
const smalls = document.querySelectorAll('small');
const submitReg = document.getElementById('submit-reg');
const selects = document.querySelectorAll('select');
const checkBoxes = document.querySelectorAll('.doc-reg-check');
const inputChanges = document.querySelectorAll('.input-change'); //birthday charge discount
const daysDiv = document.querySelector('.days');
const dayOut=document.getElementById("daysSelected");

//regex for validation
const patterns = {
    telephone: /^\d{10}$/,
    firstName: /^[a-z\d]{3,12}$/,
    lastName: /^[a-z\d]{3,12}$/,
    password: /^[\w@-]{8,20}$/,
    email: /^([a-z\d\.-]+)(@[a-z\d-]+)\.([a-z]+)(\.[a-z]+)?$/,
    //repassword: /^$/,
    nic: /^\d{9}\w$/,
    college: /^[a-z\d]{3,12}$/,
    accountNo:/^\d/
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
        e.target.classList.add('valid');
        var changes = 0;
        inputChanges.forEach((inputChange1) => {
            if (inputChange1.classList.contains('valid')) {
                changes++;
            }
        });
        if (changes == 3) {
            isInputChanged = true;
        }else isInputChanged=false;
        buttonDisabler(isInputChanged, isCheked, isValidSelected,addedInputData);
    });

});
//check boxes
//////////////////////////////////////////////////////
checkBoxes.forEach((box) => {
    box.addEventListener('change', (e) => {
        var boxselect = 0;
        var days = "";
        checkBoxes.forEach((box1) => {
            
            if (box1.checked) {
                boxselect++;
                days+=box1.value;
                //console.log(days);
            }
        });
        if (boxselect != 0) {
            daysDiv.classList.remove('invalid');
            isCheked = true;
        } else {
            daysDiv.classList.add('invalid');
            isCheked = false;
        }
        buttonDisabler(isInputChanged, isCheked, isValidSelected,addedInputData);
    });
});

//selects
//////////////////////////////////////////////////////
selects.forEach((select) => {
    select.addEventListener('change', (e) => {
        e.target.classList.add('valid');
        var validSelects = 0;
        selects.forEach((select1) => {
            if (select1.classList.contains('valid')) {
                validSelects++;
            }
        });
        if (validSelects == 4) {
            isValidSelected = true;
        }
        buttonDisabler(isInputChanged, isCheked, isValidSelected,addedInputData);
    });
});

//input text
//////////////////////////////////////////////////////
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
        //console.log(valids);
        if ((valids == 8)) addedInputData = true;
        else addedInputData = false;
        buttonDisabler(isInputChanged, isCheked, isValidSelected,addedInputData);
    });
});

function buttonDisabler(isInputChanged, isCheked, isValidSelected,addedInputData) {
    //console.log(isInputChanged,isCheked,isValidSelected,addedInputData);
    if (isInputChanged && isCheked && isValidSelected && addedInputData) submitReg.disabled = false;
    else submitReg.disabled = true;
}