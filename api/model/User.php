<?php


class User
{
    
    private $_db,
            $_data,
            $_sessionName,
            $_cookieName,
            $_isLoggedIn;

    public function __construct($user = null)
    {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');

        if (!$user)
        {
            if (Session::exists($this->_sessionName))
            {
                $user = Session::get($this->_sessionName);

                if ($this->find($user))
                {
                    $this->_isLoggedIn = true;
                }
                else
                {
                    // process logout
                }
            }
        }
        else
        {
            $this->find($user);
        }
    }

    public function update($table = null, $id = null, $fields = array())
    {

        if (!$id && $this->isLoggedIn())
        {
            $id = $this->data()->id;
        }

        if (!$this->_db->update($table, $id, $fields))
        {
            throw new Exception('Error Encountered while Updating');
        }
    }

    

    public function create($table, $fields = array())
    {
        if (!$this->_db->insert($table, $fields))
        {
            throw new Exception('Error inserting into database; check for duplicate Plot IDs');
        }
    }

    public function select_multiple($table = null, $fields = array(), $connector)
    {
        
           $data = $this->_db->select_multiple($table, $fields, $connector);
           return $data;
        
    }
    public function select_multiple2($table = null, $fields = array(), $connector)
    {
        
        $data = $this->_db->select_multiple($table, $fields, $connector);
        if($data->count())
        {
            $this->_data = $data->first();
            return $this->_data;
        }
        else
        {
            return false;
        }
        
    }
    public function emailCheckUpdate($table, $col1, $value1, $id)
    {
        $data = $this->_db->emailCheckUpdate($table, $col1, $value1, $id);
        return $data;
    }
    public function find($user = null)
    {
        if ($user)
        {
            $field = (is_numeric($user)) ? 'id' : 'email';
            $data = $this->_db->get('admin', array($field, '=', $user));

            if ($data->count())
            {
                $this->_data = $data->first();
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function login($email = null, $password = null, $remember = false)
    {
        if(!$email && !$password && $this->exists())
        {
            # Log User In
            Session::put("user", $this->data()->names);
        } 
        else
        {
            $user = $this->find($email);
            if($user)
            {
               
                
                if($password == $this->data()->password && $this->data()->status == "active")
                {
                    
                     
                        Session::put("user", $this->data()->email);

                        // if($remember)
                        // {
                        //     $hash = Hash::unique();
                        //     $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));
    
                        //     if (!$hashCheck->count())
                        //     {
                        //         $this->_db->insert('users_session', array(
                        //             'user_id' => $this->data()->id,
                        //             'hash' => $hash
                        //         ));
                        //     }
                        //     else
                        //     {
                        //         $hash = $hashCheck->first()->hash;
                        //     }
    
                        //     Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
    
                        // }
                        return true;
                       
                    
                    
                }
                else
                {
                    return false;
                }
            }
            
        }

        return false;
    }

    // public function hasPermission($key)
    // {
    //     $group = $this->_db->get('grouped', array('id', '=', $this->data()->grouped));
        
    //     if ($group->count())
    //     {
    //         $permissions = json_decode($group->first()->permissions, true);
            
    //         if ($permissions[$key] == true)
    //         {
    //             return true;
    //         }
    //     }
    //     return false;
    // }

    public function exists()
    {
        return (!empty($this->_data)) ? true : false;
    }

    public function logout()
    {
        $this->_db->delete('users_session', array('user_id', '=', $this->data()->id));

        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }

    public function data()
    {
        return $this->_data;
    }

    public function isLoggedIn()
    {
        return $this->_isLoggedIn;
    }
    public function delete($table, $params = array())
    {
        if($this->_db->delete($table, $params))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    

    
}