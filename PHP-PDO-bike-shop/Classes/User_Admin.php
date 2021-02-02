<?php

class User_Admin extends User
{
   public function __construct($name, $password, $admin)
   {
       parent::__construct($name, $password, $admin);
   }

    ###############
    ####Methods####
    ###############

    public function CheckUser($password){

        if(password_verify($password, parent::getPassword())){
            return true;
        }
        else{
            return false;
        }
    }
}