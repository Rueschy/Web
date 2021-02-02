<!DOCTYPE html>
<html>
<body>

    <h1>Add Bicycle</h1>
    <form method="post">
        <label>ID: </label> <label><input type="text" name="id" value="<?php if(isset($_POST['id'])){echo $_POST['id'];}?>"></label><br>
        <label>Brand: </label> <label><input type="text" name="brand" value="<?php if(isset($_POST['brand'])){echo $_POST['brand'];}?>"></label><br>
        <label>Name: </label> <label><input type="text" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>"></label><br>
        <label>Price: </label> <label><input type="text" name="price" value="<?php if(isset($_POST['price'])){echo $_POST['price'];}?>"></label><br>
        <label>Color: </label> <label><input type="text" name="color" value="<?php if(isset($_POST['color'])){echo $_POST['color'];}?>"></label><br>
        <label>Size: </label> <label><input type="text" name="size" placeholder="S, M, L" value="<?php if(isset($_POST['size'])){echo $_POST['size'];}?>"></label><br>
        <label>Brakes: </label> <label><input type="text" name="brakes" value="<?php if(isset($_POST['brakes'])){echo $_POST['brakes'];}?>"></label><br>
        <label>Shifter: </label> <label><input type="text" name="shifter" value="<?php if(isset($_POST['shifter'])){echo $_POST['shifter'];}?>"></label><br>
        <label>Fork: </label> <label><input type="text" name="fork" value="<?php if(isset($_POST['fork'])){echo $_POST['fork'];}?>"></label><br>
        <label>Shock: </label> <label><input type="text" name="shock" value="<?php if(isset($_POST['shock'])){echo $_POST['shock'];}?>"></label><br><br>

        <label><input type="submit" name="action_do_add_bicycle" value="Add"></label>
        <label><input type="submit" name="action_add_cancel" value="Cancel"></label>
    </form>

    <p>
        <?php echo $message;?>
    </p>

</body>
</html>