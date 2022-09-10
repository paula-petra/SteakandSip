<?php

require '../api/core/init.php';
date_default_timezone_set("Africa/Lagos");


if(Input::exists())
{
    
        
        $user = new User();
        $main = new Main();

        
        $resultEmail = filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL);
        
        $book_id = $main->getId('booking');
        $user_id = $main->getId('users');
        
      

        
        $bookingid = 'RS'.(strval($book_id));
        $userid = 'user'.(strval($user_id));

            $validate = new Validation();
            $validation = $validate->check($_POST, array(
                
                'fName' => array(
                    'required'=>true
                ),
                'lName' => array(
                    'required'=>true
                ),
                'phone' => array(
                    'required'=>true
                ),
                'email' => array(
                    'required'=>true,
                    'matchesE'=>$resultEmail,
                ),
                
            ));

            if($validation->passed())
            {
                

                
                $date = date("Y-m-d H:i:s");
              
                try
                {
                    $user->create("booking", array(
                        'booking_id' => $bookingid,
                        'user_id' => $userid,
                        'date'=>Input::get('date'),
                        'time' => Input::get('time'),
                        'no_ofGuests' => Input::get('no_ofGuests'),
                        'occasion' => Input::get('occasion'),
                        'special_requests' => Input::get('special'),
                        'date_added'=>$date
                        
                    
                    ));
                    
                    $user->create("users", array(
                        'user_id' => $userid,
                        'firstName'=>Input::get('fName'),
                        'lastName' => Input::get('lName'),
                        'phoneNo' => Input::get('phone'),
                        'email' => Input::get('email'),
                        'date_added'=>$date
                        
                    
                    ));
                    // Session::put("user", Input::get('email'));
                    echo ("success");
                    
                    
                  
                }
                catch(Exception $ex)
                {
                    echo $ex;
                    # die($ex->getMessage());
                }
            }
            else
            {
                foreach ($validation->errors() as $error)
                {
                    echo $error. '<br/>';
                }
            }
        
        
    
}
?>

