<!DOCTYPE html>
<html>
<body>

    <h1>Login-Page</h1>
    <form method="post">
        <label>Username: </label><label><input type="text" name="username"></label><br>
        <label>Password: </label><label><input type="password" name="password"></label><br><br>

        <label><input type="submit" name="action_do_login" value="Login"></label>
        <label><input type="submit" name="action_cancel" value="Cancel"></label>
    </form>

    <p>
        <?php echo $message;?>
    </p>

</body>
</html>