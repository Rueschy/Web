<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 08.03.2018
 * Time: 11:07
 */

class Motorcycle extends Vehicle //implements IFTableString
{
    private $engine;        //Motor
    private $cubicCapacity; //Hubraum
    private $power;         //Leistung
    private $brakes;        //Bremsen
    private $suspension;    //Fahrwerk/Federung
    private $topSpeed;      //Höchstgeschwindigkeit

    public function __construct($ID, $brand, $name, $category, $price, $engine, $cubicCapacity, $power, $brakes, $suspension, $topSpeed)
    {
        parent::__construct($ID, $brand, $name, $category, $price);

        $this->setEngine($engine);
        $this->setCubicCapacity($cubicCapacity);
        $this->setPower($power);
        $this->setBrakes($brakes);
        $this->setSuspension($suspension);
        $this->setTopSpeed($topSpeed);
    }

    ###########################
    ####Getters und Setters####
    ###########################

    public function getEngine()
    {
        return $this->engine;
    }

    public function setEngine($engine)
    {
        if($engine ==''){
            throw new Exception('Can not set engine! Engine is empty!');
        }
        else{
            $this->engine = $engine;
        }
    }

    //----------------------------------

    public function getCubicCapacity()
    {
        return $this->cubicCapacity;
    }

    public function setCubicCapacity($cubicCapacity)
    {
        if($cubicCapacity =='' || !is_numeric($cubicCapacity) || $cubicCapacity < 0){
            throw new Exception('Can not set cubic capacity! Cubic capacity is empty, not a number or smaller then 0!');
        }
        else{
            $this->cubicCapacity = $cubicCapacity;
        }
    }

    //---------------------------------

    public function getPower()
    {
        return $this->power;
    }

    public function setPower($power)
    {
        if($power =='' || !is_numeric($power) || $power < 0){
            throw new Exception('Can not set power! Power is empty, not a number or smaller then 0!');
        }
        else{
            $this->power = $power;
        }
    }

    //----------------------------------

    public function getBrakes()
    {
        return $this->brakes;
    }

    public function setBrakes($brakes)
    {
        if($brakes ==''){
            throw new Exception('Can not set brakes! Brakes is empty!');
        }
        else{
            $this->brakes = $brakes;
        }
    }

    //-----------------------------------

    public function getSuspension()
    {
        return $this->suspension;
    }

    public function setSuspension($suspension)
    {
        if($suspension ==''){
            throw new Exception('Can not set suspension! Suspension is empty!');
        }
        else{
            $this->suspension = $suspension;
        }
    }

    //-----------------------------------

    public function getTopSpeed()
    {
        return $this->topSpeed;
    }

    public function setTopSpeed($topSpeed)
    {
        if($topSpeed =='' || !is_numeric($topSpeed) || $topSpeed < 0){
            throw new Exception('Can not set topspeed! Topspeed is empty, not a number or smaller then 0!');
        }
        else{
            $this->topSpeed = $topSpeed;
        }
    }

    //-----------------------------------

    ###############
    ####Methods####
    ###############

    public function StringForTable(){

        return 'Engine: ' . $this->engine . '<br>' . 'CubicCapacity: ' . $this->cubicCapacity . 'ccm' . '<br>' . 'Power: ' . $this->power . 'kW' . '<br>' . 'Brakes: ' . $this->brakes . '<br>' . 'Suspension: ' . $this->suspension . '<br>' . 'Topspeed: '  . $this->topSpeed . 'km/h' . '<br>';
    }
}