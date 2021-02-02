<!DOCTYPE html>
<html>
<body>

<h1>Register-Page</h1>
<form method="post">
    <label>Username: </label><label><input type="text" name="username" placeholder="Max (Mustermann)" value="<?php if(isset($_POST['username'])){echo $_POST['username'];}?>"></label><br>
    <label>Password: </label><label><input type="password" name="password1" value="<?php if(isset($_POST['password1'])){echo $_POST['password2'];}?>"></label><br>
    <label>Repeat Password: </label><label><input type="password" name="password2" value="<?php if(isset($_POST['password2'])){echo $_POST['password2'];}?>"></label><br>
    <label>Birthdate: </label><label><input type="date" name="birthdate" value="<?php if(isset($_POST['birthdate'])){echo $_POST['birthdate'];}?>"></label><br>
    <label>Email: </label><label><input type="text" name="email" placeholder="max@mustermann.com" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>"></label><br>
    <label>Balance: </label><label><input type="text" name="balance" placeholder="€" value="<?php if(isset($_POST['balance'])){echo $_POST['balance'];}?>"></label><br><br>

    <label><input type="submit" name="action_do_register" value="Register"></label>
    <label><input type="submit" name="action_cancel" value="Cancel"></label>
</form>

<p>
    <?php echo $message;?>
</p>

</body>
</html>