<?php

class Main
{
    private $_db, $_results, $_query, $_error = false, $_count = 0;
    
    public function __construct()
    {
        
        try
        {
            $this->_db = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/database'), Config::get('mysql/username'), Config::get('mysql/password'));
        }
        catch(PDOException $pde)
        {
            die($pde->getMessage());
        }

    }

  

    
    
    public function getFile($table, $row, $value)
    {
        $sql = "SELECT * FROM `$table` WHERE $row = '$value'";
        //Run the query
        $this->_query = $this->_db->prepare($sql);
        
        
        
        if($this->_query->execute())
        {
            $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();

            return json_encode($this->_results);
            
        }
    }
    public function getFile3($table, $row, $value, $value2)
    {
        $sql = "SELECT * FROM `$table` WHERE $row = '$value' || $row = '$value2'";
        //Run the query
        $this->_query = $this->_db->prepare($sql);
        
        
        
        if($this->_query->execute())
        {
            $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();

            return json_encode($this->_results);
            
        }
    }
    public function getFile2($table)
    {
        $sql = "SELECT * FROM `$table`";
        //Run the query
        $this->_query = $this->_db->prepare($sql);
        
        
        
        if($this->_query->execute())
        {
            $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();

            return json_encode($this->_results);
            
        }
    }
    
    public function getCount($table)
    {
        $sql = "SELECT * FROM `$table`";
        //Run the query
        $this->_query = $this->_db->prepare($sql);
        
        
        
        if($this->_query->execute())
        {
            $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();

            return $this->_count;
            
        }
    }
    public function getDateDiff($date1, $date2)
    {
        $origin = new DateTime($date1);
        $target = new DateTime($date2);
        
        $res = ($date1 > $date2);
        if($res == 1){
            return 1;
        }else{
            return 0;
        }
    
    }
    
    public function getDateDiff2($date1, $date2)
    {
      
        
        $origin = new DateTime($date1);
        $target = new DateTime($date2);
        
        
        $interval = $origin->diff($target);
        return $interval->format('%a');
       
        
    }
    
    public function getDateDiff3($date1, $date2)
    {
       
        $res = ($date2 > $date1);
        if($res == 1){
            return 1;
        }else{
            return 0;
        }
        
        // return $res;
  
        
    }
    
   
    public function getData($sql)
    {
        
        //Run the query
        $this->_query = $this->_db->prepare($sql);
        
        
        
        if($this->_query->execute())
        {
            $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();

            return json_encode($this->_results);
            
        }
    }
    public function execute($query) 
	{
		$result = $this->_db->query($query);
		
		if($result == false)
		{
			echo 'Error: cannot execute the command';
			
			return false;
		}
		else
		{
			
			
			
			return true;
		}		
	}
	public function escape_string($value)
	{
		return mysqli_real_escape_string($this->_db, $value);
	}
    
    public function removeSpecialChar($str)
    {
      
        // Using str_replace() function 
        // to replace the word 
        $res = str_replace(array( '\'', '"',
        ',' , ';', '<', '>', 'Â' ), ' ', $str);
          
            // Returning the result 
            return $res;
    }
    
    public function getId($table)
    {

        $sql = "SELECT * FROM `$table` ORDER BY id DESC LIMIT 1";
        $this->_query = $this->_db->prepare($sql);
        $result;
        $id;
       
        
        if($this->_query->execute())
        {
            $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();
            $result = json_encode($this->_results); 
           
        }
        $result = json_decode($result,true);
        if(sizeOf($result) > 0)
        {
            foreach($result as $k => $val)
            {
                if(intval($val['id']) > 0)
                {
                  $id = intval($val['id']) + 1;
                  break;
    
                }
            }
        }else{
            $id = 1;
        }
        
        return $id;
    }
    
 


    

    

}

?>