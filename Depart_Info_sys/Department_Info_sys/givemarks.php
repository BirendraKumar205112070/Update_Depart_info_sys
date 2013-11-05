<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<title>Student Pages</title>
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
        <label for='userID' ><h4>StudenID  :</h4></label></td>
        <td>
        <input type="text" id="idname" name="uid" autofocus />
    	</td></tr>
            <tr ><td>
        <label for='sid' ><h4>SubjectID  :</h4></label></td>
        <td>
        <input type="text" id="idname" name="sid" autofocus />
    	</td></tr>
         <tr ><td>
	<label for='Department'><h4>ExamTitle:<h4></label></td>
            <td>
        <select name="exam" style="width: 150px;">
		<option value="">Select a ExamTitle...</option>
                <option value="ct_1">CT_1</option>
		<option value="ct_2">CT_2</option>
		<option value="f_exam">Final_exam</option>
	</select>
            </td>
              <tr ><td>
        <label for='marks' ><h4>Marks  :</h4></label></td>
        <td>
        <input type="text" id="idname" name="marks" autofocus />
    	</td></tr>
        </tr>  </table><br></br>
     <table  cellpadding="3" cellspacing="3" bodercolor="blue" align="right" >
    <tr><td>
            <input type="submit" name="gives" value="GIVE_MARKS" style="background-color:cyan; width: 100px;" />
       </td>
        <td>
            <input type="submit" name="update" value="Edit" style="background-color:cyan; width: 100px;" />
        </td></tr>
        </table>
         </fieldset>
</form>

</div> <!-- end #content -->
<?php
ob_start();
 session_start();
require_once'DBConn.php';
//header('Content-Type: text/html; charset=utf-8');
     if(isset($_POST['gives']))
	{
         $varuid=$_POST['uid'];
         $varsid=$_POST['sid'];
         $examname=$_POST['exam'];
         $getmarks=$_POST['marks'];
         if(empty($varuid))
              {
              echo '<li><font color="red">Student ID can not be empty !!</font></li>';
              }
         else if(empty($varsid))
              {
              echo '<li><font color="red">Subject Id cannot be empty!!</font></li>';
              }
         else if(empty($examname))
              {
              echo '<li><font color="red">You forgot to select a Exam Title!!</font></li>';
              }
        else if(empty($getmarks))
              {
              echo '<li><font color="red">Marks field can not be empty!!</font></li>';
              }
         else
             {
             $sql="select examname from marks where uid=$varuid";
             $result1 = mysql_query($sql) or die(mysql_error());
             if($result1==0){
             $query ="INSERT INTO marks(uid,sid,examname,mark)VALUES ($varuid,'$varsid','$examname',$getmarks);";
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
             else {
                echo'<script>alert("marks given already  in  this paper")</script>';
             }
        }
        }
       if(isset($_POST['update']))
	{
         $varuid=$_POST['uid'];
         $varsid=$_POST['sid'];
         $examname=$_POST['exam'];
         $getmarks=$_POST['marks'];
         if(empty($varuid))
              {
              echo '<li><font color="red">Student ID can not be empty !!</font></li>';
              }
         else if(empty($varsid))
              {
              echo '<li><font color="red">Subject Id cannot be empty!!</font></li>';
              }
         else if(empty($examname))
              {
              echo '<li><font color="red">You forgot to select a Exam Title!!</font></li>';
              }
        else if(empty($getmarks))
              {
              echo '<li><font color="red">Marks field can not be empty!!</font></li>';
              }
         else
             {
             $query ="update  marks set examname ='$examname',mark=$getmarks where uid= $varuid";
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
        }
?>
</center>

<?php
include('includes/footer.php');
?>
</div> <!-- End #wrapper -->
</body>
</html>


