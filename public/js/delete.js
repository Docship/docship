function doc_delete(){ 
    var checkedValue = null;
    arr = []; 
    var inputElements = document.getElementsByClassName('doctorCheckbox');
    for(var i=0; inputElements[i]; ++i){
      if(inputElements[i].checked){
           checkedValue = inputElements[i].value;
           arr.push(checkedValue);
        }
    }

    console.log(arr);

    if(arr.length > 0){
        var method = "POST";
        var url = "http://localhost/docship/doctor/delete";
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
                    location.href = 'doctors';
                }
                else
                {
                    alert(jsonData.msg);
                    const myTimeout = setTimeout(refresh('doctors'), 5000);
                }
           }
       });

    }
}

function pat_delete(){ 
    var checkedValue = null;
    arr = []; 
    var inputElements = document.getElementsByClassName('patientCheckbox');
    for(var i=0; inputElements[i]; ++i){
      if(inputElements[i].checked){
           checkedValue = inputElements[i].value;
           arr.push(checkedValue);
        }
    }

    console.log(arr);

    if(arr.length > 0){
        var method = "POST";
        var url = "http://localhost/docship/patient/delete";
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
                    location.href = 'patients';
                }
                else
                {
                    alert(jsonData.msg);
                    const myTimeout = setTimeout(refresh('patients'), 5000);
                }
           }
       });

    }
}

function refresh(url){
    location.href = url;
}