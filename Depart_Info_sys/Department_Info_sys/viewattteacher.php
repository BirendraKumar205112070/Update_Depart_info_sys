<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<title>Attendance View</title>
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
<form  class="nave" action="viewattteacher.php" method="post" accept-charset='UTF-8'>
     <filedset width="20">
        <table  cellpadding="10" cellspacing="6" bodercolor="blue" border="0" >
	<tr ><td>
	<label for='Department'><h4> Department:</h4></label></td>
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
        <input type="text" id="idname" name="uid" autofocus  required/>
    	</td></tr>
            <tr ><td>
        <label for='sid' ><h4>SubjectID  :</h4></label></td>
        <td>
        <input type="text" id="idname" name="sid" autofocus  required/>
    	</td></tr>
        </tr>  </table><br></br>
     <table  cellpadding="3" cellspacing="3" bodercolor="blue" align="right" >
    <tr><td>
            <input type="submit" name="view" value="View" style="background-color:cyan; width: 100px;" />
       </td></tr>
        </table>
         </fieldset>
</form>

</div> <!-- end #content -->

<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>


<?php
ob_start();
 session_start();
require_once'DBConn.php';
//header('Content-Type: text/html; charset=utf-8');
     if(isset($_POST['view']))
	{
         $varDepartment=$_POST['formDepartment'];
         $varuid=$_POST['uid'];
         $varsid=$_POST['sid'];
         $sql1 ="SELECT did ,uid,sid FROM attendance WHERE uid = $varuid";
         $result1 = mysql_query($sql1) or die(mysql_error());
         if(mysql_num_rows($result1))
             {
                     $row4=mysql_fetch_array($result1);
                     $vardid1=$row4['did'];
                     $varuid1=$row4['uid'];
                     $varsid1=$row4['sid'];
                     if($vardid1==$varDepartment and $varuid1== $varuid and $varsid1==$varsid){
                               $query="select count(attend)
                                           from attendance
                                           where uid=$varuid and sid=\"$varsid\" and attend='pr'";
                                      $result2 = mysql_query($query) or die(mysql_error());
                                      if($result2){
                                           if(mysql_num_rows($result2)>0)
                                                        {
                                                      $row=mysql_fetch_array($result2);
                                                      $_session['var']=$row[0];
                                                      print "<center><b><font color='blue'>Total Attendance are in ". $varsid." : ".$row[0]."</font></b></center>\n";
                                                        }
                                           else if(mysql_num_rows($result2)==0)
                                                  {
                                                  echo'<script>alert("Your Data has been not be Available")</script>';
                                                   }
                                                  }


                                $query="select count(takingClass)
                                            from attendance
                                            where  uid=$varuid and sid=\"$varsid\"";
                                $result3 = mysql_query($query) or die(mysql_error());
                                if($result3){
                                     if(mysql_num_rows($result3)>0)
                                               {
                                                 $row1=mysql_fetch_array($result3);
                                                 $_session['var']=$row1[0];
                                                 print "<center><br><b><font color='red'>Total Class are in ". $varsid." : ".$row1[0]."</font></b></br></center>\n";
                                               }
                                      else if(mysql_num_rows($result3)==0)
                                                {
                                                  echo'<script>alert("Your Data has been not be Available")</script>';
                                                }
                                       }

                     }
                       else
                           {
                           echo'<script>alert("Sorry!!You select some wrong Field")</script>';
                           }

             }
                  
                   else
                           {
                           echo'<script>alert("Sorry!!You select some wrong Field")</script>';
                           }

        
        }
        
             
             ?>
</center>
    <br></br><br></br>
<?php
include('includes/footer.php');
?>
</div> <!-- End #wrapper -->
</body>
</html>

