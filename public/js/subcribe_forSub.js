function subcribe(id){ 
    
    if(id > 0){
        var method = "POST";
        var url = "http://localhost/docship/doctor/subcribe";
        console.log(url);

        $.ajax({
            type: method,
            url: url,
            data: JSON.stringify(id),
            success: function(response)
            {
                console.log(response);
                var jsonData = JSON.parse(response);

                //console.log(jsonData);

                if (jsonData.success == "0")
                {
                    location.href = "http://localhost/docship/patient/doctors/all";
                }
                else
                {
                    alert('Subcription fails');
                }
           }
       });

    }
}

function unsubcribe(id){ 
    
    if(id > 0){
        var method = "POST";
        var url = "http://localhost/docship/doctor/unsubcribe";
        console.log(id);

        $.ajax({
            type: method,
            url: url,
            data: JSON.stringify(id),
            success: function(response)
            {
                console.log(response);
                var jsonData = JSON.parse(response);

                //console.log(jsonData);

                if (jsonData.success == "0")
                {
                    location.href = "http://localhost/docship/patient/doctors/subcribe";
                }
                else
                {
                    alert('Unsubcription fails');
                }
           }
       });

    }
}