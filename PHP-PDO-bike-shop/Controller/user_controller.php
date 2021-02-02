<?php
####create the admin if not exists####
if(!isset($_SESSION['admin'])){

    try{
        $array = $userAdminContainer->getAll();

        //check if admin exists in database
        if(!array_key_exists('admin', $array)){

            $adminPassword = password_hash('ItsTheAdmin', PASSWORD_DEFAULT);
            $admin = new User_Admin('admin', $adminPassword, 'yes');
            $userAdminContainer->add($admin->getName(), $admin->getPassword(), $admin->getAdmin());
        }
        else{

            $admin = $userAdminContainer->get('admin');
        }

        $_SESSION['admin'] = $admin;
    }
    catch (Exception $ex){
        $message = $ex->getMessage();
        require_once 'Views/welcome_view.php';
        return;
    }
}

####Login_View####
if($action == 'login'){
    require_once 'Views/login_view.php';
    return;
}

####Register_View####
if($action == 'register'){
    require_once 'Views/register_view.php';
    return;
}

####User_Register####
if($action == 'do_register'){

    try {
        //check if the key (username) already exists
        if (array_key_exists($_POST['username'], $userCustomerContainer->getAll()) || array_key_exists($_POST['username'], $userAdminContainer->getAll())) {

            $message = 'Username already exists!';
            require_once 'Views/register_view.php';
            return;
        }

        if($_POST['password1'] != $_POST['password2']){

            $message = 'Passwords are not equal!';
            require_once 'Views/register_view.php';
            return;
        }

        if(strlen($_POST['password1']) < 6){

            $message = 'The length of the password must be greater then 6!';
            require_once 'Views/register_view.php';
            return;
        }

        $hash_password = password_hash($_POST['password1'], PASSWORD_DEFAULT);

        $user = new User_Customer($_POST['username'], $hash_password, 'no', $_POST['birthdate'], $_POST['email'], $_POST['balance'] );
        $userCustomerContainer->add($user->getName(), $user->getPassword(), $user->getAdmin(), $user->getBirthdate(), $user->getEmail(), $user->getBalance());
        $userArray[$user->getName()] = $user;
        $_SESSION['user'] = $userArray;

        $message = 'You have registered successfully!';
        require_once 'Views/welcome_view.php';
        return;
    }
    catch (Exception $ex){
        $message = $ex->getMessage();
        require_once 'Views/register_view.php';
        return;
    }
}

####User_Login####
if(isset($_POST['action_do_login'])) {

    try {
        //check if there are some empty input-fields!
        if ($_POST['username'] == '' || $_POST['password'] == '') {
            $message = 'Username or password is empty!';
            require_once 'Views/login_view.php';
            return;
        }

        //check if user exists in userCustomer --> user is a customer
        if (array_key_exists($_POST['username'], $userCustomerContainer->getAll())) {

            $u = $userCustomerContainer->get($_POST['username']);
            //check the password
            if ($u->CheckUser($_POST['password']) == true) {

                $_SESSION['LoggedIn'] = $u;
                $message = 'You have logged in successfully!';
                $displayArray = $vehicleArray;
                require_once 'Views/user_view.php';
                return;
            } else {

                $message = 'Wrong password!';
                require_once 'Views/login_view.php';
                return;
            }
        } //check if user exists in userAdmin --> user is an admin
        elseif (array_key_exists($_POST['username'], $userAdminContainer->getAll())) {

            $u = $userAdminContainer->get($_POST['username']);
            //check the password
            if ($u->CheckUser($_POST['password']) == true) {

                $_SESSION['LoggedIn'] = $u;
                $message = 'You have logged in successfully!';
                $displayArray = $vehicleArray;
                $userArray = $userCustomerContainer->getAll();
                require_once 'Views/admin_view.php';
                return;
            } else {

                $message = 'Wrong password!';
                require_once 'Views/login_view.php';
                return;
            }
        } else {

            $message = 'User does not exists!';
            require_once 'Views/login_view.php';
            return;
        }
    }
    catch(Exception $ex){
            $message = $ex->getMessage();
            require_once 'Views/login_view.php';
            return;
    }
}

####Logout####
if($action =='do_logout'){

    $_SESSION['LoggedIn'] = [];
    require_once 'Views/welcome_view.php';
    return;
}

####add balance####
if($action =='add_balance') {

    try {
        $u = $_SESSION['LoggedIn'];
        if ($_POST['balance'] == '') {

            $message = 'Input-field is empty!';
            $displayArray = $vehicleArray;
            require_once 'Views/user_view.php';
            return;
        }
        else {

            $balance = $_POST['balance'];
            $u->AddBalance($balance);
            $userCustomerContainer->change($u->getName(), $u->getPassword(), $u->getAdmin(), $u->getBirthdate(), $u->getEmail(), $u->getBalance());
            $message = 'Your balance was updated successfully!';
            $displayArray = $vehicleArray;
            require_once 'Views/user_view.php';
            return;
        }
    }
     catch (Exception $ex) {
        $message = $ex->getMessage();
        $u = $_SESSION['LoggedIn'];
        $displayArray = $vehicleArray;
        require_once 'Views/user_view.php';
        return;
    }
}

####delete user####
if($action =='delete_user'){

    try {
        if (!isset($_POST['selection'])) {
            $message = 'Please select a User!';
            $displayArray = $vehicleArray;
            require_once 'Views/admin_view.php';
            return;
        }

        $id = $_POST['selection'];
        $userCustomerContainer->delete($id);
        unset($userArray[$id]);

        $message ='User deleted!';
        $displayArray = $vehicleArray;
        require_once 'Views/admin_view.php';
        return;
    }
    catch (Exception $ex){
        $message = $ex->getMessage();
        $displayArray = $vehicleArray;
        require_once 'Views/admin_view.php';
        return;
    }
}