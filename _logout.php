<?php
session_start();
echo 'logging out please....Wait.';

session_destroy();
header("Location:index.php");

?>