<?php

function print_vehicle_table($array) {
    if (count($array) > 0) {
        echo '<table border="1">';
        echo '<th>Product: </th><th>Details: </th>';
        foreach ($array as $vehicle) {
            echo '<tr><td>' . 'ID: ' . $vehicle->getID() . '<br>' . 'Brand: ' . $vehicle->getBrand() . '<br>' . 'Name: ' . $vehicle->getName() . '<br>' . 'Category: ' . $vehicle->getCategory() . '<br>' . 'Price: ' . $vehicle->getPrice() . '€' . '<br>' .'</td><td>'. $vehicle->StringForTable() . '</td><td><input type="radio" name="selection" value="' . $vehicle->getID() . '"/></td></tr>';
        }
        echo '</table>';
    }
}

function print_user_table($array) {
    if (count($array) > 0) {
        echo '<table border="1">';
        echo '<th>User: </th><th></th>';
        foreach ($array as $user) {
            echo '<tr><td>' . 'Username: ' . $user->getName() . '<br>' . 'Birthdate: ' . $user->getBirthdate() . '<br>' . 'Email: ' . $user->getEmail() . '<br>' . 'Balance: ' . $user->getBalance() . '€' . '</td><td><input type="radio" name="selection" value="' . $user->getName() . '"/></td></tr>';
        }
        echo '</table>';
    }
}
?>


<!DOCTYPE html>
<html>
<body>

    <h1>Welcome Home Admin!</h1>

    <form method="post">

        <label>
            <select name="vehicle">
                <option value="B" selected>Bicycle</option>
                <option value="M">Motorcycle</option>
                <option value="E">E-Bike</option>
            </select>
        </label>

        <label><input type="submit" name="action_add" value="Add"></label>
        <label><input type="submit" name="action_change" value="Change Product"></label>
        <label><input type="submit" name="action_delete" value="Delete Product"></label>
        <label><input type="submit" name="action_logout" value="Logout"></label>

        <p>
            <?php echo $message;?>
        </p>

        <h2>All Products:</h2>
        <?php print_vehicle_table($displayArray);?><br><br>

        <h2>All Users:</h2>
        <?php print_user_table($userArray);?><br><br>

        <label><input type="submit" name="action_delete_user" value="Delete User"></label>
    </form>

</body>
</html>