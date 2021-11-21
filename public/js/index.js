document.querySelector("login-btn").addEventListener("click", function () { 
    document.querySelector(".popup-container").classList.add("active");
  });
  
  document.querySelector(".popup-container .close-btn").addEventListener("click", function () { 
    document.querySelector(".popup-container").classList.remove("active");
  });
  

