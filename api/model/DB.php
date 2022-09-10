<?php
class DB
{
    private static $_instance = null;
    private $_pdo,
        $_query,
        $_error = false,
        $_results,
        $_count = 0;

    private function __construct()
    {
        try
        {
            $this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/database'), Config::get('mysql/username'), Config::get('mysql/password'));
        }
        catch(PDOException $pde)
        {
            die($pde->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$_instance))
        {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function select_multiple($table, $query=array(), $connector) 
    {
	
        //Build the SQL Query
        $sql = "SELECT * FROM `$table` ";
        
        //If there is no WHERE clause, just run the query
        if(sizeof($query)>0)
        { 
            $sql .= "WHERE ";
            
            //Loop through the fields/values
            foreach($query as $field => $value) 
            {
                $sql .= "`$field` = '" .  $value . "' $connector ";
            }
            
            
            //Remove the last connector
            $sql = substr($sql,0,strlen($sql)-(strlen($connector)+1));
        }
        
        //Run the query
        $this->_query = $this->_pdo->prepare($sql);
        if ($this->_query->execute())
        {
            $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();
        }
        else
        {
            $this->_error = true;
        }
        return $this;
       
    }


    public function query($sql, $params = array())
    {
        $this->_error = false;
        if ($this->_query = $this->_pdo->prepare($sql))
        {
            $x = 1;
            if (count($params))
            {
                foreach ($params as $param)
                {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            if ($this->_query->execute())
            {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            }
            else
            {
                $this->_error = true;
            }
        }
        return $this;
    }


    public function action($action, $table, $where = array())
    {
        if (count($where) === 3)
        {
            $operators = array('=', '<', '>', '<=', '>=');

            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];

            if (in_array($operator, $operators))
            {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                if (!$this->query($sql, array($value))->error())
                {
                    return $this;
                }
            }
        }
        return false;
    }

    public function get($table, $where)
    {
        return $this->action('SELECT *', $table, $where);
    }

    public function delete($table, $where)
    {
        return $this->action('DELETE', $table, $where);
    }

    public function results()
    {
        return $this->_results;
    }

    public function first()
    {
        return $this->results()[0];
    }

    public function insert($table, $fields = array())
    {
        $keys = array_keys($fields);
        $values = '';
        $x = 1;

        foreach ($fields as $field)
        {
            $values .= "?";
            if ($x < count($fields))
            {
                $values .= ", ";
            }
            $x++;
        }

        $sql = "INSERT INTO {$table} (`". implode('`, `', $keys) ."`) VALUES ({$values})";
        #echo $sql;
        if (!$this->query($sql, $fields)->error())
        {
            return true;
        }

        return false;
    }

    public function update($table, $id, $fields)
    {
        $set = '';
        $x = 1;

        foreach ($fields as $field => $value)
        {
            $set .= "{$field} = ?";
            if ($x < count($fields))
            {
                $set .= ',';
            }
            $x++;
        }

        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

        if (!$this->query($sql, $fields)->error())
        {
            return true;
        }
        return false;
    }

    public function error()
    {
        return $this->_error;
    }

    public function count()
    {
        return $this->_count;
    }
    // checking for unique emails during update
    public function emailCheckUpdate($table, $col1, $value1, $id)
    {
        
        //Build the SQL Query
        $sql = "SELECT * FROM `$table` WHERE `$col1` = '$value1' AND id != '$id' ";
        
        
        //Run the query
        $this->_query = $this->_pdo->prepare($sql);
        if ($this->_query->execute())
        {
            $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();
        }
        else
        {
            $this->_error = true;
        }
        return $this;
    }
}