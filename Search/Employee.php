<?php

$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'project';

// Database Connection String
$con = mysql_connect($db_hostname,$db_username,$db_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db_database, $con);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
<form action="" method="post">  
Enter Employee Name: <input type="text" name="term" /><br />  
<input type="submit" value="Submit" />  
</form>  
<?php
if (!empty($_REQUEST['term'])) {

$term = mysql_real_escape_string($_REQUEST['term']);     

$query = "SELECT * FROM Employee WHERE emp_fname LIKE '%".$term."%'"; 

$result = mysql_query($query);

echo '<br><br>' ; 

while ($row = mysql_fetch_array($result)){  
echo 'Employee ID: ' .$row['emp_id'];  
echo '<br /> First Name: ' .$row['emp_fname'];  
echo '<br /> Last Name: ' .$row['emp_lname'];
echo '<br /> Phone: ' .$row['emp_phone'];
echo '<br /> salary: ' .$row['salary'];
echo '<br /> Join Date: ' .$row['join_date'];
echo '<br /> designation: ' .$row['designation']; 
echo '<br><br>' ; 
}
}  
?>
    </body>
</html>
