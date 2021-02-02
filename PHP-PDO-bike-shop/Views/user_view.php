<?php
function print_vehicle_table($array) {
    if (count($array) > 0) {
    echo '<table border="1">';
        echo '<th>Product: </th><th>Details: </th>';
        foreach ($array as $vehicle) {
        echo '<tr><td>' . 'Brand: ' . $vehicle->getBrand() . '<br>' . 'Name: ' . $vehicle->getName() . '<br>' . 'Category: ' . $vehicle->getCategory() . '<br>' . 'Price: ' . $vehicle->getPrice() . '<br>' .'</td><td>'. $vehicle->StringForTable() . '</td><td><input type="radio" name="selection" value="' . $vehicle->getID() . '"/></td></tr>';
        }
        echo '</table>';
    }
}
?>


<!DOCTYPE html>
<html>
<body>

    <h1>Rüschys Bike-Shop!</h1>

    <h2>Your Accountdetails:</h2>

    <form method="post">
        <p>
            Name: <?php echo $u->getName();?><br>
            Email: <?php echo $u->getEmail();?><br>
            Birthdate: <?php echo $u->getBirthdate();?><br>
            Balance: <?php echo $u->getBalance();?>€<br>
        </p>

        <label><input type="submit" name="action_logout" value="Logout"></label>
        <label><input type="submit" name="action_buy" value="Buy"></label>
        <label><input type="submit" name="action_add_balance" value="Add Balance"></label>
        <label><input type="text" name="balance" placeholder="€"></label><br><br><br>

        <label>
            <select name="category">
                <option value="Bicycle" selected>Bicycle</option>
                <option value="Motorcycle">Motorcycle</option>
                <option value="EBike">E-Bike</option>
            </select>
        </label>

        <label><input type="submit" name="action_filter_category" value="Filter Category"></label><br>
        <label><input type="text" name="price"></label>
        <label><input type="submit" name="action_filter_price" value="Filter Price"></label>
        <label><input type="submit" name="action_reset" value="Reset Filter"></label><br><br>

        <p>
            <?php echo $message;?><br>
        </p><br>

        <?php print_vehicle_table($displayArray);?>

    </form>

</body>
</html>