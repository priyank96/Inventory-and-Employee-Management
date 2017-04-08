 <?php

$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('project');

$query = "SELECT * FROM Employee"; 
$result = mysql_query($query);
	
echo "<table >"; 
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['emp_id'] . "</td><td>" . $row['emp_fname']  . "</td><td>" .  $row['emp_lname'] ."</td><td>" . $row['emp_phone']  . "</td><td>" . $row['salary']  . "</td><td>" . $row['join_date']  . "</td><td>" . $row['designation']  . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

echo '<form action="../bb1.html">
    <input type="submit" value="Click here" />
</form>' ; 

mysql_close(); //Make sure to close out the database connection



?>
