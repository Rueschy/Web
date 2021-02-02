<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 08.03.2018
 * Time: 11:10
 */

class EBike extends Vehicle //implements IFTableString
{
    private $color;     //Farbe
    private $size;      //Größe
    private $engine;    //Elektromotor
    private $power;     //Leistung
    private $brakes;    //Bremsen
    private $shifter;   //Schaltung

    public function __construct($ID, $brand, $name, $category, $price, $color, $size, $engine, $power, $brakes, $shifter)
    {
        parent::__construct($ID, $brand, $name, $category, $price);

        $this->setColor($color);
        $this->setSize($size);
        $this->setEngine($engine);
        $this->setPower($power);
        $this->setBrakes($brakes);
        $this->setShifter($shifter);
    }

    ###########################
    ####Getters und Setters####
    ###########################

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        if($color ==''){
            throw new Exception('Can not set color! Color is empty!');
        }
        else{
            $this->color = $color;
        }
    }

    //---------------------------------

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        if($size =='S' || $size =='M' || $size =='L'){
            $this->size = $size;
        }
        else{
            throw new Exception('Can not set size! Size has to be S, M or L!');
        }
    }

    //---------------------------------

    public function getEngine()
    {
        return $this->engine;
    }

    public function setEngine($engine)
    {
        if($engine ==''){
            throw new Exception('Can not set engine! Engine is emtpy!');
        }
        else{
            $this->engine = $engine;
        }
    }

    //---------------------------------

    public function getPower()
    {
        return $this->power;
    }

    public function setPower($power)
    {
        if($power ==''  || !is_numeric($power) || $power < 0){
            throw new Exception('Can not set power! Power is empty, not a number or smaller then 0!');
        }
        else{
            $this->power = $power;
        }
    }

    //---------------------------------

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

    //----------------------------------

    public function getShifter()
    {
        return $this->shifter;
    }

    public function setShifter($shifter)
    {
        if($shifter ==''){
            throw new Exception('Can not set shifter! Shifter is empty!');
        }
        else{
            $this->shifter = $shifter;
        }

    }

    //----------------------------------

    ###############
    ####Methods####
    ###############

    public function StringForTable(){

        return 'Color: ' . $this->color . '<br>' . 'Size: ' . $this->size . '<br>' . 'Engine: ' . $this->engine . '<br>' . 'Power: ' . $this->power . 'kW' . '<br>' . 'Brakes: ' . $this->brakes . '<br>' . 'Shifter: ' . $this->shifter . '<br>';
    }
}