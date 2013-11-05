<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
 <title>mca_sem_1</title>
    <style type="text/css">

    th,td
    {
        margin: 0;
        text-align: center;
        border-collapse: collapse;
        outline: 1px solid red;
    }

    td
    {
        padding: 5px 10px;
    }

    th
    {
        background: #666;
        color: cyan;
        padding: 5px 10px;
    }

    td:hover
    {
        cursor: pointer;
        background: #666;
        color: cyan;
    }
    </style>

</head>
<body>
    <div id="wrapper">
<?php
include('includes/header.php');
include('includes/navstd.php');
?>
<br></br><br></br>
<marquee><h3><font color="red">MCA SECOND SEMESTER TIME TABLE</font></h3></marquee>
    <table width="50%" align="center" color="red" >
    <div id="head_nav">
	<tr><th colspan="10" align="center">PERIOD</th></tr>
    <tr>
        <th>DAY</th>
        <th>8:30-9:20 AM</th>
        <th>9:20-10:10 AM</th>
        <th>10:30-11:20 AM</th>
        <th>11:20-12:10 PM</th>
        <th>1:30-2:20 PM</th>
        <th>2:20-3:10 PM</th>
		<th>3:10-4:00 PM</th>
    </tr>
</div>
<div id="head_nav">
    <tr>
        <th>Monday</th>

            <td title="No Class" class="Holiday"</td>
            <td>CA-727</td>
			<td>CA-725</td>
            <td title="No Class" class="Holiday"></td>
          <td colspan="3">CA-705</td>

    </tr>
</div>
<div id="head_nav">
    <tr>
        <th>Tuesday</th>

            <td title="No Class" class="Holiday"</td>
            <td>CA-727</td>
			<td>CA-729</td>
            <td>CA-721</td>
          <td colspan="3">CA-707</td>

    </tr></div>
<div id="head_nav">
    <tr>
        <th>Wednesday</td>

             <td title="No Class" class="Holiday"</td>
			 <td title="No Class" class="Holiday"</td>
            <td colspan="2">CA-725</td>
		    <td colspan="2">CA-729</td>
			<td title="No Class" class="Holiday"</td>


    </tr> </div>
<div id="head_nav">
    <tr>
        <th>Thrusday</td>

            <td title="No Class" class="Holiday"</td>
			 <td>CA-727</td>
            <td colspan="2">CA-721</td>
			<td title="No Class" class="Holiday"</td>
		    <td colspan="1">CA-723</td>
			<td title="No Class" class="Holiday"</td>



    </tr>
	</div>
<div id="head_nav">
    <tr>
        <th>Friday</td>

            <td title="No Class" class="Holiday"</td>
			<td title="No Class" class="Holiday"</td>
		    <td colspan="1">CA-723</td>
			<td title="No Class" class="Holiday"</td>
            <td title="No Class" class="Holiday"</td>
			<td title="No Class" class="Holiday"</td>
			<td title="No Class" class="Holiday"</td>

    </tr>
	    </div>
</table>
<br><br><br><br>
<table width="50%" align="center" >
<th>SubjectID</th>
<th>Subject Name</th>
<th>faculty</th>

<tr><td>CA-721</td><td>Data Warehousing and Data Mining</td><td>Dr. S. Nickolas</td></tr>
<tr><td>CA-723</td><td>Graphics and Multimedia</td><td>Dr. A. Vadivel</td></tr>
<tr><td>CA-725</td><td>Software Engineering</td><td>Dr. N.P. Gopalan</td></tr>
<tr><td>CA-727</td><td>Operating System</td><td>Dr. B. Janet</td></tr>
<tr><td>CA-729</td><td>Object-Oriented Analysis and Design</td><td>Dr. S. R. Balasundaram</td></tr>
<tr><td>CA-705</td><td>OS AND NETWORK LAB</td><td>Dr. S. Domnic</td></tr>
<tr><td>CA-707</td><td>CASE TOOLS LAB</td><td>Dr. B. Janet</td></tr>
</table>
                <br></br><br></br>
<?php
include('includes/footer.php');
?>
</div> <!-- End #wrapper -->
</body>
</html>
