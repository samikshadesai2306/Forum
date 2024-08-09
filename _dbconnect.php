<?php
//script to connect to the database

$servername ="localhost";
$usernanme ="root";
$password="";
$database="iDiscuss";

$conn = mysqli_connect($servername,$usernanme,$password,$database);

if(!$conn)
{
    die('Error!'.mysqli_connect_error());
}

?>