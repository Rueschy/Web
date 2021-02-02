<?php
$action = '';
$message = '';

####Database Container####
try{
    $userCustomerContainer = new UserCustomerContainer();
    $userAdminContainer = new UserAdminContainer();
    $bicycleContainer = new BicycleContainer();
    $motorcycleContainer = new MotorcycleContainer();
    $ebikeContainer = new EBikeContainer();
}
catch(Exception $ex){
    $message = $ex->getMessage();
    require_once 'Views/welcome_view.php';
    return;
}

//------USER ARRAY------
if(!isset($_SESSION['user'])){
    $userArray = $userCustomerContainer->getAll();
    $_SESSION['user'] = $userArray;
}

//------VEHICLE ARRAY---------
if(!isset($_SESSION['vehicle'])){
    $vehicleArray = [];
    $vehicleArray += $bicycleContainer->getAll();
    $vehicleArray += $ebikeContainer->getAll();
    $vehicleArray += $motorcycleContainer->getAll();
    $_SESSION['vehicle'] = $vehicleArray;
}

//------FILTER ARRAY---------
if(!isset($_SESSION['filter'])){
    $filterArray = [];
    $_SESSION['filter'] = $filterArray;
}

//------CLEAR SESSION------
if(isset($_POST['action_destroy'])){
    $_SESSION[] = [];
    session_destroy();
    require_once 'Views/welcome_view.php';
    return;
}

$userArray = &$_SESSION['user'];
$vehicleArray = &$_SESSION['vehicle'];
$filterArray = &$_SESSION['filter'];

############
####User####
############

####check the buttons for login and register####
if(isset($_POST['action_login'])){
    $action = 'login';
    require_once 'Controller/user_controller.php';
    return;
}
if(isset($_POST['action_do_login'])){
    $action = 'do_login';
    require_once 'Controller/user_controller.php';
    return;
}
if(isset($_POST['action_register'])){
    $action = 'register';
    require_once 'Controller/user_controller.php';
    return;
}
if(isset($_POST['action_do_register'])){
    $action = 'do_register';
    require_once 'Controller/user_controller.php';
    return;
}
if(isset($_POST['action_logout'])){
    $action ='do_logout';
    require_once 'Controller/user_controller.php';
    return;
}

####Add Balance####
if(isset($_POST['action_add_balance'])){
    $action ='add_balance';
    require_once 'Controller/user_controller.php';
    return;
}

####Delete User####
if(isset($_POST['action_delete_user'])){
    $action ='delete_user';
    require_once 'Controller/user_controller.php';
    return;
}

####Cancel Login or Register####
if(isset($_POST['action_cancel'])){
    require_once 'Views/welcome_view.php';
    return;
}

###############
####Vehicle####
###############

####add a vehicle####
if(isset($_POST['action_add'])){
    $action = 'add';
    $vehicle = $_POST['vehicle'];
    require_once 'Controller/vehicle_controller.php';
    return;
}
if(isset($_POST['action_do_add_bicycle'])){
    $action = 'do_add_bicycle';
    require_once 'Controller/vehicle_controller.php';
    return;
}
if(isset($_POST['action_do_add_motorcycle'])){
    $action = 'do_add_motorcycle';
    require_once 'Controller/vehicle_controller.php';
    return;
}
if(isset($_POST['action_do_add_ebike'])){
    $action = 'do_add_ebike';
    require_once 'Controller/vehicle_controller.php';
    return;
}
if(isset($_POST['action_add_cancel'])){
    $displayArray = $vehicleArray;
    require_once 'Views/admin_view.php';
    return;
}

####change a vehicle####
if(isset($_POST['action_change'])){
    $action = 'action_change';
    require_once 'Controller/vehicle_controller.php';
    return;
}
if(isset($_POST['action_do_change_bicycle'])){
    $action = 'do_change_bicycle';
    require_once 'Controller/vehicle_controller.php';
    return;
}
if(isset($_POST['action_do_change_motorcycle'])){
    $action = 'do_change_motorcycle';
    require_once 'Controller/vehicle_controller.php';
    return;
}
if(isset($_POST['action_do_change_ebike'])){
    $action = 'do_change_ebike';
    require_once 'Controller/vehicle_controller.php';
    return;
}

####delete a vehicle####
if(isset($_POST['action_delete'])){
    $action = 'action_delete';
    require_once 'Controller/vehicle_controller.php';
    return;
}

####buy a vehicle####
if(isset($_POST['action_buy'])){
    $action ='action_buy';
    require_once 'Controller/vehicle_controller.php';
    return;
}

####filter by category####
if(isset($_POST['action_filter_category'])){
    $action = 'filter_category';
    require_once 'Controller/vehicle_controller.php';
    return;
}

####filter by price####
if(isset($_POST['action_filter_price'])){
    $action ='filter_price';
    $price = $_POST['price'];
    require_once 'Controller/vehicle_controller.php';
    return;
}

####reset filter####
if(isset($_POST['action_reset'])){
    $action = 'reset_filter';
    require_once 'Controller/vehicle_controller.php';
    return;
}

require_once 'Views/welcome_view.php';