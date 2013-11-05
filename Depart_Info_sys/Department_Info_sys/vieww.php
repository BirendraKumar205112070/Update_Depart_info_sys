<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<title>ViewNews</title>
</head>
<body>
<div id="wrapper">
<?php
include('includes/header.php');
include('includes/newsnav.php');
?>
    <br></br><br/><br/><br/><br/><br/><br/>
 <center>
<?php
ob_start();
 session_start();
require_once'DBConn.php';
//header('Content-Type: text/html; charset=utf-8');
     if(isset($_POST['view']))
	{
          $varDepartment=$_POST['formDepartment'];
          $varsem=$_POST['semester'];
           if(empty($varDepartment))
		{
		echo'<script>alert("You forget to select Department")</script>';
                
		}

            else if(empty($varsem)){
               echo'<script>alert("You forget to select Department")</script>';
            }
          else
              {
             $query ="select news from newsupdate where did=$varDepartment and semester=$varsem";
             $result2 = mysql_query($query) or die(mysql_error());
           // if($result2){
                 if(mysql_num_rows($result2)>0)
                        {
                        $row=mysql_fetch_array($result2) or die (mysql_error());
                     print "<br><b><font color='red'><u>Current News :</u></font></br>\n";
                     print "<br><b> ".$row['news']."</b></br>\n";
                // echo $_session['result2'];

                         }
                    else if(mysql_num_rows($result2)==0)
                                {
                          echo'<script>alert("Your Data has been not Available")</script>';
                          echo'<font color="red"><b>Sorry!!! no more information</b></font>';
                             }
                       // }
                 else
                   {
                  die (mysql_error());
                   }




        }
        }
        
        ?>


</center>
    <br/><br/><br/><br/><br/><br/><br/>
<?php
include('includes/footer.php');
?>
</div> <!-- End #wrapper -->
</body>
</html>