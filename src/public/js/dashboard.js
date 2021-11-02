/* globals Chart:false, feather:false */

(function () {  'use strict'
  feather.replace();
})();

document.querySelector("#home").addEventListener("click", function () { 
  document.querySelector(".home").classList.remove("invisible");
  document.querySelector(".appointments").classList.add("invisible");
  document.querySelector(".doctors").classList.add("invisible");
  document.querySelector(".messages").classList.add("invisible");
  document.querySelector(".prescriptions").classList.add("invisible");
  document.querySelector(".settings").classList.add("invisible");
});

document.querySelector("#appointments").addEventListener("click", function () { 
  document.querySelector(".home").classList.add("invisible");
  document.querySelector(".appointments").classList.remove("invisible");
  document.querySelector(".doctors").classList.add("invisible");
  document.querySelector(".messages").classList.add("invisible");
  document.querySelector(".prescriptions").classList.add("invisible");
  document.querySelector(".settings").classList.add("invisible");
});

document.querySelector("#doctors").addEventListener("click", function () { 
  document.querySelector(".home").classList.add("invisible");
  document.querySelector(".appointments").classList.add("invisible");
  document.querySelector(".doctors").classList.remove("invisible");
  document.querySelector(".messages").classList.add("invisible");
  document.querySelector(".prescriptions").classList.add("invisible");
  document.querySelector(".settings").classList.add("invisible");
});

document.querySelector("#messages").addEventListener("click", function () { 
  document.querySelector(".home").classList.add("invisible");
  document.querySelector(".appointments").classList.add("invisible");
  document.querySelector(".doctors").classList.add("invisible");
  document.querySelector(".messages").classList.remove("invisible");
  document.querySelector(".prescriptions").classList.add("invisible");
  document.querySelector(".settings").classList.add("invisible");
});

document.querySelector("#prescriptions").addEventListener("click", function () { 
  document.querySelector(".home").classList.add("invisible");
  document.querySelector(".appointments").classList.add("invisible");
  document.querySelector(".doctors").classList.add("invisible");
  document.querySelector(".messages").classList.add("invisible");
  document.querySelector(".prescriptions").classList.remove("invisible");
  document.querySelector(".settings").classList.add("invisible");
});

document.querySelector("#settings").addEventListener("click", function () { 
  document.querySelector(".home").classList.add("invisible");
  document.querySelector(".appointments").classList.add("invisible");
  document.querySelector(".doctors").classList.add("invisible");
  document.querySelector(".messages").classList.add("invisible");
  document.querySelector(".prescriptions").classList.add("invisible");
  document.querySelector(".settings").classList.remove("invisible");
});


// form

document.querySelector("#appointment-form").addEventListener("click", function () { 
  document.querySelector(".popup-container").classList.add("active");
});

document.querySelector(".popup-container .close-btn").addEventListener("click", function () { 
  document.querySelector(".popup-container").classList.remove("active");
});

var today = new Date().toISOString().split('T')[0];
document.getElementsByName("day")[0].setAttribute('min', today);