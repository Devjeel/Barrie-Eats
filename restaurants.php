<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurants</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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

//start the table
echo '<table><thead><th>Name</th><th>Address</th><th>Phone</th></thead><tbody>';

//loop the data & show each restaurants
foreach($restaurants as $r){
    echo'<tr><td>'. $r['name'] .'</td><td>' . $r['address']. '</td><td>' . $r['phone'] . '</td></tr>';
}

//close the table
echo '</tbody></table>';

//disconnect
$db = null;
?>

</body>
</html>