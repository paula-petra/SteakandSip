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

console.log(minDate);