<?php
// If we have restaurant id, that means user is editing
if (! empty($_GET['restaurantId'])){
    $restaurantId = $_GET['restaurantId'];

    //connect
    $db = new PDO( 'mysql:host=localhost;dbname=barrieEats','root','jeelhp2015.');

    //setup query and execute
    $sql = "SELECT * FROM restaurants WHERE restaurantId = :restaurantId";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':restaurantsId', $restaurantId, PDO::PARAM_INT);
    $cmd->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurants details</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<a href="restaurants.php">View Restaurants</a>

<h1>Restaurant Details</h1>

<form method="post" action="save-restaurant.php">
    <fieldset>
        <label for="name" class="col-md-1">Name: </label>
        <input name="name" id="name" required>
    </fieldset>
    <fieldset>
        <label for="address" class="col-md-1">Address: </label>
        <textarea name="address" id="address" required> </textarea>
    </fieldset>
    <fieldset>
        <label for="phone" class="col-md-1">phone: </label>
        <input name="phone" id="phone" type="tel" required>
    </fieldset>
    <fieldset>
        <label for="restaurantType" class="col-md-1">Type: </label>
        <select name="restaurantsType" id="restaurantType">
            <option>-select-</option>
            <?php
                //connect to db
                $db = new PDO( 'mysql:host=localhost;dbname=barrieEats','root','jeelhp2015.');
                //set up query
                $sql = "SELECT * FROM restaurantTypes ORDER BY restaurantType";

                $cmd = $db->prepare($sql);
                // fetch the results
                $cmd->execute();
                $types = $cmd->fetchAll();
                // loop through and create a new option tag for each type
                foreach ($types as $t) {
                    echo "<option>{$t['restaurantType']}</option>";
                }
                // disconnect
                $db = null;
            ?>
        </select>
    </fieldset>
    <input type="submit" class="btn btn-primary col-md-offset-1">
</form>


</body>
</html>