<?php
//error_reporting(0);
session_start();
if (empty($_SESSION)){
	header('location: index.php');
}
	else{
		include "index.php";
	}
?>