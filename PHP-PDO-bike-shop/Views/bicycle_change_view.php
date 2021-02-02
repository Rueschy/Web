<!DOCTYPE html>
<html>
<body>

<h1>Change Bicycle</h1>
<form method="post">
    <label>ID: </label> <label><input type="text" name="id" value="<?php echo $v->getID();?>" readonly></label><br>
    <label>Brand: </label> <label><input type="text" name="brand" value="<?php echo $v->getBrand()?>"></label><br>
    <label>Name: </label> <label><input type="text" name="name" value="<?php echo $v->getName()?>"></label><br>
    <label>Price: </label> <label><input type="text" name="price" value="<?php echo $v->getPrice()?>"></label><br>
    <label>Color: </label> <label><input type="text" name="color" value="<?php echo $v->getColor()?>"></label><br>
    <label>Size: </label> <label><input type="text" name="size" value="<?php echo $v->getSize()?>"></label><br>
    <label>Brakes: </label> <label><input type="text" name="brakes" value="<?php echo $v->getBrakes()?>"></label><br>
    <label>Shifter: </label> <label><input type="text" name="shifter" value="<?php echo $v->getShifter()?>"></label><br>
    <label>Fork: </label> <label><input type="text" name="fork" value="<?php echo $v->getFork()?>"></label><br>
    <label>Shock: </label> <label><input type="text" name="shock" value="<?php echo $v->getShock()?>"></label><br><br>

    <label><input type="submit" name="action_do_change_bicycle" value="Change"></label>
    <label><input type="submit" name="action_add_cancel" value="Cancel"></label>
</form>

<p>
    <?php echo $message;?>
</p>

</body>
</html>