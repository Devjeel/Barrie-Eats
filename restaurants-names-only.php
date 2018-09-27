<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurants names</title>
</head>
<body>

<?php

//connect
$db = new PDO('mysql:host=localhost; dbname=barrieEats', 'root', 'jeelhp2015.');

//set up query
$sql = "SELECT name FROM restaurants";
$cmd = $db->prepare($sql);

//fetch data from the db
$cmd->execute();
$restaurants = $cmd->fetchAll();

//loop trough the data and print
foreach ($restaurants as $r){
    echo $r['name'] . "<br />";
}

//disconnect
$db = null;

?>

</body>
</html>