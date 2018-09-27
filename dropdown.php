<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dropdown</title>
</head>
<body>

<?php
//connect
$db = new PDO('mysql:host=localhost;dbname=barrieEats', 'root','jeelhp2015.');

//set up query
$sql = "SELECT * FROM restaurants";

//execute and store the table
$cmd = $db->prepare($sql);
$cmd->execute();
$restaurants = $cmd->fetchAll();

echo'<select>';

foreach($restaurants as $r){
    echo'<option>'. $r['name'] .'</option>';
}
echo'</select>';

?>
</body>
</html>