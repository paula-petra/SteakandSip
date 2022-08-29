$(document).ready(function(){
    $('#menuIcon').click(function(){
        $('ul').toggleClass('showTheMenu');
    });
});

//  

//make past dates obsolete
var date = new Date();
var tdate = date.getDate();
var month = date.getMonth() + 1;

if(tdate < 10){
    date = '0' + tdate;
}

if(month < 10){
    month = '0' + month;
}

var year = date.getUTCFullYear();
var minDate = year + '-' + month + '-' + tdate;
document.getElementById('date').setAttribute('min', minDate);

console.log(minDate);

var selectedDate = document.querySelector('input[id="date"]').addEventListener('change', function(){
    console.log('datevalue', this.value);
    localStorage.setItem("datevalue", this.value);
});

var selectedTime = document.getElementById('time');
selectedTime.addEventListener('change', function handleChange(e){
    localStorage.setItem("timevalue", e.target.value);
    console.log(localStorage.getItem('timevalue'));
});

var guestNumber = document.getElementById('guests');
guestNumber.addEventListener('change', function handleChange(e){
    localStorage.setItem("guests", e.target.value);
    console.log(e.target.value);
});

function setFormValues(){
    console.log('timevalues', localStorage.getItem('timevalue'));
    document.getElementById('time2').value = localStorage.getItem('timevalue');
    document.getElementById('guests2').value = localStorage.getItem('guests');
    document.getElementById('date2').value = localStorage.getItem('datevalue');
}

let input1 = document.getElementById('date');
let input2 = document.getElementById('time');
let input3 = document.getElementById('guests');
var checkBtn = document.querySelector('input[type="submit"]');
checkBtn.disabled = true;

input1.addEventListener("change", stateHandle);
input2.addEventListener("change", stateHandle);
input3.addEventListener("change", stateHandle);

//form validation
function stateHandle() {
    if(input1.value === ""|| input2.value === ""|| input3.value === "") {
        checkBtn.disabled = true;
    } else {
        checkBtn.disabled = false;
    }
}

//prevents button from refreshing page (JQuery)
$('#reservationForm1').submit(function(e) {
    e.preventDefault();

});

$('secondForm').submit(function(e) {
    e.preventDefault();

});

// var form1 = document.getElementById('secondForm');
// var form2 = document.getElementById('thirdForm');

// var next = document.getElementById('next');
// var back = document.getElementById('back');
// var confirm = document.getElementById('confirmBtn');

// next.onclick = function(){
//     form1.style.left = '-450px'
//     form2.style.left = '40px';
// }
