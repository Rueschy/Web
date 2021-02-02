<?php
$displayArray = [];

####check what vehicle type should be added####
if($action == 'add'){

    if($vehicle == 'B'){

        require_once 'Views/bicycle_view.php';
        return;
    }
    elseif($vehicle == 'M'){

        require_once 'Views/motorcycle_view.php';
        return;
    }
    elseif($vehicle == 'E'){

        require_once 'Views/ebike_view.php';
        return;
    }
}

####add a bicycle####
if($action == 'do_add_bicycle'){

    try {

        $b = new Bicycle($_POST['id'], $_POST['brand'], $_POST['name'], 'Bicycle', $_POST['price'], $_POST['color'], $_POST['size'], $_POST['brakes'], $_POST['shifter'], $_POST['fork'], $_POST['shock']);

        if (array_key_exists($b->getID(), $bicycleContainer->getAll()) || array_key_exists($b->getID(), $motorcycleContainer->getAll()) || array_key_exists($b->getID(), $ebikeContainer->getAll()) || !is_numeric($b->getID())) {

            $message = 'ID already exists or is not a number! Each product must have a unique ID!!!';
            require_once 'Views/bicycle_view.php';
            return;
        }

        $vehicleArray[$b->getID()] = $b;
        $_SESSION['vehicle'] = $vehicleArray;
        $bicycleContainer->add($b->getID(), $b->getBrand(), $b->getName(), $b->getCategory(), $b->getPrice(), $b->getColor(), $b->getSize(), $b->getBrakes(), $b->getShifter(), $b->getFork(), $b->getShock());

        $message = 'You have added the bicycle successfully!';
        $displayArray = $vehicleArray;
        require_once 'Views/admin_view.php';
        return;
    }
    catch(Exception $ex){

        $message = $ex->getMessage();
        require_once 'Views/bicycle_view.php';
        return;
    }
}

####add a motorcycle####
if($action =='do_add_motorcycle'){

    try {

        $m = new Motorcycle($_POST['id'], $_POST['brand'], $_POST['name'], 'Motorcycle', $_POST['price'], $_POST['engine'], $_POST['cubic'], $_POST['power'], $_POST['brakes'], $_POST['suspension'], $_POST['topSpeed']);

        if (array_key_exists($m->getID(), $bicycleContainer->getAll()) || array_key_exists($m->getID(), $motorcycleContainer->getAll()) || array_key_exists($m->getID(), $ebikeContainer->getAll()) || !is_numeric($m->getID())) {

            $message = 'ID already exists or is not a number! Each product must have a unique ID!!!';
            require_once 'Views/motorcycle_view.php';
            return;
        }

        $vehicleArray[$m->getID()] = $m;
        $_SESSION['vehicle'] = $vehicleArray;
        $motorcycleContainer->add($m->getID(), $m->getBrand(), $m->getName(), $m->getCategory(), $m->getPrice(), $m->getEngine(), $m->getCubicCapacity(), $m->getPower(), $m->getBrakes(), $m->getSuspension(), $m->getTopSpeed());

        $message = 'You have added the Motorcycle successfully!';
        $displayArray = $vehicleArray;
        require_once 'Views/admin_view.php';
        return;
    }
    catch(Exception $ex){
        $message = $ex->getMessage();
        require_once 'Views/motorcycle_view.php';
        return;
    }
}

####add a e-bike####
if($action =='do_add_ebike'){

    try {

        $eb = new EBike($_POST['id'], $_POST['brand'], $_POST['name'], 'EBike', $_POST['price'], $_POST['color'], $_POST['size'], $_POST['engine'], $_POST['power'], $_POST['brakes'], $_POST['shifter']);

        if (array_key_exists($eb->getID(), $bicycleContainer->getAll()) || array_key_exists($eb->getID(), $motorcycleContainer->getAll()) || array_key_exists($eb->getID(), $ebikeContainer->getAll()) || !is_numeric($eb->getID())) {

            $message = 'ID already exists or is not a number! Each product must have a unique ID!!!';
            require_once 'Views/ebike_view.php';
            return;
        }

        $vehicleArray[$eb->getID()] = $eb;
        $_SESSION['vehicle'] = $vehicleArray;
        $ebikeContainer->add($eb->getID(), $eb->getBrand(), $eb->getName(), $eb->getCategory(), $eb->getPrice(), $eb->getColor(), $eb->getSize(), $eb->getEngine(), $eb->getPower(), $eb->getBrakes(), $eb->getShifter());

        $message = 'You have added the E-Bike successfully!';
        $displayArray = $vehicleArray;
        require_once 'Views/admin_view.php';
        return;
    }
    catch(Exception $ex){
        $message = $ex->getMessage();
        require_once 'Views/ebike_view.php';
        return;
    }
}

