<?php

session_start();

require_once 'connection.php';



if(!$_SESSION['user_name']){
	header('location:login.php');
	//header('location:https://localhost/request/dashboard/login.php'); 
}

?>