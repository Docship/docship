/*
const item=document.querySelector('#appointment-cancel');
const appoinmentInputs=document.querySelectorAll("[id='appointment-id']");

appoinmentInputs.forEach(item=>{
    console.log("step 1");
    item.addEventlistner('click',e=>{
    var arr = [];
    if(appoinmentInput.cheked==true){
        console.log("step 1");
        arr.push(item.value);    
    }

    console.log(arr);

    var Data = arr;

    xmlhttp.open( "POST", "http://localhost/docship/appointment/delete",true );
    xmlhttp.setRequestHeader( "Content-Type", "application/json" );
    xmlhttp.send( JSON.stringify(Data));
    });
});
*/////////////

function cancel(){ 
    var checkedValue = null;
    arr = []; 
    var inputElements = document.getElementsByClassName('appointmentCheckbox');
    for(var i=0; inputElements[i]; ++i){
      if(inputElements[i].checked){
           checkedValue = inputElements[i].value;
           arr.push(checkedValue);
        }
    }

    if(arr.length > 0){
        console.log(arr);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if( xmlhttp.readyState==4 && xmlhttp.status==200 ){
                console.log( xmlhttp.responseText );
            }
        };
        console.log("done");
        xmlhttp.open( "POST", "http://localhost/docship/appointment/delete",false );
        xmlhttp.setRequestHeader( "Content-Type", "application/json" );
        console.log("done");
        xmlhttp.send( JSON.stringify(arr));
    }

}