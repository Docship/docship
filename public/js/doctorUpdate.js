const inputs = document.querySelectorAll('.doc-reg');
const smalls = document.querySelectorAll('small');
const submitReg = document.getElementById('submit-reg');
const selects = document.querySelectorAll('select');
const checkBoxes = document.querySelectorAll('.doc-reg-check');
const inputChanges = document.querySelectorAll('.input-change'); //birthday charge discount
const daysDiv = document.querySelector('.days');
const dayOut = document.getElementById("daysSelected");
const days = document.getElementById('daysSelected');
const from = document.getElementById('working_from');
const to = document.getElementById('working_to');

// from.addEventListener('change',e=>{

// })
function setTime(time) {
    
    //console.log("Enter set time");
    var docStartTime = time.split('.');
    // console.log(docStartTime);
    // console.log(docStartTime[1][3]);
    // var to = end.split(":");
    docStartTime[0] = parseInt(docStartTime[0]);
    if (docStartTime[1][3] == "P") {
        docStartTime[0] = docStartTime[0] + 12;
    }

    var docStartTime1 = new Date();
    docStartTime1.setHours(parseInt(docStartTime[0]), 0, 0);
    //console.log(docStartTime1.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"));

    var startTimeObject = new Date();
    startTimeObject.setHours(5, 0, 0);
    //console.log(startTimeObject.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"));

    var endTimeObject = new Date();
    endTimeObject.setHours(21, 0, 0);
    //console.log(endTimeObject.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"));

    //const timeSlot = document.getElementById('time-slices');
    to.innerHTML = "<option selected disabled>To</option>";

    while (docStartTime1 < endTimeObject) {
        docStartTime1.setHours(docStartTime1.getHours() + 1);
        var dd = docStartTime1.toLocaleTimeString().replace(/([\d]+.[\d]{2})(.[\d]{2})(.*)/, "$1$3");
        //console.log(docStartTime1.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3"));
        to.innerHTML += "<option>" + dd + "</option>";
    }
}


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
        lockInpututsSelects(true);
    }
});
//window.addEventListener('load', checkWhenLoad);


function checkWhenLoad() {
    to.disabled = true;
    /////////////////////////////////////////////////////
    inputs.forEach(input => {
        validInputs(input);
    });
    inputChanges.forEach((inputChange1) => {
        validateInputChanges(inputChange1);
    });
    ///////////////////////////////////////////////////////
    if (!days.value == "") {
        var daysArray = days.value.split("");
        checkBoxes.forEach(e => {
            if (daysArray.indexOf(e.value) !== -1) {
                e.checked = true;
            }
        });
        validCheckBoxes();
    }

    /////////////////////////////////////////////////////
    selects.forEach(e => {
        validateSelects(e);
    });

}
function lockInpututsSelects(action) {
    inputs.forEach(e=>{
        e.readOnly = action;
    });
    selects.forEach(e=>{
        e.disabled=action;
    });
    checkBoxes.forEach(e=>{
        e.disabled=action;
    });
    inputChanges.forEach(e=>{
        e.readOnly=action;
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
    console.log(changes);
    if (changes == 4) {
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
    const val = ["Gender", "Specialization", "From", "To", "Bank", "Branch"];

    if (val.indexOf(field.value) == -1) {
        field.classList.add('valid');
        if (field.name == "working_from") {
            to.disabled = false;
            setTime(field.value);
        }
    }
    var validSelects = 0;
    selects.forEach((select1) => {
        if (select1.classList.contains('valid')) {
            validSelects++;
        }
    });
    if (validSelects == 6) {
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
        if (field.value == "") {
            //console.log("nothing in inputs");
        } else
            validate(field, patterns[field.name]);
    }

    // check are there any warnings. if have submit button will disable 
    var valids = 0;
    inputs.forEach((input1) => {
        if (input1.classList.contains('valid')) {
            valids++;
        }
    });
    console.log(valids);
    if ((valids == 8)) addedInputData = true;
    else addedInputData = false;
    buttonDisabler(isInputChanged, isCheked, isValidSelected, addedInputData);
}

function buttonDisabler(isInputChanged, isCheked, isValidSelected, addedInputData) {
    //console.log(isInputChanged,isCheked,isValidSelected,addedInputData);
    if (isInputChanged && isCheked && isValidSelected && addedInputData) submitReg.disabled = false;
    else submitReg.disabled = true;
}