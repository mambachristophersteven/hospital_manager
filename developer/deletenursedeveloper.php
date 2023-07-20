<?php

include '../connection.php'; 

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM `nurses` WHERE id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "deleted successfully";
        header("location: ./nursesdeveloper.php");
        exit;
    }
    else{
        die(mysqli_error($con));

    }
}

?>