####check what vehicle you want to change####
if($action =='action_change'){

    if(!isset($_POST['selection'])){
        $message = 'Please select a vehicle!';
        $displayArray = $vehicleArray;
        require_once 'Views/admin_view.php';
        return;
    }

    $id = $_POST['selection'];
    $v = $vehicleArray[$id];

    if($v->getCategory() =='Bicycle'){

        require_once 'Views/bicycle_change_view.php';
        return;
    }
    elseif($v->getCategory() =='Motorcycle'){

        require_once 'Views/motorcycle_change_view.php';
        return;
    }
    elseif($v->getCategory() =='EBike'){

        require_once 'Views/ebike_change_view.php';
        return;
    }
}

####change a bicycle####
if($action =='do_change_bicycle'){

    try{
        $v = $vehicleArray[$_POST['id']];

        $v->setBrand($_POST['brand']);
        $v->setName($_POST['name']);
        $v->setPrice($_POST['price']);
        $v->setColor($_POST['color']);
        $v->setSize($_POST['size']);
        $v->setBrakes($_POST['brakes']);
        $v->setShifter($_POST['shifter']);
        $v->setFork($_POST['fork']);
        $v->setShock($_POST['shock']);

        $vehicleArray[$v->getID()] = $v;
        $_SESSION['vehicle'] = $vehicleArray;
        $bicycleContainer->change($v->getID(), $v->getBrand(), $v->getName(), $v->getCategory(), $v->getPrice(), $v->getColor(), $v->getSize(), $v->getBrakes(), $v->getShifter(), $v->getFork(), $v->getShock());

        $message = 'You have changed the Bicycle successfully!';
        $displayArray = $vehicleArray;
        require_once 'Views/admin_view.php';
        return;
    }
    catch (Exception $ex){
        $message = $ex->getMessage();
        require_once 'Views/bicycle_change_view.php';
        return;
    }
}

####change a motorcycle####
if($action =='do_change_motorcycle'){

    try{
        $v = $vehicleArray[$_POST['id']];

        $v->setBrand($_POST['brand']);
        $v->setName($_POST['name']);
        $v->setPrice($_POST['price']);
        $v->setEngine($_POST['engine']);
        $v->setCubicCapacity($_POST['cubic']);
        $v->setPower($_POST['power']);
        $v->setBrakes($_POST['brakes']);
        $v->setSuspension($_POST['suspension']);
        $v->setTopSpeed($_POST['topSpeed']);

        $vehicleArray[$v->getID()] = $v;
        $_SESSION['vehicle'] = $vehicleArray;
        $motorcycleContainer->change($v->getID(), $v->getBrand(), $v->getName(), $v->getCategory(), $v->getPrice(), $v->getEngine(), $v->getCubicCapacity(), $v->getPower(), $v->getBrakes(), $v->getSuspension(), $v->getTopSpeed());

        $message = 'You have changed the Motorcycle successfully!';
        $displayArray = $vehicleArray;
        require_once 'Views/admin_view.php';
        return;
    }
    catch(Exception $ex){
        $message = $ex->getMessage();
        require_once 'Views/bicycle_change_view.php';
        return;
    }
}

####change a e-bike####
if($action =='do_change_ebike'){

    try{
        $v = $vehicleArray[$_POST['id']];

        $v->setBrand($_POST['brand']);
        $v->setName($_POST['name']);
        $v->setPrice($_POST['price']);
        $v->setColor($_POST['color']);
        $v->setSize($_POST['size']);
        $v->setEngine($_POST['engine']);
        $v->setPower($_POST['power']);
        $v->setBrakes($_POST['brakes']);
        $v->setShifter($_POST['shifter']);

        $vehicleArray[$v->getID()] = $v;
        $_SESSION['vehicle'] = $vehicleArray;
        $ebikeContainer->change($v->getID(), $v->getBrand(), $v->getName(), $v->getCategory(), $v->getPrice(), $v->getColor(), $v->getSize(), $v->getEngine(), $v->getPower(), $v->getBrakes(), $v->getShifter());

        $message = 'You have changed the E-Bike successfully!';
        $displayArray = $vehicleArray;
        require_once 'Views/admin_view.php';
        return;
    }
    catch(Exception $ex){
        $message = $ex->getMessage();
        require_once 'Views/ebike_change_view.php';
        return;
    }
}

