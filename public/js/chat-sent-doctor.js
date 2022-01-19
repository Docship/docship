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
        var url = "http://localhost/docship/message/send/doctor";
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
        
}



setInterval(() => {
    // Ajax
    var url = "http://localhost/docship/message/load/doctor";
    //console.log(url);
    var method = "POST";
   
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
}, 500);