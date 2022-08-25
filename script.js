$(document).ready(function(){
    $('#menuIcon').click(function(){
        $('ul').toggleClass('showTheMenu');
    });
});

function toggle() {
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');
    var popup = document.getElementById('popup');
    popup.classList.toggle('active');
}

function closePopup() {
    var close = document.getElementById('popup');
    close.classList.toggle('active')
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');
}

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
document.getElementById('date2').setAttribute('min', minDate);

//  console.log(minDate);

var selectedDate = document.querySelector('input[id="date"]').addEventListener('change', function(){
    console.log(this.value);

});

var selectedTime = document.getElementById('time');
selectedTime.addEventListener('change', function handleChange(e){
    localStorage.setItem("timevalue", e.target.value);
    console.log("IME FROM STORAGE IS: ",localStorage.getItem('timevalue'));
});

var guestNumber = document.getElementById('guests');
guestNumber.addEventListener('change', function handleChange(e){
    console.log(e.target.value);
});


let input1 = document.getElementById('date');
let input2 = document.getElementById('time');
let input3 = document.getElementById('guests');
var checkBtn = document.querySelector('input[type="submit"]')
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

    // function passvalues() {
    //     var reservedTime = input2.value;
    //     localStorage.setItem("timevalue", reservedTime);
    //     return true;
    // }

    // passvalues();

});

//move values to second form

let myTime = localStorage.getItem("timevalue");


console.log("MY TIME IS",myTime);
//document.querySelector('input[id="time2"]').value= myTime;
//document.getElementById("time2").value = myTime;
// let temp = myTime
var dropTime = document.getElementById('time2');
for (var i, j=0; i = dropTime.options[j]; j++){
    if(i.value === myTime){
        dropTime.selectedIndex = j;
        break;
    }
}