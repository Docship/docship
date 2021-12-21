(function () {
    'use strict'
    feather.replace();
})();

/* changing colors of navbar */
$(document).ready(function(){
    var path = window.location.pathname,
        link = window.location.href;
    console.log(path);
    console.log(link);
    var text = path.split('/').reverse()[0];
    console.log(text);

    var target = document.getElementById(text);
    target.classList.add('active');

});


var today = new Date().toISOString().split('T')[0];
document.getElementsByName("day")[0].setAttribute('min', today);
