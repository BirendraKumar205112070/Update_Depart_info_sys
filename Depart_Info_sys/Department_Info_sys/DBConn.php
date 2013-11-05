<?php
//session_start();
$host="localhost";
$username="root";
$password="";
$dbname="nitt";
$conn=mysql_connect($host,$username,$password) or die("Cant connect to mysql");
mysql_select_db($dbname) or die("Cant select the database");
$_SESSION['conn']=$conn;
//created new databse
?>
