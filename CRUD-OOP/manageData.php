<?php
include "task.php";
$obj= new Query();

$id = '';
$name = '';
$email = '';
$mobile = '';

// for update data 
if(isset($_GET['id']) && $_GET['id'] != ''){
    $id =$obj->get_safe_string($_GET['id']);
    $condition_array =array('id'=>$id);
    $result = $obj->getData('data', '*', $condition_array); // mysqli_query
    $name = $result['0']['name'];
    $email = $result['0']['email'];
    $mobile = $result['0']['mobile'];
}

// for add data
if(isset($_POST['submit'])){
    $name = $obj->get_safe_string($_POST['name']);
    $email = $obj->get_safe_string($_POST['email']);
    $mobile = $obj->get_safe_string($_POST['mobile']);
    $condition_array = array('name'=>$name, 'email'=>$email, 'mobile'=>$mobile);
    // $condition_array when insert user for WHERE / and when UPDATE use for SET
    if($id == ''){
    $obj->insertData('data', $condition_array); // $condition_array for WHERE
    }else {
    $obj->updateData('data', $condition_array, 'id', $id); // $condition_array for SET
    }
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="css/style.css">

</head>
<body>
<!-- Menu Bar -->
 <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="p-3 my-3 bg-dark text-white">
                <h1>OOP PHP CRUD Operation</h1>
                <p></p>
            </div>
            <div class="p-3 my-3 bg-dark text-white " id="button-body">
             <div class="button"><a href="index.php">Home</a></div>
            </div>
            
                <div class="col-sm-6 mx-auto getform">
                    <h3>Add Your Data</h3>
                      
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="name" class="form-control " id="validationTextarea" placeholder="Enter name" name="name" value="<?php echo $name; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="validationTextarea" placeholder="Enter email" name="email" value="<?php echo $email; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile:</label>
                            <input type="mobile" class="form-control" id="validationTextarea" placeholder="Enter mobile number" name="mobile" value="<?php echo $mobile; ?>" required>
                        </div>
                       
                        
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                
                </div>
            
            
            </div>
        </div>
</div>
        
<!-- /Menu Bar -->

<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
    </div>
</div>