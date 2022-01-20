const panelBox = document.querySelector('.panel');
setInterval(() => {
    // Ajax
    var url = "http://localhost/docship/message/admin_panel";
    //console.log(url);
    var method = "POST";
    /*
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/docship/message/load/patient" , true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                //console.log(xhr.response);
                
                let data = JSON.parse(xhr.response);
                if(data['status'] === 'success') {
                    chatBox.innerHTML = data['messages'];
                }else {
                    console.log(data.length);
                    //alert("message loading failed");
                }
                
            }
        }
    }
    */
   
    $.ajax({
        type: method,
        url: url,
        success: function(response)
        {
            //console.log(response);
            var jsonData = JSON.parse(response);

            //console.log(jsonData);

            if (jsonData.status === 'success')
            {
                panelBox.innerHTML = jsonData.messages;
            }
            else
            {
                alert("chat loading failed");
            }
       }
   });
}, 1000);