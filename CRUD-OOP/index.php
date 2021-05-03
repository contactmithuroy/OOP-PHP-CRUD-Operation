<?php
include "task.php";
$obj= new Query();

if(isset($_GET['type']) && $_GET['type'] == 'delete'){
    $id = $obj->get_safe_string($_GET['id']);

    $condition_array = array('id'=>$id );
    $delete = $obj->deleteData('data', $condition_array);

}
$result = $obj->getData('data');// fetch all data so we have not no condition_array
// print_r($result);
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
                <div class="button"><a href="manageData.php">Add Data</a></div>
            </div>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th>Id </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($result[0])){
                                // $result fetch array
                            $id = 1 ;
                            foreach($result as $row){

                        ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['mobile'];?></td>
                        <td class='edit'><a href='manageData.php?id=<?php echo $row['id'];?>'><img src="images/edit.png" alt=""></a></td>
                        <td><a href='?type=delete&id=<?php echo $row['id'];?>'><img src="images/delete.png" alt=""></a></td>
                    </tr>
                    <?php
                        $id++;
                            }
                        }else {
                    ?>
                    <td colspan="6" align="center">No Records Found!</td>
                    <?php } ?>
                    </tbody>
                </table>     
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