e<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurants details</title>
</head>
<body>

<h1>Restaurant Details</h1>

<form method="post" action="save-restaurant.php">
    <fieldset>
        <label for="name">Name: </label>
        <input name="name" id="name">
    </fieldset>
    <fieldset>
        <label for="address">Address: </label>
        <textarea name="address" id="address"> </textarea>
    </fieldset>
    <fieldset>
        <label for="phone">phone: </label>
        <input name="phone" id="phone">
    </fieldset>
    <input type="submit">
</form>

</body>
</html>