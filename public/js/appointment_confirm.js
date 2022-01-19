function confirm(){ 
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
        var method = "POST";
        var url = window.location.href+ '/../../appointment/confirm';
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
                    alert('Confirmation fails');
                }
           }
       });

    }
}