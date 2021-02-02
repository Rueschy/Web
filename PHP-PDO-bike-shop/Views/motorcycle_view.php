<!DOCTYPE html>
<html>
<body>

<h1>Add Motorcycle</h1>
<form method="post">
    <label>ID: </label> <label><input type="text" name="id" value="<?php if(isset($_POST['id'])){echo $_POST['id'];}?>"></label><br>
    <label>Brand: </label> <label><input type="text" name="brand" value="<?php if(isset($_POST['brand'])){echo $_POST['brand'];}?>"></label><br>
    <label>Name: </label> <label><input type="text" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>"></label><br>
    <label>Price: </label> <label><input type="text" name="price" value="<?php if(isset($_POST['price'])){echo $_POST['price'];}?>"></label><br>
    <label>Engine: </label> <label><input type="text" name="engine" placeholder=" - Zylinder - Takt" value="<?php if(isset($_POST['engine'])){echo $_POST['engine'];}?>"></label><br>
    <label>Cubic Capacity: </label> <label><input type="text" name="cubic" placeholder="in ccm" value="<?php if(isset($_POST['cubic'])){echo $_POST['cubic'];}?>"></label><br>
    <label>Power: </label> <label><input type="text" name="power" placeholder="in kW" value="<?php if(isset($_POST['power'])){echo $_POST['power'];}?>"></label><br>
    <label>Brakes: </label> <label><input type="text" name="brakes" value="<?php if(isset($_POST['brakes'])){echo $_POST['brakes'];}?>"></label><br>
    <label>Suspension: </label> <label><input type="text" name="suspension" value="<?php if(isset($_POST['suspension'])){echo $_POST['suspension'];}?>"></label><br>
    <label>Topspeed: </label> <label><input type="text" name="topSpeed" placeholder="in km/h" value="<?php if(isset($_POST['topSpeed'])){echo $_POST['topSpeed'];}?>"></label><br><br>

    <label><input type="submit" name="action_do_add_motorcycle" value="Add"></label>
    <label><input type="submit" name="action_add_cancel" value="Cancel"></label>
</form>

<p>
    <?php echo $message;?>
</p>

</body>
</html>