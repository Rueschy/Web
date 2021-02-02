<!DOCTYPE html>
<html>
<body>

<h1>Change Motorcycle</h1>
<form method="post">
    <label>ID: </label> <label><input type="text" name="id" value="<?php echo $v->getID();?>" readonly></label><br>
    <label>Brand: </label> <label><input type="text" name="brand" value="<?php echo $v->getBrand();?>"></label><br>
    <label>Name: </label> <label><input type="text" name="name" value="<?php echo $v->getName();?>"></label><br>
    <label>Price: </label> <label><input type="text" name="price" value="<?php echo $v->getPrice();?>"></label><br>
    <label>Engine: </label> <label><input type="text" name="engine" value="<?php echo $v->getEngine();?>"></label><br>
    <label>Cubic Capacity: </label> <label><input type="text" name="cubic" value="<?php echo $v->getCubicCapacity();?>"></label><br>
    <label>Power: </label> <label><input type="text" name="power" value="<?php echo $v->getPower();?>"></label><br>
    <label>Brakes: </label> <label><input type="text" name="brakes" value="<?php echo $v->getBrakes();?>"></label><br>
    <label>Suspension: </label> <label><input type="text" name="suspension" value="<?php echo $v->getSuspension();?>"></label><br>
    <label>Topspeed: </label> <label><input type="text" name="topSpeed" value="<?php echo $v->getTopSpeed();?>"></label><br><br>

    <label><input type="submit" name="action_do_change_motorcycle" value="Change"></label>
    <label><input type="submit" name="action_add_cancel" value="Cancel"></label>
</form>

<p>
    <?php echo $message;?>
</p>

</body>
</html>