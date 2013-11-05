<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<!--meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" /-->
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<title>SelectDepartmentPage</title>
<style type="text/css">
.nave{ margin: 8px;
padding:6px;
border:1px;
border-bottom-radius:4px;
margin-bottom: 2em;
width:500px;
height:350px;
}
</style>
</head>
<body>
<div id="wrapper">

<?php
include('includes/header.php');
?>
<?php
session_start();
$varuser=$_SESSION['user'];
print "<font color='red'>Welcome! ".$varuser."</font>";
?>
<?php
include('includes/nav1.php');
?>
   
     <br></br>
 <center>
 
<div id="content">
<form  class="nave" action="" method="post" accept-charset='UTF-8'>
     <filedset width="20">
        <table  cellpadding="12" cellspacing="15" bodercolor="blue" >
	<tr ><td>
	<label for='Department'> Department :</label></td>
            <td>
        <select name="formDepartment" style="width: 170px;">
		<option value="">Select a Department...</option>
                <option value="100">Computer Application</option>
                <option value="101">Chemical Engineering</option>
		<option value="102">Civil Engineering</option>
                <option value="103">Computer Science and Engineering</option>
		<option value="104">Electical and Electronics Engineering</option>
		<option value="105">Electronics and Communication Engineering</option>
                <option value="106">Instrumentation and Control Engineering</option>
		<option value="107">Mechanical Engineering</option>
                <option value="108">Metallurgical and Materials Engineering</option>
                <option value="109">Production Engineering</option>

	</select>
            </td>
           <tr ><td>
            <label for='Profile'>Profile :</label></td>
       <td>
            <select name="formProfile" >
		<option value="">Select a Profile...</option>
                <option value="staff">Staff</option>
		<option value="student">Student</option>
		<option value="teacher">Teacher</option>
	</select>
            </td>
        </tr>
        </tr></table><br></br>
     <table  cellpadding="3" cellspacing="3" bodercolor="blue" align="right" >
    <tr><td>
            <input type="submit" name="submit" value="GO" style="background-color:cyan; width: 80px;height: 30px" />
       </td></tr>
        </table>
         </fieldset>
</form>

</div> <!-- end #content -->
<br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/>
<?php
//ob_start();
// session_start();
require_once'DBConn.php';
     if(isset($_POST['submit']))
	{
         $varDepartment=$_POST['formDepartment'];
         $varProfile=$_POST['formProfile'];
         if(empty($varDepartment))
		{
		echo '<center><li><font color="red">You forgot to select a Department!</font></li></center>';
		}

	 else if(empty($varProfile))
              {
              echo '<center><li><font color="red">You forgot to select a Profile!</font></li></center>';
              }
         else
             {
              $varuid=$_SESSION['uid'] ;

           
           $sql2 = "SELECT profile,$varProfile.uid FROM users ,$varProfile WHERE users.profile=\"$varProfile\" and users.did=$varDepartment and users.uid=$varProfile.uid";
           $result2 = mysql_query($sql2) or die(mysql_error());
           $sql1 = "SELECT did from users where uid=$varuid";
           $result1 = mysql_query($sql1) or die(mysql_error());
           while($row = mysql_fetch_array($result2)){
                    $value = $row['profile'];
                    $ssuid=$row['uid'];
                 }
            while($row1 = mysql_fetch_array($result1)){
                  $value1 = $row1['did'];
                  //$ssuid=$row['did'];
                    }

                if($value1==$varDepartment)
                    {
                     if($varuid==$ssuid){
                             header("location:$varProfile.php");
                                      }
                     else {
                         echo'<script> alert("Sorry!!!! You  select a wrong Profile!")</script>';
                          }
                    }
                else{
                    echo'<script> alert("Sorry!!!! You  select a wrong Department!")</script>';
                }
	
                   }
        }
     
?>
</center>
<br/><br/><br/><br/><br/><br/><br/><br/>
<?php
//echo $_session['myname'];
include('includes/footer.php');
?>
</div> <!-- End #wrapper -->
</body>
</html>
