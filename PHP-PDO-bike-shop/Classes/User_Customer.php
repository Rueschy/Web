<?php

class User_Customer extends User implements IFAccounting
{
    private $birthdate;
    private $email;
    private $balance;

    public function __construct($name, $password, $admin, $birthdate, $email, $balance)
    {
        parent::__construct($name, $password, $admin);

        $this->setBirthdate($birthdate);
        $this->setEmail($email);
        $this->setBalance($balance);
    }

    ###########################
    ####Getters und Setters####
    ###########################

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        if($email =='' || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception('Can not set email! Email is empty or not valid!');
        }
        elseif(strlen($email) > 20){
            throw new Exception('Can not set such a long email!');
        }
        else{
            $this->email = $email;
        }
    }

    //----------------------------------

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function setBirthdate($birthdate)
    {
        if($birthdate ==''){
            throw new Exception('Can not set birthdate! Birthdate is empty!');
        }
        else{
            $this->birthdate = $birthdate;
        }
    }

    //----------------------------------

    public function getBalance()
    {
        return $this->balance;
    }

    public function setBalance($balance)
    {
        if($balance =='' || !is_numeric($balance) || $balance < 0){
            throw new Exception('Can not set balance! Balance is empty, not a number or smaller then 0!');
        }
        elseif (strlen($balance) > 6){
            throw new Exception('Can not set such a big balance!');
        }
        else{
            $this->balance = $balance;
        }
    }

    //----------------------------------

    ###############
    ####Methods####
    ###############

    public function DoAccounting($price)
    {
        if($this->balance - $price < 0){

            return false;
        }
        else{
            $this->balance = $this->balance - $price;
            return true;
        }
    }

    public function AddBalance($balance)
    {
        if($balance =='' || !is_numeric($balance) || $balance < 0){
            throw new Exception('Balance is empty, not a number or smaller then 0!');
        }
        elseif(strlen($balance . $this->balance) > 6){
            throw new Exception('Can not add such a big balance!');
        }
        else{
            $this->balance = $this->balance + $balance;
        }
    }

    public function CheckUser($password){

        if(password_verify($password, parent::getPassword())){
            return true;
        }
        else{
            return false;
        }
    }
}