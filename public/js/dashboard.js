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

// const searchCatagoty=document.getElementById('searchCatagory');
// const searchText=document.getElementById('searchItem');

// searchText.addEventListener('keyup',e=>{

// })

// function myFunction() {
//     var input, filter, table, tr, td, i, txtValue;
//     input = document.getElementById("myInput");
//     filter = input.value.toUpperCase();
//     table = document.getElementById("myTable");
//     tr = table.getElementsByTagName("tr");
//     for (i = 0; i < tr.length; i++) {
//       td = tr[i].getElementsByTagName("td")[0];
//       if (td) {
//         txtValue = td.textContent || td.innerText;
//         if (txtValue.toUpperCase().indexOf(filter) > -1) {
//           tr[i].style.display = "";
//         } else {
//           tr[i].style.display = "none";
//         }
//       }       
//     }
//   }
