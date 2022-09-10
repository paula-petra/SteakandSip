<?php

require '../api/core/init.php';
date_default_timezone_set("Africa/Lagos");


if(Input::exists())
{
    
        
        $user = new User();

        $resultEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $validate = new Validation();
            $validation = $validate->check($_POST, array(
                
                'name' => array(
                    'required'=>true
                ),
                 'email' => array(
                    'required'=>true,
                    'matchesE'=>$resultEmail            
                ),
                'subject' => array(
                    'required'=>true
                ),
                'msg' => array(
                    'required'=>true
                ),
             
                
            ));

            if($validation->passed())
            {
                

                
               
                $table = "contactform";
                $date = date("Y-m-d H:i:s");
              
                try
                {
                    $user->create($table, array(
                        'name' => Input::get('name'),
                        'email' => Input::get('email'),
                        'subject' => Input::get('subject'),
                        'message' => Input::get('msg'),
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

