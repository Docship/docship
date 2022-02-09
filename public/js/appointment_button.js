function setUrlAppoinmentDoc(value){
    if(value=="confirmed"){
        location.href ='http://localhost/docship/doctor/appointments_confirmed';
    }else {
        location.href ='http://localhost/docship/doctor/appointments';
    }
}

function setUrlAppoinmentPat(value){
    console.log('Hey');
    if(value=="confirmed"){
        location.href ='http://localhost/docship/patient/appointments_confirmed';
    }else {
        location.href ='http://localhost/docship/patient/appointments';
    }
}