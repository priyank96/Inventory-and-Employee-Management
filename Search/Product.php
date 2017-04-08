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
        <title>Product</title>
    </head>
    <body>
<form action="" method="post">  
Enter Product name: <input type="text" name="term" /><br />  
<input type="submit" value="Submit" />  
</form>  
<?php
if (!empty($_REQUEST['term'])) {

$term = mysql_real_escape_string($_REQUEST['term']);     

$query = "SELECT * FROM Products WHERE prod_name LIKE '%".$term."%'"; 
$id = "SELECT * FROM Products WHERE prod_name LIKE '%".$term."%'"; 

$query1 = "SELECT * FROM CompanyLocations WHERE comp_id = $id"; 
$query2 = "SELECT * FROM CompanyContacts WHERE comp_id = $id"; 


$result = mysql_query($query);

$res = mysql_query($id);

//$result1 = mysql_query($query1);
//$result2 = mysql_query($query2);

echo '<br><br>' ; 

while ($row = mysql_fetch_array($result)){  
echo 'Product ID: ' .$row['prod_id'];  
echo '<br /> Product name: ' .$row['prod_name'];
echo '<br /> MRP:'.$row['mrp'];
echo '<br /> Stock:'.$row['quantity'];  
echo '<br><br>' ; 
}
}  
?>
    </body>
</html>
