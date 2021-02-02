<?php
require_once 'Interfaces/IFAccounting.php';
require_once 'Interfaces/IFFilters.php';
require_once 'Classes/Vehicle.php';
require_once 'Classes/Motorcycle.php';
require_once 'Classes/Bicycle.php';
require_once 'Classes/EBike.php';
require_once 'Classes/User.php';
require_once 'Classes/Database/PDOConnection.php';
require_once 'Classes/Database/UserCustomerContainer.php';
require_once 'Classes/Database/UserAdminContainer.php';
require_once 'Classes/Database/BicycleContainer.php';
require_once 'Classes/Database/MotorcycleContainer.php';
require_once 'Classes/Database/EBikeContainer.php';

session_start();

require_once 'Controller/base_controller.php';