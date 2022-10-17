<?php
session_start();
if(!isset($_SESSION['logged'])) header('location: public.php');
unset($_SESSION['logged']);
session_destroy();
// redirect the user to the public page.
header("public.php");	
