<?php

$con= mysqli_connect("localhost", "root", "", "hospital");

if(!$con){
    die(mysqli_error($con));
}

?>