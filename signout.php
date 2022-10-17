<?php
session_start();
if(!isset($_SESSION['logged'])) header('location: index.php');
unset($_SESSION['logged']);
session_destroy();
// redirect the user to the home page.
header("index.php");	
