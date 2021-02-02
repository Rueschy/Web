<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 08.03.2018
 * Time: 11:58
 */

abstract class User
{
    private $name;
    private $password;
    private $admin = false;

    public function __construct($name, $password, $admin)
    {
        $this->setName($name);
        $this->setPassword($password);
        $this->setAdmin($admin);
    }

    ###########################
    ####Getters und Setters####
    ###########################

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if($name ==''){
            throw new Exception('Can not set name! Name is empty!');
        }
        elseif(strlen($name) > 20){
            throw new Exception('Can not set such a long name!');
        }
        else{
            $this->name = $name;
        }

    }

    //---------------------------------

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        if($password ==''){
            throw new Exception('Can not set password! Password is empty!');
        }
        else{
            $this->password = $password;
        }
    }

    //----------------------------------



    public function getAdmin()
    {
        return $this->admin;
    }

    public function setAdmin($admin)
    {
        if($admin =='yes' || $admin =='no'){
            $this->admin = $admin;
        }
        else{
            throw new Exception('Can not set Admin! It has to be `yes` or `no`!');
        }
    }

    //----------------------------------

    ###############
    ####Methods####
    ###############

    abstract function CheckUser($password);
}