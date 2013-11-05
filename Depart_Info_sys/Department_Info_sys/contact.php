<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="sty1.css" media="screen" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
<title>Contact Us</title>
</head>
<body>
<div id="wrapper">
<?php
include('includes/header.php');
include('includes/contactnav.php');
?>
 <br></br>
 <center>
<div id="content">
<form class="contact_form" action="" method="post" name="contact_form">
    <ul>
        <li>
            <font color="orange"><h2>Contact Us</h2></font>
             <span class="required_notification">* Denotes Required Field</span>
        </li>
        <li>
            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="Birendra Kumar" required />
        </li>
        <li>
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Birendra_70@example.com" required />
            <span class="form_hint">Proper format "name@something.com"</span>
        </li>
        <li>
            <label for="website">NITT_WebMail:</label>
            <input type="email" name="website" placeholder="205112070@nitt.edu" required />
            <span class="form_hint">Proper format "name@something.edu"</span>
        </li>
        <li>
            <label for="message">Message:</label>
            <textarea name="message" cols="40" rows="10" required ></textarea>
        </li>
        <li>
        	<button class="submit" type="submit" name="submit">Submit</button>
        </li>
    </ul>
</form>

</div> <!-- end #content -->
<?php
ob_start();
 session_start();
 
require_once'DBConn.php';

     if(isset($_POST['submit']))
	{
         $varuid=$_SESSION['uid'] ;
         $varname=$_POST['name'];
         $varemail=$_POST['email'];
         $varwebsite=$_POST['website'];
         $varmessage=$_POST['message'];
         $query ="INSERT INTO contact(uname,uid,email,website,message)VALUES ('$varname',$varuid,'$varemail','$varwebsite','$varmessage');";
             $result2 = mysql_query($query) or die(mysql_error());
             if($result2){
                      echo'<script>alert("Your message has been Successfully send")</script>';
                 //echo $vardate;
                      }
               else
                   {
                 echo'<script>alert("Your message not send")</script>';
                   }


            /*else {

             echo'<script>alert("Your Data not be Added")</script>';
           }*/


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
