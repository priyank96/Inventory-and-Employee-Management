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
        <title>Bill By Date</title>
    </head>
    <body>
<form action="" method="post">  
Enter Bill Date ('yyyy-mm-dd'): <input type="text" name="term" /><br />  
<input type="submit" value="Submit" />  
</form>  
<?php
if (!empty($_REQUEST['term'])) {

$term = mysql_real_escape_string($_REQUEST['term']);     

$query = "SELECT * FROM Bill WHERE bill_date LIKE '%".$term."%'"; 
$id = "SELECT * FROM Bill WHERE bill_date LIKE '%".$term."%'";  

//$query1 = "SELECT * FROM CompanyLocations WHERE comp_id = $id"; 
//$query2 = "SELECT * FROM CompanyContacts WHERE comp_id = $id"; 


$result = mysql_query($query);

$res = mysql_query($id);

//$result1 = mysql_query($query1);
//$result2 = mysql_query($query2);

echo '<br><br>' ; 

while ($row = mysql_fetch_array($result)){  
echo 'Customer ID: ' .$row['cust_id'];  
echo '<br /> Amount Due: ' .$row['amt_due'];
echo '<br /> Amount Paid: ' .$row['amt_paid'];
echo '<br><br>' ; 
}
}  
?>
    </body>
</html>
