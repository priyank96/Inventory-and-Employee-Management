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
Enter Supplier ID: <input type="text" name="term" /><br />  
<input type="submit" value="Submit" />  
</form>  
<?php
if (!empty($_REQUEST['term'])) {

$term = mysql_real_escape_string($_REQUEST['term']);     

$query = "SELECT * FROM Suppliers NATURAL JOIN SupplierProducts WHERE sup_id  LIKE '%".$term."%'"; 

$result = mysql_query($query);

echo '<br><br>' ; 

while ($row = mysql_fetch_array($result)){  
echo 'Supplier ID: ' .$row['sup_id'];  
echo '<br /> First Name: ' .$row['sup_fname'];  
echo '<br /> Last Name: ' .$row['sup_lname'];
echo '<br /> Company ID: ' .$row['comp_id'];
echo '<br /> Product ID: ' .$row['prod_id']; 
echo '<br><br>' ; 
}
}  
?>
    </body>
</html>
