/* globals Chart:false, feather:false */

(function () {
    'use strict'
    feather.replace();
})();


/* add and hide sections */
/*
var selectors = []
var destination = []
for (let i = 0; i < 6; i++) {
    selectors[i] = (document.querySelector("#" + (String.fromCharCode(97 + i)).toString()));
}
for (let i = 0; i < 6; i++) {
    destination[i] = (document.querySelector("#" + (String.fromCharCode(65 + i)).toString()));
}

for (let i of selectors) {
    i.addEventListener("click", function () {
        for (let j of destination) {
            if (selectors.indexOf(i) != destination.indexOf(j)) {
                j.classList.add("invisible");
            } else {
                j.classList.remove("invisible");
            }
        }
    });
}
*/

/* form */
document.querySelector("#appointment-form").addEventListener("click", function () {
    document.querySelector(".popup-container").classList.add("active");
});

document.querySelector(".popup-container .close-btn").addEventListener("click", function () {
    document.querySelector(".popup-container").classList.remove("active");
});

var today = new Date().toISOString().split('T')[0];
document.getElementsByName("day")[0].setAttribute('min', today);
