<?php
include "config.php";
// select database
// SELECT $field FROM $table WHERE $condition ORDER BY $order_by_field  $order_by_type limit $limit;

class Query extends Database{
    public function get_safe_string($str){
        if($str != ''){
            return mysqli_real_escape_string($this->connect(), $str);
        }
    }
    public function getData($table, $field = '*', $condition_array='', $order_by_field='', $order_by_type='DESC',$limit='' ){
        $sql = "SELECT $field FROM $table ";
        
        if($condition_array != ''){
            $sql .= " WHERE  ";
            $c  = count($condition_array);
            $i = 1;
            foreach($condition_array as $key => $value){
                if($i == $c){
                    $sql .= "$key='$value' ";
                }else {
                    $sql .= "$key = '$value' AND ";
                }
            $i++;
            }
        }
        
        if($order_by_field != ''){
            $sql .= " ORDER BY $order_by_field  $order_by_type";
        }
        if($limit != ''){
            $sql .= " LIMIT $limit";
        }
        // die($sql);
        $result = $this->connect()->query($sql);
        if($result->num_rows > 0){
            $getArray = [];
        while ($row = $result->fetch_assoc()) {
            $getArray[] = $row;
        }
        return $getArray;            
        }else {
            return ;
        }
    }


// insert database
// INSERT INTO $table($field) VALUES($value)
public function insertData($table, $condition_array='' ){
        if($condition_array != ''){
            foreach($condition_array as $key => $value){
                $fieldArray[] = $key;
                $valueArray[] = $value;
            }
        $field = implode(",",$fieldArray);
        $value = implode("','",$valueArray);
        $value = "'".$value."'";
        $sql = "INSERT INTO $table($field) VALUES($value);";
        // die($sql);
        $result = $this->connect()->query($sql);
        }

    
}
// delete data fro
//DELETE FROM $table WHERE $field = $value
public function deleteData($table, $condition_array='' ){
    $sql = "DELETE FROM $table WHERE ";
        if($condition_array != ''){
            $c  = count($condition_array);
            $i = 1;
            foreach($condition_array as $key => $value){
                if($i == $c){
                    $sql .= "$key='$value' ";
                }else {
                    $sql .= "$key = '$value' AND ";
                }
            $i++;
            }
        }
    // die($sql);
    $result = $this->connect()->query($sql);
    }


// update data fro
//UPDATE $table SET $key = $value WHERE $were_field = $where_value
// Here Condition_array use for SET value.
public function updateData($table, $condition_array='',$where_field='',$where_value=''){
    $sql = "UPDATE $table SET ";

    if($condition_array != ''){
            $c  = count($condition_array);
            $i = 1;
            foreach($condition_array as $key => $value){
                if($i == $c){
                    $sql .= " $key='$value' ";
                }else {
                    $sql .= " $key = '$value' ,  ";
                }
            $i++;
            }
        }
    $sql .= " WHERE $where_field= '$where_value' ";
    // die($sql);
    $result = $this->connect()->query($sql);
    }

}
/*
select $field
*/


