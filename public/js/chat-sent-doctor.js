const form = document.querySelector('.typing-area'),
    inputField = form.querySelector('.input-field'),
    sendBtn = form.querySelector('.sent-btn'),
    chatBox = document.querySelector('.chat-box');

    // @ts-ignore
    form.onsubmit = (e)=>{
        e.preventDefault();
    }

sendBtn.onclick = ()=>{
        // Ajax
        var url = window.location.href+ '/../../message/send/doctor';
        let xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if (xhr.status === 200) {
                    inputField.value = "";
                }
            }
        }    
        let formData = new FormData(form); // creating new formData object    
        xhr.send(formData);
}

setInterval(() => {
    // Ajax
    var url = window.location.href+ '/../../message/load/doctor';
    let xhr = new XMLHttpRequest();
    xhr.open("POST", url , true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
            }
        }
    }
    let formData = new FormData(form); // creating new formData object    
    xhr.send(formData);
}, 500); // This function will run frequently after 0.5s