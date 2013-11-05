<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<title>NewsUpdate</title>
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
include('includes/navstaff.php');
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
        <select name="formDepartment" required style="width: 170px;">
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
            </td></tr>
            <tr ><td>
        <label for='userID' ><h4>Semester  :</h4></label></td>
        <td>
        <select name="semester" required style="width: 170px;">
		<option value="">Select a semester...</option>
                <option value="1">semester_1</option>
		<option value="2">semester_2</option>
		<option value="3">semester_3</option>
		<option value="4">semester_4</option>
		<option value="5">semester_5</option>
                <option value="6">semester_6</option>
		<option value="7">semester_7</option>
		<option value="8">semester_8</option>
	</select>
    	</td></tr>
          </table>
          <table>
            <tr ><td>
        <label for='updation' ><h4>Current/Update Information:</h4></label></td>
            </tr>
            <tr> <td>
        <textarea rows="10" cols="50" name="news"  size="10" color="red" autofocus >
</textarea>
    	</td></tr>
         </table><br></br>
     <table  cellpadding="3" cellspacing="3" bodercolor="blue" align="right" >
    <tr><td>
            <input type="submit" name="add" value="ADD" style="background-color:cyan; width: 100px;" />
       </td>
        <td>
            <input type="submit" name="update" value="EDIT" style="background-color:cyan; width: 100px;" />
        </td>
        <td>
            <input type="submit" name="delete" value="DELETE" style="background-color:cyan; width: 100px;" />
        </td>
        <td>
            <input type="reset" name="reset" value="RESET" style="background-color:cyan; width: 100px;" />
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
     if(isset($_POST['add']))
	{
         $vardid1=$_SESSION['did'];
         $varDepartment=$_POST['formDepartment'];
         $varnews=$_POST['news'];
         $varsem=$_POST['semester'];
         if(empty($varDepartment))
		{
		echo '<li><font color="red">You forgot to select a Department!!</font></li>';
		}
         else if(empty($varsem))
              {
              echo '<li><font color="red">You forgot to select a semester!!</font></li>';
              }
          else if(empty($varnews))
              {
              echo '<li><font color="red">Please fillup the text field!!</font></li>';
              }

         else
             {
             if($vardid1==$varDepartment){
             $query ="INSERT INTO newsupdate(did,news ,semester)VALUES ($varDepartment,'$varnews',$varsem);";
             $result2 = mysql_query($query) or die(mysql_error());
             if($result2){
                      echo'<script>alert("Your Data has been Successfully Added")</script>';
                 //echo $vardate;
                      }
               else
                   {
                 echo'<script>alert("Your Data not be Available")</script>';
                   }

             }
            else {

             echo'<script>alert("Sorry!!!You select wrong Department")</script>';
           }

        }

        }


       else if(isset($_POST['update']))
	{
         $vardid1=$_SESSION['did'];
         $varDepartment=$_POST['formDepartment'];
         $varnews=$_POST['news'];
         $varsem=$_POST['semester'];
        if(empty($varDepartment))
		{
		echo '<li><font color="red">You forgot to select a Department!!</font></li>';
		}
        else if(empty($varsem))
              {
              echo '<li><font color="red">You forgot to select a semester!!</font></li>';
              }

         else if(empty($varnews))
              {
              echo '<li><font color="red">Please fillup the text field!!</font></li>';
              }
	
         else
             {
             if($vardid1==$varDepartment){
             $query ="update  newsupdate set news = \"$varnews\" where did= $varDepartment and semester=$varsem";
             $result2 = mysql_query($query) or die(mysql_error());
                   if($result2){
                        echo'<script>alert("Your operation has been Successfully done")</script>';
                 //echo $vardate;
                              }
                   else
                         {
                         echo'<script>alert("Your Data not be updated")</script>';
                         }
               }
             else {
              echo'<script>alert("Sorry!!!You select wrong Department")</script>';
                  }
             }

        }
      else  if(isset($_POST['delete']))
	{
         $vardid1=$_SESSION['did'];
         $varDepartment=$_POST['formDepartment'];
         $varnews=$_POST['news'];
         $varsem=$_POST['semester'];
       if(empty($varDepartment))
		{
		echo '<li><font color="red">You forgot to select a Department!!</font></li>';
                //exit(0);
		}

         else
             {
             if($vardid1==$varDepartment){
             $query ="delete from newsupdate  where did= $varDepartment and semester=$varsem;";
             $result2 = mysql_query($query) or die(mysql_error());
             if($result2>0){
                      echo'<script>alert("Your operation has been Successfully done")</script>';
                 //echo $vardate;
                      }
               else
                   {
                 echo'<script>alert("There is no more information")</script>';
                   }
             }

            else {
              echo'<script>alert("Sorry!!!You select wrong Department")</script>';
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


