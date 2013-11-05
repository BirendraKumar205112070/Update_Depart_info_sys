<?php
session_start();
if(session_destroy())
{
print'<center><font color="blue"><h2>you have logged out successfully</h2></font></center>';
print '<center><font color="red"><h3><a href="index.php">back to home page</a></h3></font></center>';

//print '<a href="JavaScript:window.close()">Close the Window</a>';
}
//header("location:index.php");
?>

<html>
<head>
<title>LogedOut</title></head>
<body>
<center> 


</center>
</html>