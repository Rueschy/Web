<!DOCTYPE html>
<html>
<body>

    <h1>Rüschys Bike-Shop!</h1>
    <p>
        ############################################################<br><br>
        > Welcome to my Shop!<br>
        > Please login if you want to buy something!<br>
        > If you don't have an account, please register!<br>
        > In my shop you can find bicycles, motorcycles and e-bikes!<br><br>
        ############################################################<br>
    </p>

    <form method="post">
        <label><input type="submit" name="action_login" value="Login"></label>
        <label><input type="submit" name="action_register" value="Register"></label>
    </form>

    <p>
        <?php echo $message;?>
    </p>
</body>
</html>