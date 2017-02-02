<?php
define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","kudumbashree");		
/*
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="kudumbashree";
		*/
$connection=mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
//test if connection success
if(mysqli_connect_errno())
	{
		die("database connection failed:" . mysqli_connect_error() . " (" . mysqli_connect_errno() . 
")");
	}
?>