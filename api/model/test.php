function mysql_select($table, $query=array(), $connector = "AND") {
	
	//Build the SQL Query
	$sql = "SELECT * FROM `$table` ";
	
	//If there is no WHERE clause, just run the query
	if (sizeof($query)>0)
  { 
		$sql .= "WHERE ";
		
		//Loop through the fields/values
		foreach ($query as $field => $value) $sql .= "`$field` = '" .  mysql_real_escape_string($value) . "' $connector ";
		
		//Remove the last connector
		$sql = substr($sql,0,strlen($sql)-(strlen($connector)+1));
	}
	
	//Run the query
	$result = mysql_query($sql);
	
	//Output an errors if applicable
	if (mysql_error()) echo "<p>" . mysql_error() . ": $sql</p>";
	
	//Return the result (as a MySQL resource)
	return $result;
}

function mysql_exists($table,$query=array(),$connector="AND")
{
	$result = mysql_select($table,$query,$connector);
	if (mysql_num_rows($result)!=0) return true;
	return false;
}

public function fetch_multi_row($table,$col,$where)
    {
        $data = array_values( $where );
        //grab keys
        $cols=array_keys($where);
        $colum=implode(', ', $col);
        foreach ($cols as $key) {
          $keys=$key."=?";
          $mark[]=$keys;
        }
        $jum=count($where);
        if ($jum>1) {
            $im=implode('? and  ', $mark);
             $sel = $this->pdo->prepare("SELECT $colum from $table WHERE $im");
        } else {
          $im=implode('', $mark);
             $sel = $this->pdo->prepare("SELECT $colum from $table WHERE $im");
        }
        $sel->execute( $data );
        $sel->setFetchMode( PDO::FETCH_OBJ );
        return  $sel;
    }
