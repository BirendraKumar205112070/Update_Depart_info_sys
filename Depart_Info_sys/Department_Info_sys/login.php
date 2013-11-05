<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<style type="text/css">

.nave{ margin: 20px;
padding:4px;
border:3px solid #Cff;;
border-bottom-left-radius:4px;
border-bottom-right-radius:4px;
margin-bottom: 2em;
width:410px;
height:300px;
box-shadow: 2px 2px 2px 4px #ccc;
-moz-box-shadow: 2px 2px 2px 4px #ccc;
-webkit-box-shadow: 2px 2px 2px 4px #ccc;
 
}
input[type=submit] {
    float: right;
    margin-right: 20px;
    margin-top: 20px;
    width: 80px;
    height: 30px;
font-size: 14px;
    font-weight: bold;
    color: #fff;
    background-color: #acd6ef; /*IE fallback*/
    background-image: -webkit-gradient(linear, left top, left bottom, from(#acd6ef), to(#6ec2e8));
    background-image: -moz-linear-gradient(top left 90deg, #acd6ef 0%, #6ec2e8 100%);
    background-image: linear-gradient(top left 90deg, #acd6ef 0%, #6ec2e8 100%);
    border-radius: 30px;
    border: 1px solid #66add6;
    box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);
    cursor: pointer;
}
input[type=submit]:hover {
    background-image: -webkit-gradient(linear, left top, left bottom, from(#b6e2ff), to(#6ec2e8));
    background-image: -moz-linear-gradient(top left 90deg, #b6e2ff 0%, #6ec2e8 100%);
    background-image: linear-gradient(top left 90deg, #b6e2ff 0%, #6ec2e8 100%);
}
input[type=submit]:active {
    background-image: -webkit-gradient(linear, left top, left bottom, from(#6ec2e8), to(#b6e2ff));
    background-image: -moz-linear-gradient(top left 90deg, #6ec2e8 0%, #b6e2ff 100%);
    background-image: linear-gradient(top left 90deg, #6ec2e8 0%, #b6e2ff 100%);
}
</style>
</head>
<center>
<body bgcolor="white" background="bgimg.gif" >
<table  bgcolor="#00CCCC" width="100%" height="10">
<thead>
<tr>
<td colspan="4">
<img src="images.jpg" align="left" >
<font size="17" color="red"><center>National Institute Of Technology Trichy-620015</center>
</font>
</td>
</tr>
</thead>
</table>
<br/><br/><br/><br/><br/>
<font size="3" color="red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    *</font><b>Mandatary Field</b>
<form class="nave" method ="POST" action="checklogin.php" >
    <fieldset >
        <legend>Login</legend>
        <table bgcolor="#00CCCC" width="100%">
        <thead>
         <tr>
             <td colspan="4">
        <img src="NITT-logo.jpg" align="left" width="45" height="45" alt="logo" >
<font size="5" color="red">Department_Information_system
</font>
  
</td>

</tr>

</thead>

</table>
       
<table  cellpadding="3" cellspacing="3" bodercolor="blue" >
	<tr ><td>
        <label for='userID' ><h4>UserName<font color="red">*</font>:</h4></label></td>
        <td>
        <input type="text" id="idname" name="name" autofocus />
    	</td></tr>
    <tr><td>
     <label for='password' ><h4>Password<font color="red">*</font>:</h4></label></td>
        <td>
     <input type="password" id="idpass1" name="pass1" autofocus/>
    		</td></tr>
</table>
   <table  cellpadding="3" cellspacing="" >
    <tr ><td align="center">

    <input id="idsubmit" type="submit" value="Login" name="submit" />
    </td></tr>

</table>
    </fieldset>
</form>
</body></center>
</html>

<?php
echo '<center><a href="home.php">Home</a>';
?>
<?php
//ob_start();
//session_start();
require_once'DBConn.php';

if(isset($_POST['submit']))
{
$username=$_POST['name'];
$pass1=$_POST['pass1'];
if(empty($username)){
    echo '</br></br><font color="red" size="3"><b>UserName field can not be empty</b></font>';
    exit(0);
}
else if(empty($pass1)){
    echo '</br><font color="red" size="3"><b>password field can not be empty</b></font>';
    exit(0);
}
else
     {
      $sql1 = "SELECT * FROM users WHERE uname = \"$username\" and passward = \"$pass1\"";
      $result1 = mysql_query($sql1) or die(mysql_error());
      if(mysql_num_rows($result1)>0)
          {
           $row=mysql_fetch_array($result1);
           if($row['blocked']==1)
               {
                  echo '<font color="red" size="3"><center>Your account has been blocked.<br> please contact Admin</center></font>';
                  exit(0);
                }
           if($row['logged']==1)
                {
                echo '<font color="red" size="3"><center>Your are already logged in some other computer/browser.<br></font></center>';
                exit(0);
                }
           else
                {
                mysql_query("UPDATE `user` SET logged=1 WHERE uid = $userid ",$department);
                }
          // $_SESSION['score']=$row['score'];
          // $_SESSION['ok']=true;
           //$curq = $row['curq'];
          // $_SESSION['sname']="$name";
          // header("Location:index.php") ;
          }
        else if(mysql_num_rows($result1)==0)
            {
            echo '<font color="red" size="3"><center>Sorry!!!!!You have enter Wrong Username or Password</center></font>';
            exit (0);
            }
        else
          {
          header("Location:logout.php") ;
           }
      
           
      }

}
 ?>