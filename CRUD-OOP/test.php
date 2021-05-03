<?php
include "task.php";
$data= new Query();
// $condition_array = array('id'=>1 );
// $select = $data->getData('data','*',$condition_array,'','', 2);
// echo "<pre>";
// print_r($select);

// // for insert data
// $condition_array = array('name'=>'Saif Ali Khan', 'email'=>'saifali@gamil.com', 'mobile'=>7337282 );
// $insert = $data->insertData('data', $condition_array);
// echo "<pre>";
// print_r($insert);

// for delete data
// $condition_array = array('id'=>4 );
// $delete = $data->deleteData('data', $condition_array);


// for Update data

$condition_array = array('mobile'=>5555555, 'email'=>'depika@gmail.com', 'name'=>'Dipika Padagun' );
$update = $data->updateData('data', $condition_array, 'id', '5');
