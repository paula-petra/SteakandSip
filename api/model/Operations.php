<?php

include_once "DB.php";

class Operations extends DB
{

    public function __construct()
	{
		parent::__construct();
	}
    
    function add($tablename, $fieldss = array())
    {
        $keys = array_keys($fields);
        $values = '';
        $x = 1;

        foreach ($fields as $field) {
            $values .= "'".$field."'";
            if($x < count($fields)){
                $values .= ',';
            }
            $x++;
        }
        
        # PERFORM INSERTION
        $query = "INSERT INTO ". $tablename ." (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
        echo $query;
        if ($result = $this->_CONNECTION->query($query)) {
            return true;
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function update($tablename, $fields, $column, $id)
    {
        $num_fields = count($fields);
        $count = 0;
        $set = '';
        foreach ($fields as $key => $field) {
            $set .= $key . " = '". $field."', ";
            if(++$count == $num_fields){
                $set = substr($set, 0, -2);
                $query = "UPDATE {$tablename} SET {$set} WHERE {$column} = {$id}";
                if ($result = $this->_CONNECTION->query($query)) {
                    return true;
                }
                else{
                    echo $this->_CONNECTION->error;
                }
            }
        }
    }

    function delete($table, $column, $id)
    {
        $query = "DELETE FROM {$table} WHERE {$column} = {$id}";
        if ($result = $this->_CONNECTION->query($query)) {
            return true;
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function retrieve_all($table)
    {
        $query = "SELECT * FROM $table";
        if ($result = $this->_CONNECTION->query($query)) {
            $arrvar = array();
            foreach ($result as $key => $res) {
                array_push($arrvar, $res);
            }
            return json_encode($arrvar);
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function retrieve_limit($table, $limit)
    {
        $query = "SELECT * FROM $table LIMIT {$limit}";
        if ($result = $this->_CONNECTION->query($query)) {
            $arrvar = array();
            foreach ($result as $key => $res) {
                array_push($arrvar, $res);
            }
            return json_encode($arrvar);
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function retrieve_limit_rand($table, $limit)
    {
        $query = "SELECT * FROM $table ORDER BY rand() LIMIT {$limit}";
        if ($result = $this->_CONNECTION->query($query)) {
            $arrvar = array();
            foreach ($result as $key => $res) {
                array_push($arrvar, $res);
            }
            return json_encode($arrvar);
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function retrieve_limit1($table, $limit)
    {
        $query = "SELECT * FROM $table ORDER BY id DESC LIMIT {$limit}";
        if ($result = $this->_CONNECTION->query($query)) {
            $arrvar = array();
            foreach ($result as $key => $res) {
                array_push($arrvar, $res);
            }
            return json_encode($arrvar);
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function retrieve_limit_main($table, $column, $param, $limit)
    {
        $query = "SELECT * FROM $table WHERE {$column} = '$param' LIMIT $limit";
        if ($result = $this->_CONNECTION->query($query)) {
            $arrvar = array();
            foreach ($result as $key => $res) {
                array_push($arrvar, $res);
            }
            return json_encode($arrvar);
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function retrieve_row($table, $column, $id)
    {
        $query = "SELECT * FROM $table WHERE {$column} = $id";
        if ($result = $this->_CONNECTION->query($query)) {
            $arrvar = array();
            foreach ($result as $key => $res) {
                array_push($arrvar, $res);
            }
            return json_encode($arrvar);
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function retrieve_row1($table, $column, $id)
    {
        $query = "SELECT * FROM $table WHERE {$column} = '$id'";
        if ($result = $this->_CONNECTION->query($query)) {
            $arrvar = array();
            foreach ($result as $key => $res) {
                array_push($arrvar, $res);
            }
            return json_encode($arrvar);
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function search_dorb($table, $data1, $data2, $data3)
    {
        $query = "SELECT * FROM $table WHERE region LIKE '%$data1%' or category LIKE '%$data2%' or title LIKE '%$data3%' or category LIKE '%$data3%' or username LIKE '%$data3%' or price LIKE '%$data3%' ORDER BY id DESC";
        if ($result = $this->_CONNECTION->query($query)) {
            $arrvar = array();
            foreach ($result as $key => $res) {
                array_push($arrvar, $res);
            }
            return json_encode($arrvar);
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function search_dorb_basic($table, $data1)
    {
        $query = "SELECT * FROM $table WHERE region LIKE '%$data1%' or title LIKE '%$data1%' or category LIKE '%$data1%' ORDER BY id DESC";
        if ($result = $this->_CONNECTION->query($query)) {
            $arrvar = array();
            foreach ($result as $key => $res) {
                array_push($arrvar, $res);
            }
            return json_encode($arrvar);
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function login($table, $column1, $param1, $column2, $param2)
    {
        $query = "SELECT * FROM $table WHERE {$column1} = '$param1' AND {$column2} = '$param2'";
        // echo $query;
        if ($result = $this->_CONNECTION->query($query)) {
            $arrvar = array();
            foreach ($result as $key => $res) {
                array_push($arrvar, $res);
            }
            return json_encode($arrvar);
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function users($table, $column3, $param1, $limit = 25)
    {
        $query = "SELECT * FROM $table WHERE {$column3} = '$param1' LIMIT {$limit}";
        // echo $query;
        if ($result = $this->_CONNECTION->query($query)) {
            $arrvar = array();
            foreach ($result as $key => $res) {
                array_push($arrvar, $res);
            }
            return json_encode($arrvar);
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function users_sort($table, $column3, $param1, $order, $position, $limit = 25){
        $query = "SELECT * FROM $table WHERE {$column3} = '$param1' ORDER BY {$order} {$position} LIMIT {$limit}";
        // echo $query;
        if ($result = $this->_CONNECTION->query($query)) {
            $arrvar = array();
            foreach ($result as $key => $res) {
                array_push($arrvar, $res);
            }
            return json_encode($arrvar);
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function dual($table, $column1, $param1)
    {
        $query = "SELECT * FROM $table WHERE {$column1} = '$param1'";
        // echo $query;
        if ($result = $this->_CONNECTION->query($query)) {
            $arrvar = array();
            foreach ($result as $key => $res) {
                array_push($arrvar, $res);
            }
            return json_encode($arrvar);
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function dual6($table, $column1, $param1)
    {
        $query = "SELECT * FROM $table WHERE {$column1} = '$param1'";
        // echo $query;
        if ($result = $this->_CONNECTION->query($query)) {
            $arrvar = array();
            foreach ($result as $key => $res) {
                array_push($arrvar, $res);
            }
            return $arrvar;
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }
    
    function dual1($table, $column1, $param1)
    {
        $query = "SELECT SUM(amount) FROM $table WHERE {$column1} = '$param1'";
        // echo $query;
        if ($result = $this->_CONNECTION->query($query)) {
            $arrvar = array();
            foreach ($result as $key => $res) {
                array_push($arrvar, $res);
            }
            return json_encode($arrvar);
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function retrieve_row3($table, $column1, $param1, $column2, $param2, $column3, $param3)
    {
        $query = "SELECT * FROM $table WHERE {$column1} = '$param1' AND {$column2} = '$param2' AND {$column3} = '$param3'";
        // echo $query;
        if ($result = $this->_CONNECTION->query($query)) {
            $arrvar = array();
            foreach ($result as $key => $res) {
                array_push($arrvar, $res);
            }
            return json_encode($arrvar);
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

    function delete_row($table, $column, $param){
        $query = "DELETE FROM $table WHERE id = $param";
        if ($result = $this->_CONNECTION->query($query)) {
            return true;
        }
        else{
            echo $this->_CONNECTION->error;
        }
    }

}
