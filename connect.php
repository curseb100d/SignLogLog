<?php

//Setting up
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DATABASE = 'signupforms';

//connect
$con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

//if connecct successfully
if($con){
    echo "Connection connect successfully";
} else {
    die("Connection connect unsuccessfully"($con));
}
?>