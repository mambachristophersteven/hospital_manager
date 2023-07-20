<?php

include '../connection.php'; 

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM `doctors` WHERE id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "deleted successfully";
        header("location: ./doctorsdeveloper.php");
        exit;
    }
    else{
        die(mysqli_error($con));

    }
}

?>