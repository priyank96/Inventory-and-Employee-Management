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
Enter Company name: <input type="text" name="term" /><br />  
<input type="submit" value="Submit" />  
</form>  
<?php
if (!empty($_REQUEST['term'])) {

$term = mysql_real_escape_string($_REQUEST['term']);     

$query = "SELECT * FROM Company NATURAL JOIN CompanyLocations WHERE comp_name LIKE '%".$term."%'"; 

$result = mysql_query($query);

echo '<br><br>' ; 

while ($row = mysql_fetch_array($result)){  
echo 'Company ID: ' .$row['comp_id'];  
echo '<br /> Company name: ' .$row['comp_name'];  
echo '<br /> City: ' .$row['city'];
echo '<br /> Pincode: ' .$row['pincode'];
echo '<br /> Area: ' .$row['area']; 
echo '<br /> Street: ' .$row['street'];  
echo '<br /> Building: ' .$row['building'];  
echo '<br><br>' ; 
}
}  
?>
    </body>
</html>
