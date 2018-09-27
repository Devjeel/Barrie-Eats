<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ul-li Restaurants</title>
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

echo'<ul>';

foreach($restaurants as $r){
    echo'<li style="display:inline">'. $r['name'] . '</li>';
}

echo'</ul>';

//disconnect
$db= null;

?>
</body>
</html>