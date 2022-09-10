<?php

require '../api/core/init.php';
date_default_timezone_set("Africa/Lagos");


if(Input::exists())
{
    
        
        $user = new User();

        $resultEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $fields = array("email"=>Input::get('email'));
        
        $result = $user->select_multiple("newsletter", $fields, NULL);
        
        
        
      
        
        if($result->count() == 0)
        {

        
            $validate = new Validation();
            $validation = $validate->check($_POST, array(
                
                'email' => array(
                    'required'=>true,
                    'matchesE'=>$resultEmail,
                    'unique'=>'newsletter'
                ),
             
                'name' => array(
                    'required'=>true
                ),
            ));

            if($validation->passed())
            {
                

                
               
                $table = "newsletter";
                $date = date("Y-m-d H:i:s");
              
                try
                {
                    $user->create($table, array(
                        'fullName' => Input::get('name'),
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
        else{
             echo ("Email already exist");
        }
        
    
}
?>

