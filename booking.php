<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - Steak and Sip - Steakhouse and Winery Restaurant</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>

<body class="bookingBody">
    <div id="" class="container">
        <!-- <h2>Steak and Sip Booking</h2> -->
        <form method="" action="" id="secondForm" class="confirm"  >
            <h3>CONFIRM SELECTION</h3>
            <div class="select2 date2">
                <img src="https://img.icons8.com/color/48/000000/calendar--v1.png"/>
                <input type="date" min="2022-08-29" class="select2 date2" id="date2" name="date" required >
            </div>
            <select class="select2 time2" id="time2" name="time2" required>
               
                <?php
                    $ser_dur = 30;
                    
                    $now = date('Y-m-d H:m:s');
                    $now2 = '2022-08-31 12:16:00';
                    $hr = date('H',strtotime($now2));
                    echo $hr;
                    //$hr = $now -> format('H');//date_parse($now)['hour'];
                    $start = ((int)$hr+1)*60; //660;
                    
                    while ($start <= 1260) {
                
                    $new_hour = floor($start/60);
                    $new_minute = $start%60;
                    if ($new_minute === 0) { $new_minute = "00 "; } else { $new_minute = $new_minute." "; }
                    $unite_hm = $new_hour . ":" . $new_minute;
                    
                    ?>
                    <option value="<?php echo $unite_hm; ?>" ><?php echo $unite_hm; ?></option>
                    <?php
                    $start += $ser_dur;
                    }
                ?>

            </select>
            <select class="select2 guests2" id="guests2" name="guests2" required>
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

            <div class="btn-box">
                <button type="button" class="" id="next">NEXT</button>
            </div>
        </form>
        
        <form action="bookingtable.php" id="thirdForm" class="confirm">
            <h3>Your Details</h3>
            <input type="text" id="fName" class="select2" name="firstName" required placeholder="First Name*" autocomplete="off">
            <input type="text" id="lName" class="select2" name="lastName" required placeholder="Last Name*" autocomplete="off">
            <input type="tel" id="mobile" class="select2" name="phoneNumber" required placeholder="Phone Number*" autocomplete="off">
            <input type="text" id="eMail" class="select2" name="email" required placeholder="E-mail Address*" autocomplete="off">
            <select name="occasion" id="occasion" class="select2">
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
            
            <div class="btn-box">
                <button type="button" class="" id="back">BACK</button>
                <button type="submit" class="" id="confirmBtn" name="confirmBtn">CONFIRM</button>
            </div>
            <input type="hidden" id="time3" name="time3" value="<?php echo'<script>localStorage.getItem(\"timevalue\") </script>' ?>">
            <input type="hidden" id="date3" name="date3" value="<?php echo'<script>localStorage.getItem(\"timevalue\") </script>' ?>">
            <input type="hidden" id="guests3" name="guests3" value="<?php echo'<script>localStorage.getItem(\"timevalue\") </script>' ?>">
        </form>

        <div class="step-row">
            <div id="progress"></div>
            <div class="step-col"><small>1</small></div>
            <div class="step-col"><small>2</small></div>
        </div>


    </div>

    <footer class="pageFooter">
        <div class="footerContent">
            <p>&copy;2022, STEAK AND SIP</p>
            <p>DINE-IN / TAKEOUT / DELIVERY</p>
            <P>0 (542) 123-456 . 7890 AVENUE I NICOSIA</P>
        </div>
    </footer>

    <!-- <script src="script.js"></> -->
    <script>
        console.log('timevalues', localStorage.getItem('timevalue'));
        document.getElementById('time2').value = localStorage.getItem('timevalue');
        document.getElementById('guests2').value = localStorage.getItem('guests');
        document.getElementById('date2').value = localStorage.getItem('datevalue');

        var date = new Date();
        var tdate = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getUTCFullYear();
        console.log("Year is: ",year);

        if(tdate < 10){
            date = '0' + tdate;
        }

        if(month < 10){
            month = '0' + month;
        }

        // var year = date.getUTCFullYear();
        var minDate = year + '-' + month + '-' + tdate;
        document.getElementById('date2').setAttribute('min', minDate);

        console.log(minDate);

        var form1 = document.getElementById('secondForm');
        var form2 = document.getElementById('thirdForm');

        var next = document.getElementById('next');
        var back = document.getElementById('back');
        var confirm = document.getElementById('confirmBtn');

        var progress = document.getElementById('progress')

        next.onclick = function(){
            console.log('next');

            form1.style.left = '-960px'
            form2.style.left = '5%';
            progress.style.width = '100%'

            let date2 = document.getElementById('date2');
            let time2 = document.getElementById('time2');
            let guests2 = document.getElementById('guests2');

            date2.addEventListener("change", stateHandle);
            time2.addEventListener("change", stateHandle);
            guests2.addEventListener("change", stateHandle);

            //form validation
            function stateHandle() {
                if(date2.value === ""|| time2.value === ""|| guests2.value === "") {
                    next.disabled = true;
                } else {
                    next.disabled = false;
                }
            }
        }  

        back.onclick = function(){
            console.log('back');

            form1.style.left = '5%'
            form2.style.left = '960px';
            progress.style.width = '50%';
        }  

        confirm.onclick = function(){
            console.log('confirm');

            let fName = document.querySelector('input[id="fName"]');
            let lName = document.querySelector('input[id="lName"]');
            let mobile = document.querySelector('input[id="mobile"]');
            let eMail = document.querySelector('input[id="eMail"]');
            let occasion = document.querySelector('select[id="occasion"]');
            let request = document.querySelector('input[id="special"]');

            confirm.disabled = true;

            fName.addEventListener("change", stateHandle);
            lName.addEventListener("change", stateHandle);
            mobile.addEventListener("change", stateHandle);
            eMail.addEventListener("change", stateHandle);

            // let fName = fName.value;
            // let fName = fName.value;
            // let fName = fName.value;
            // let fName = fName.value;
            // let fName = fName.value;
            // let fName = fName.value;
            

            //form validation
            function stateHandle() {
                if(fName.value === ""|| lName.value === ""|| mobile.value === "" || eMail.value ==="") {
                    confirm.disabled = true;
                } else {
                    confirm.disabled = false;
                }
            }

            location.replace('bookingtable.php?firstName=fName');
        }

        var selectedDate = document.querySelector('input[id="date2"]').addEventListener('change', function(){
            console.log('datevalue', this.value);
            localStorage.setItem("datevalue", this.value);
        });

        var selectedTime = document.getElementById('time2');
        selectedTime.addEventListener('change', function handleChange(e){
            localStorage.setItem("timevalue", e.target.value);
            console.log(localStorage.getItem('timevalue'));
        });

        var guestNumber = document.getElementById('guests2');
        guestNumber.addEventListener('change', function handleChange(e){
            localStorage.setItem("guests2", e.target.value);
            console.log(e.target.value);
        });

        function setFormValues(){
            console.log('timevalues', localStorage.getItem('timevalue'));
            document.getElementById('time3').value = localStorage.getItem('timevalue');
            // console.log(document.getElementById('time3').value);
            document.getElementById('guests3').value = localStorage.getItem('guests');
            // console.log(document.getElementById('guests3').value);
            document.getElementById('date3').value = localStorage.getItem('datevalue');
            // console.log(document.getElementById('date3').value);
        }

        // $('confirmBtn').submit(function(e) {
        //     e.preventDefault();

        // });

        // $("#thirdForm").on('submit', function(e) {
        // e.preventDefault();

        // var firstName = $("#fName").val();
        // var lastName = $("#lName").val();
        // var phoneNumber = $("#mobile").val();
        // var email = $("#eMail").val();
        // var occasion = $("#occasion").val();
        // var specialRequests = $("#special").val();
        // var datee = $("#date3").val();
        // var timee = $("#time3").val();
        // var guestss = $("#guests3").val();

        // var post = {
        // // "action" : "send_new_sms",
        // "firstName" : firstName,
        // "lastName" : lastName,
        // "phoneNumber" : phoneNumber,
        // "email" : email,
        // "occasion" : occasion,
        // "specialRequests" : specialRequests,
        // "date" : datee,
        // "time" : timee,
        // "guests" : guestss,
        // };

        // $.ajax({
        // url: "bookingtable.php",
        // type: "POST",
        // data:  post,
        // dataType: "JSON",

        // success: function(data) {
        //     console.log(data);
        // }, error: function(e) {
        // console.log('[Error Verifying]::', e);
        // }          
        // });
        // });
    </script>
</body>
</html>