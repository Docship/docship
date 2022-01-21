(function () {
    'use strict'
    feather.replace();
})();

var menuIcon = document.querySelector('#toggler-icon');
    document.querySelector('.navbar-toggler').onclick = () => {
    menuIcon.classList.toggle("fa-times");
}

/* changing colors of navbar */
$(document).ready(function(){
    var path = window.location.pathname,
        text = path.split('/').reverse()[0];
    var target = document.getElementById(text);
    target.classList.add('active');

});