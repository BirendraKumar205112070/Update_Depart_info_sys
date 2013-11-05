<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<title>Add Attendance</title>
 <link rel="stylesheet" href="jquery-ui.css" />
<script src="jquery-1.9.1.js"></script>
<script src="jquery-ui.js"></script>
 <script>
 $(document).ready(function() {
$( "#datepicker" ).datepicker({
showOn: "button",
buttonImage: "calendar.gif",
buttonImageOnly: true,
dateFormat:'yy-mm-dd'
});
});
</script>
</head>
<body>
<div id="wrapper">
<?php
include('includes/header.php');
include('includes/nav2.php');
?>
    <br></br>
 <center>

<div id="content">
<form  class="nave" action="" method="post" accept-charset='UTF-8'>
     <filedset width="20">
        <table  cellpadding="10" cellspacing="6" bodercolor="blue" border="0" >
	<tr ><td>
	<label for='Department'><h4> Department:<h4></label></td>
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
        <label for='userID' ><h4>StudentID  :</h4></label></td>
        <td>
        <input type="text" id="idname" name="uid" autofocus />
    	</td></tr>
            <tr ><td>
        <label for='sid' ><h4>SubjectID  :</h4></label></td>
        <td>
        <input type="text" id="idname" name="sid" autofocus />
    	</td></tr>
            <tr ><td>
        <label for='date' ><h4>Date  :</h4></label></td>
        <td>
        <input type="text" id="datepicker" name="date" />
    	</td></tr>
         <tr ><td>
        <label for='attendance' ><h4>Attendance :</h4></label></td>
        <td>
        <select name="attendance" style="width: 150px;">
		<option value="">Select...</option>
                <option value="Ap">Apsent</option>
		<option value="pr">present</option>
		
	</select>
    	</td></tr>
          <tr ><td>
        <label for='total' ><h4>TakingClass  :</h4></label></td>
        <td>
        <input type="text" id="idname" name="takingClass" autofocus />
    	</td></tr>
        </tr>  </table><br></br>
     <table  cellpadding="3" cellspacing="3" bodercolor="blue" align="right" >
    <tr><td>
            <input type="submit" name="add" value="ADD" style="background-color:cyan; width: 100px;" />
       </td>
        <td>
            <input type="submit" name="update" value="EDIT" style="background-color:cyan; width: 100px;" />
        </td>
        </tr>
        </table>
         </fieldset>
</form>

</div> <!-- end #content -->
<?php
ob_start();
 session_start();
require_once'DBConn.php';
//header('Content-Type: text/html; charset=utf-8');
     if(isset($_POST['add']))
	{
         $vardid1=$_SESSION['did'];
         $varDepartment=$_POST['formDepartment'];
         $varuid=$_POST['uid'];
         $varsid=$_POST['sid'];
         $vardate=$_POST['date'];
         $varattendance=$_POST['attendance'];
        $vartclass=$_POST['takingClass'];
       //$tkdate = date('Y-m-d',strtotime($_POST['date']));
       $tkdate = DateTime::createFromFormat('y-m-d', $_POST['date']);
       
         if(empty($varDepartment))
		{
		echo '<li><font color="red">You forgot to select a Department!!</font></li>';
		}

	 else if(empty($varuid))
              {
              echo '<li><font color="red">Student ID can not be empty !!</font></li>';
              }
         else if(empty($varsid))
              {
              echo '<li><font color="red">Subject Id cannot be empty!!</font></li>';
              }
         else if(empty($vardate))
              {
                echo '<li><font color="red">date field can not be empty!!</font></li>';
              }
         else if(empty($varattendance))
              {
              echo '<li><font color="red">Please fill the value for Attendance!!</font></li>';
              }
         else if(empty($vartclass))
              {
              echo '<li><font color="red">Please fill the taking class!!</font></li>';
              }
         else
             {
             //$sql1 ="SELECT * FROM users WHERE uid = $varuid";
             //$result1 = mysql_query($sql1) or die(mysql_error());
            // if(mysql_num_rows($result1)){
             if($vardid1== $varDepartment){
             $query ="INSERT INTO attendance(attend,uid,sid,date,did,takingClass)VALUES ('$varattendance',$varuid,'$varsid','$tkdate',$varDepartment,$vartclass);";
             $result2 = mysql_query($query) or die(mysql_error());
             if($result2){
                      echo'<script>alert("Your Data has been Successfully Added")</script>';
                 //echo $vardate;
                      }
               else
                   {
                 echo'<script>alert("Your Data not be Available")</script>';
                   }
             
             
            /*else {
                
             echo'<script>alert("Your Data not be Added")</script>';
           }*/

        }

        else{
             echo'<script>alert("Sorry !!! You Select Wrong Department")</script>';
             }
        }

        }
        if(isset($_POST['update']))
	{
          $vardid1=$_SESSION['did'];
         $varDepartment=$_POST['formDepartment'];
         $varuid=$_POST['uid'];
         $varsid=$_POST['sid'];
         $vardate=$_POST['date'];
         $varattendance=$_POST['attendance'];
        $vartclass=$_POST['takingClass'];
       //$tkdate = date('Y-m-d',strtotime($_POST['date']));
       $tkdate = DateTime::createFromFormat('y-m-d', $_POST['date']);

         if(empty($varDepartment))
		{
		echo '<li><font color="red">You forgot to select a Department!!</font></li>';
		}

	 else if(empty($varuid))
              {
              echo '<li><font color="red">Student ID can not be empty !!</font></li>';
              }
         else if(empty($varsid))
              {
              echo '<li><font color="red">Subject Id cannot be empty!!</font></li>';
              }
         else if(empty($vardate))
              {
                echo '<li><font color="red">date field can not be empty!!</font></li>';
              }
         else if(empty($varattendance))
              {
              echo '<li><font color="red">Please fill the value for Attendance!!</font></li>';
              }
         else if(empty($vartclass))
              {
              echo '<li><font color="red">Please fill the taking class!!</font></li>';
              }
         else
             {
              if($vardid1== $varDepartment){
             $query ="update  attendance set attend =$varattendance,takingClass= $vartclass where uid= $varuid";
             $result2 = mysql_query($query) or die(mysql_error());
             if($result2){
                      echo'<script>alert("Your operation has been Successfully done")</script>';
                 //echo $vardate;
                      }
               else
                   {
                 echo'<script>alert("Your Data not be Added")</script>';
                   }
             }
           else{
             echo'<script>alert("Sorry !!! You Select Wrong Department")</script>';
             }
        }

         
        }

?>
</center>
<?php ob_end_flush() ?>
<?php
include('includes/footer.php');
?>
</div> <!-- End #wrapper -->
</body>
</html>

