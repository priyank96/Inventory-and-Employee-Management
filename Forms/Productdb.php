<?php

$link = mysqli_connect("localhost", "root", "","project");

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


 
// Escape user inputs for security
$prod_id = mysqli_real_escape_string($link, $_REQUEST['prod_id']);
$prod_name = mysqli_real_escape_string($link, $_REQUEST['prod_name']);
$prod_type = mysqli_real_escape_string($link, $_REQUEST['prod_type']);
$brand = mysqli_real_escape_string($link, $_REQUEST['brand']);
$max_quantity = mysqli_real_escape_string($link, $_REQUEST['max_quantity']);
$min_quantity = mysqli_real_escape_string($link, $_REQUEST['min_quantity']);
$unit = mysqli_real_escape_string($link, $_REQUEST['unit']);
$discount = mysqli_real_escape_string($link, $_REQUEST['discount']);
$mrp = mysqli_real_escape_string($link, $_REQUEST['mrp']);
$cost_price = mysqli_real_escape_string($link, $_REQUEST['cost_price']);
$quantity = mysqli_real_escape_string($link, $_REQUEST['quantity']);


 
// attempt insert query execution
$sql = "INSERT INTO Products (prod_id, prod_name, prod_type, brand, max_quantity, min_quantity, unit, discount, mrp, cost_price, quantity) VALUES ('$prod_id','$prod_name','$prod_type','$brand','$max_quantity','$min_quantity','$unit','$discount','$mrp','$cost_price','$quantity')";


if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>