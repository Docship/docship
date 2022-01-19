const form = document.querySelector('.typing-area'),
    inputField = form.querySelector('.input-field'),
    sendBtn = form.querySelector('.sent-btn'),
    chatBox = document.querySelector('.chat-box');

    // @ts-ignore
    form.onsubmit = (e)=>{
        e.preventDefault();
    }

function send(){
        console.log('Sent 1');
        // Ajax
        var url = "http://localhost/docship/message/send/patient";
        console.log(url);
        var method = "POST";
        var data = document.getElementsByClassName('input-field')[0].value;

        if(data!=""){
            $.ajax({
                type: method,
                url: url,
                data: JSON.stringify(data),
                success: function(response)
                {
                    console.log(response);
                    var jsonData = JSON.parse(response);
        
                    //console.log(jsonData);
        
                    if (jsonData.status === 'success')
                    {
                        console.log(jsonData.status);
                        document.getElementsByClassName('input-field')[0].value = "";
                    }
                    else
                    {
                        alert("message loading failed");
                    }
               }
           });
        }
        /*
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/docship/message/send/patient", true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if (xhr.status === 200) {
                    console.log('Sent message');
                    let data = xhr.response;
                    if(data=="success") inputField.value = "";
                    else if(data=="fail") alert("message send failed");
                    else alert(xhr.status);
                }
            }
        }    
        let formData = new FormData(form); // creating new formData object    
        xhr.send(formData);
        */

        
}



setInterval(() => {
    // Ajax
    var url = "http://localhost/docship/message/load/patient";
    console.log(url);
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
                chatBox.innerHTML = jsonData.messages;
            }
            else
            {
                alert("message loading failed");
            }
       }
   });
}, 500); // This function will run frequently after 0.5s