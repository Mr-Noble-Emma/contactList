<?php

$con = mysqli_connect("localhost","root","","contacts");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}

?>