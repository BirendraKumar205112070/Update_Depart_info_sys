


<?php
// Check if session is not registered , redirect back to main page.
// Put this code in first line of web page.
session_start();
//if(!session_is_registered(name)){
    header("location:selectlist.php");

//}
//else
    //include 'login.php';
?>