####delete a vehicle####
if($action =='action_delete'){

    try{
        if(!isset($_POST['selection'])){
            $message = 'Please select a vehicle!';
            $displayArray = $vehicleArray;
            require_once 'Views/admin_view.php';
            return;
        }

        $id = $_POST['selection'];
        $v = $vehicleArray[$id];

        if($v->getCategory() =='Bicycle'){
            $bicycleContainer->delete($id);
        }
        elseif($v->getCategory() =='Motorcycle'){
            $motorcycleContainer->delete($id);
        }
        elseif($v->getCategory() =='EBike'){
            $ebikeContainer->delete($id);
        }

        unset($vehicleArray[$id]);
        $displayArray = $vehicleArray;
        require_once 'Views/admin_view.php';
        return;
    }
    catch(Exception $ex){
        $message = $ex->getMessage();
        $displayArray = $vehicleArray;
        require_once 'Views/admin_view.php';
        return;
    }
}

####buy a vehicle####
if($action =='action_buy'){

    try{
        $u = $_SESSION['LoggedIn'];
        if(!isset($_POST['selection'])){

            $message = 'Please select a vehicle!';
            $displayArray = $vehicleArray;
            require_once 'Views/user_view.php';
            return;
        }
        else{

            $id = $_POST['selection'];
            $vehicleArray = $_SESSION['vehicle'];
            $v = $vehicleArray[$id];

            if($u->DoAccounting($v->getPrice()) == true){

                $userCustomerContainer->change($u->getName(), $u->getPassword(), $u->getAdmin(), $u->getBirthdate(), $u->getEmail(), $u->getBalance());

                if($v->getCategory() =='Bicycle'){
                    $bicycleContainer->delete($id);
                    unset($vehicleArray[$id]);
                    $_SESSION['vehicle'] = $vehicleArray;
                }
                elseif($v->getCategory() =='Motorcycle'){
                    $motorcycleContainer->delete($id);
                    unset($vehicleArray[$id]);
                    $_SESSION['vehicle'] = $vehicleArray;
                }
                elseif($v->getCategory() =='EBike'){
                    $ebikeContainer->delete($id);
                    unset($vehicleArray[$id]);
                    $_SESSION['vehicle'] = $vehicleArray;
                }

                $message ='You bought the vehicle successfully!';
                $displayArray = $vehicleArray;
                require_once 'Views/user_view.php';
                return;
            }
            else{

                $message ='You have not enough money!';
                $displayArray = $vehicleArray;
                require_once 'Views/user_view.php';
                return;
            }
        }
    }
    catch(Exception $ex){
        $message = $ex->getMessage();
        $u = $_SESSION['LoggedIn'];
        $displayArray = $vehicleArray;
        require_once 'Views/user_view.php';
        return;
    }
}

####filter by category####
if($action =='filter_category'){

    try{
        $filterArray = [];
        $c = $_POST['category'];

        if($c =='Bicycle'){
            $filterArray = $bicycleContainer->getAll();
        }
        elseif($c == 'Motorcycle'){
            $filterArray = $motorcycleContainer->getAll();
        }
        elseif($c =='EBike'){
            $filterArray = $ebikeContainer->getAll();
        }
        else{
            $u = $_SESSION['LoggedIn'];
            $displayArray = $vehicleArray;
            $message = 'This category does not exist!';
            require_once 'Views/user_view.php';
            return;
        }

        $_SESSION['filter'] = $filterArray;
        $u = $_SESSION['LoggedIn'];
        $displayArray = $filterArray;
        $message ='Filtered by category!';
        require_once 'Views/user_view.php';
        return;
    }
    catch(Exception $ex){
        $message = $ex->getMessage();
        $u = $_SESSION['LoggedIn'];
        $displayArray = $vehicleArray;
        require_once 'Views/user_view.php';
        return;
    }
}

####filter by price####
if($action =='filter_price'){

    try{
        $filterArray = [];

        if($price ==''){
            $message = 'Input-field is empty!';
            $u = $_SESSION['LoggedIn'];
            $displayArray = $vehicleArray;
            require_once 'Views/user_view.php';
            return;
        }

        foreach ($vehicleArray as $vehicle){

            if($vehicle->FilterPrice($price) == true){

                $filterArray[$vehicle->getID()] = $vehicle;
            }
        }

        $_SESSION['filter'] = $filterArray;
        $u = $_SESSION['LoggedIn'];
        $displayArray = $filterArray;
        $message ='Filtered by price!';
        require_once 'Views/user_view.php';
        return;
    }
    catch(Exception $ex){
        $message = $ex->getMessage();
        $u = $_SESSION['LoggedIn'];
        $displayArray = $vehicleArray;
        require_once 'Views/user_view.php';
        return;
    }
}

####reset filter####
if($action =='reset_filter'){
    $u = $_SESSION['LoggedIn'];
    $displayArray = $vehicleArray;
    $message ='Filter reseted!';
    require_once 'Views/user_view.php';
    return;
}




