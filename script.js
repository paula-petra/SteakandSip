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
    console.log(e.target.value);
});

var guestNumber = document.getElementById('guests');
guestNumber.addEventListener('change', function handleChange(e){
    console.log(e.target.value);
});

var checkBtn =  document.querySelector('a[id="anchorBtn"]')
checkBtn.disabled = true;

// selectedDate.addEventListener("change", stateHandle);
selectedTime.addEventListener("change", stateHandle);
guestNumber.addEventListener("change", stateHandle);

function stateHandle() {
    if(selectedTime === "" || guestNumber === "") {
        button.disabled = true;
    } else {
        button.disabled = false;
    }
}