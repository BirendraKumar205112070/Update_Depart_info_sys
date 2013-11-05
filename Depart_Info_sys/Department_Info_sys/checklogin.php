<?php
ob_start();
session_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="nitt"; // Database name
$tbl_name="users"; // Table name
$count=0;
// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DataBase");

// Define $myusername and $mypassword
//must be variable name input_name in login.php
$myusername=$_POST['name'];
$mypassword=$_POST['pass1'];

// To protect MySQL injection (more detail about MySQL injection)
//$myusername = stripslashes($myusername);
//$mypassword = stripslashes($mypassword);
//$myusername = mysql_real_escape_string($myusername);
//$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE uname='$myusername' and passward='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
while($row = mysql_fetch_array($result)){
         $_SESSION['uid'] = $row['uid'];
         $_SESSION['user'] = $row['uname'];
        $_SESSION['did'] = $row['did'];

}
//session_register("myusername");
//session_register("mypassword");
$_seesion['myname']=$_POST['name'];
//$_SESSION('ok')=true;
//$_SESSION('user')=$myusername;


header("location:Login_Success.php");
}
else {
include 'login.php';
    echo '<font color="red" size="5"><center>Sorry!!!!!You have enter Wrong Username or Password</center></font>';

}
?>


