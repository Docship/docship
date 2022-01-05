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

    console.log(arr);

    if(arr.length > 0){
        var method = "POST";
        var url = window.location.href+ '/../../appointment/cancel';
        console.log(url);
        var data = arr;

        $.ajax({
            type: method,
            url: url,
            data: JSON.stringify(data),
            success: function(response)
            {
                console.log(response);
                var jsonData = JSON.parse(response);

                //console.log(jsonData);
 
                if (jsonData.success == "0")
                {
                    location.href = 'appointments';
                }
                else
                {
                    alert('Cancellation fails');
                }
           }
       });

    }
}