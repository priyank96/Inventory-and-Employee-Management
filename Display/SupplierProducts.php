 <?php

$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('project');

$query = "SELECT * FROM SupplierProducts"; 
$result = mysql_query($query);
	
echo "<table >"; 
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['sup_id'] . "</td><td>" . $row['prod_id']  . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

echo '<form action="../bb1.html">
    <input type="submit" value="Click here" />
</form>' ; 

mysql_close(); //Make sure to close out the database connection



?>
