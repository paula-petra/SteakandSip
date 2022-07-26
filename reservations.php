<?php 
// date_default_timezone_set("Europe/Malta");
$mydate = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations - Steak and Sip - Steakhouse and Winery Restaurant</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>

<body class="body2" id="reservationsBody">
    <header>
        <nav class="mainNav">
            <svg id="menuIcon" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="500px"
                height="500px">
                <path
                    d="M 0 9 L 0 11 L 50 11 L 50 9 Z M 0 24 L 0 26 L 50 26 L 50 24 Z M 0 39 L 0 41 L 50 41 L 50 39 Z" />
            </svg>

            <ul class="mainNavContent">
                <li><a class="pageLink homeLink" href="index.html">HOME</a></li>
                <hr>
                <li><a class="pageLink menuLink" href="menu.html">MENU</a></li>
                <hr>
                <li><a class="pageLink reservationsLink" href="reservations.php"
                        style="border-bottom: 2px solid #ffffff">RESERVATIONS</a></li>
                <hr>
                <li><a class="pageLink galleryLink" href="gallery.html">GALLERY</a></li>
                <hr>
                <li><a class="pageLink aboutLink" href="about.html">ABOUT</a></li>
                <hr>
                <li><a class="pageLink contactLink" href="contact.html">CONTACT</a></li>
            </ul>

            <a class="cartLink" href="cart.html"><img src="imgs/bag.png" class="cartIcon"></a>
        </nav>
    </header>

    <main class="container" id="blur">
        <div class="content">
            <div class="headingDiv">
                <h1 class="mainHeading">RESERVATIONS</h1>
            </div>

            <div class="reservationNotice mainText">
                <p>Tables for walk-ins are not always guaranteed, so reservations are strongly advised, against
                    disappointments.<br> We have a 20 minutes grace period, after which you may lose your table if you
                    have not arrived.<br> Please contact us if you will be running late. All reservations are made for a
                    maximum of 2 hours.</p>
            </div>

            <form id="reservationForm1" class="reservationSelection" onsubmit="">
                <legend id="legend" class="select">Make a Reservation</legend>
                <div class="select">
                    <img src="https://img.icons8.com/color/48/000000/calendar--v1.png"/>
                    <input class="select pick date_picker" placeholder="pick a date" id="date" type="text"  name="date" required>
                </div>
                
                
                <select class="select pick timeOptions" id="time" name="time" required>
                    <!--<option value=""disabled selected hidden>Time*</option>-->
                    

                    <!-- <option value=""disabled selected hidden>Time*</option>
                    <option value="11:00">11:00 </option>
                    <option value="11:30">11:30 </option>
                    <option value="12:00">12:00 </option>
                    <option value="12:30">12:30 </option>
                    <option value="13:00">13:00 </option>
                    <option value="13:30">13:30 </option>
                    <option value="14:00">14:00 </option>
                    <option value="14:30">14:30 </option>
                    <option value="15:00">15:00 </option>
                    <option value="15:30">15:30 </option>
                    <option value="16:00">16:00 </option>
                    <option value="16:30">16:30 </option>
                    <option value="17:00">17:00 </option>
                    <option value="17:30">17:30 </option>
                    <option value="18:00">18:00 </option>
                    <option value="18:30">18:30 </option>
                    <option value="19:00">19:00 </option>
                    <option value="19:30">19:30 </option>
                    <option value="20:00">20:00 </option>
                    <option value="20:30">20:30 </option>
                    <option value="21:00">21:00 </option> -->
                </select>
                <select class="select pick" id="guests" name="guests" required>
                    <option value=""disabled selected hidden>No. of Guests*</option>
                    <option value="1 guest">1 guest</option>
                    <option value="2 guests">2 guests</option>
                    <option value="3 guests">3 guests</option>
                    <option value="4 guests">4 guests</option>
                    <option value="5 guests">5 guests</option>
                    <option value="6 guests">6 guests</option>
                    <option value="7 guests">7 guests</option>
                    <option value="8 guests">8 guests</option>
                    <option value="9 guests">9 guests</option>
                    <option value="10 guests">10 guests</option>
                    <option value="11 guests">11 guests</option>
                    <option value="12 guests">12 guests</option>
                </select>
                <input type="submit" class="select" id="Btn" value="CHECK AVAILABILITY" >
            </form>

            <div class="reservationNotice mainText">
                <p>Contact us if you would like to make a reservation larger than a party of 12.</p>
            </div>
            
            <input type="hidden" id="today" value="<?=$mydate?>">
        </div>
    </main>
    <!-- <div id="popup" class="popUp">
        <h2>Steak and Sip Booking</h2>
        <form method="POST" action="booking.php" id="secondForm" class="confirm"  >
            <h3>1. Confirm Selection</h3>
            <div class="select2">
                <img src="https://img.icons8.com/color/48/000000/calendar--v1.png"/>
                <input type="date" class="select2" id="date2" name="date" required>
            </div>
            <select class="select2" id="time2" name="time2" required>
                <option value="11:00 A.M.">11:00 A.M.</option>
                <option value="11:30 A.M.">11:30 A.M.</option>
                <option value="12:00 P.M.">12:00 P.M.</option>
                <option value="12:30 P.M.">12:30 P.M.</option>
                <option value="01:00 P.M.">01:00 P.M.</option>
                <option value="01:30 P.M.">01:30 P.M.</option>
                <option value="02:00 P.M.">02:00 P.M.</option>
                <option value="02:30 P.M.">02:30 P.M.</option>
                <option value="03:00 P.M.">03:00 P.M.</option>
                <option value="03:30 P.M.">03:30 P.M.</option>
                <option value="04:00 P.M.">04:00 P.M.</option>
                <option value="04:30 P.M.">04:30 P.M.</option>
                <option value="05:00 P.M.">05:00 P.M.</option>
                <option value="05:30 P.M.">05:30 P.M.</option>
                <option value="06:00 P.M.">06:00 P.M.</option>
                <option value="06:30 P.M.">06:30 P.M.</option>
                <option value="07:00 P.M.">07:00 P.M.</option>
                <option value="07:30 P.M.">07:30 P.M.</option>
                <option value="08:00 P.M.">08:00 P.M.</option>
                <option value="08:30 P.M.">08:30 P.M.</option>
                <option value="09:00 P.M.">09:00 P.M.</option>
            </select>
            <select class="select2" id="guests2" name="guests2" required>
                <option value="1 guest">1 guest</option>
                <option value="2 guests">2 guests</option>
                <option value="3 guests">3 guests</option>
                <option value="4 guests">4 guests</option>
                <option value="5 guests">5 guests</option>
                <option value="6 guests">6 guests</option>
                <option value="7 guests">7 guests</option>
                <option value="8 guests">8 guests</option>
                <option value="9 guests">9 guests</option>
                <option value="10 guests">10 guests</option>
                <option value="11 guests">11 guests</option>
                <option value="12 guests">12 guests</option>
            </select>
            <input type="submit" name="submit" class="select2" id="Btn2" value="SELECT">
        </form>
        
        <form action="" id="thirdForm" class="confirm">
            <h3>2. Your Details</h3>
            <input type="text" id="" class="select2" name=" " required placeholder="First Name*" autocomplete="off">
            <input type="text" id="" class="select2" name="lastName" required placeholder="Last Name*" autocomplete="off">
            <input type="tel" id="" class="select2" name="phoneNumber" required placeholder="Phone Number*" autocomplete="off">
            <input type="text" id="" class="select2" name="email" required placeholder="E-mail Address*" autocomplete="off">
            <select name="occasion" id="" class="select2">
                <option value="" disabled selected hidden>Select an Occasion (optional)</option>
                <option value="none">None</option>
                <option value="birthday">Birthday</option>
                <option value="anniversary">Anniversary</option>
                <option value="date">Date</option>
                <option value="special occasion">Special Occasion</option>
                <option value="business meal">Business Meal</option>
            </select>
            <input type="text" id="special" class="select2" name="request" placeholder="Special Requests (optional)" autocomplete="off">
            <p>*We endeavour to meet all requests, regrettable some cannot be guaranteed.*</p>
            <input type="submit" class="select2" id="Btn2" value="CONFIRM BOOKING">
        </form>

        <button class="closePopup" onclick="closePopup()"></button>

    </div> -->

    <footer class="pageFooter">
        <div class="footerContent">
            <p>&copy;2022, STEAK AND SIP</p>
            <p>DINE-IN / TAKEOUT / DELIVERY</p>
            <P>0 (542) 123-456 . 7890 AVENUE I NICOSIA</P>
        </div>
    </footer>
    <script src="script.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script>
        $(document).ready(function()
        {
             var today = $("#today").val();
             var numToday = new Date(today)
             var day;
             
             var timeOptions = '<option value=""disabled selected hidden>Time</option>';
        
             $('.date_picker').datepicker({
              dateFormat: "yy-mm-d",
              minDate: new Date(today),
              onSelect: function(dateText)
              {
                  localStorage.setItem("datevalue", this.value);
                  $(this).change();
                  var t = dateText.split('-');
                  day = t[2];
                  
                  var pickedDate = new Date(dateText);
                  var diff = parseInt(pickedDate.getTime() - numToday.getTime());
                
                 var now = new Date();
                 var time = now.getHours();
                
                 if(Math.sign(diff) == -1)
                 {
                     time  = time + 1;
                     while(time <= 21)
                     {
                         
                       
                      timeOptions += '<option value='+time+":00"+'>'+time+ ":00"+'</option>';
                         
                         time++;
                     }
                     
                     $(".timeOptions").html(timeOptions);
                     
                 }
              
                 else
                 {
                     var timeOptions = '<option value=""disabled selected hidden>Time</option>';
                    
                     
                     var start = 11;
                     while(start <= 21)
                     {
                       
                      timeOptions += '<option value='+start+":00"+'>'+start+ ":00"+'</option>';
                         
                         start++;
                     }
                     $(".timeOptions").html(timeOptions);
                 }
                  
              }
                
                
             })
             
                
        
        });

    </script>
</body>

</html>