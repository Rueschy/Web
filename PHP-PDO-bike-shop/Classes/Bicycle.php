<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 08.03.2018
 * Time: 11:09
 */

class Bicycle extends Vehicle //implements IFTableString
{
    private $color;     //Farbe
    private $size;      //Größe
    private $brakes;    //Bremsen
    private $shifter;   //Schaltung
    private $fork;      //Federgabel
    private $shock;     //Dämpfer

    public function __construct($ID, $brand, $name, $category, $price, $color, $size, $brakes, $shifter, $fork, $shock)
    {
        parent::__construct($ID, $brand, $name, $category, $price);

        $this->setColor($color);
        $this->setSize($size);
        $this->setBrakes($brakes);
        $this->setShifter($shifter);
        $this->setFork($fork);
        $this->setShock($shock);
    }

    ###########################
    ####Getters and Setters####
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

    public function getFork()
    {
        return $this->fork;
    }

    public function setFork($fork)
    {
        if($fork ==''){
            throw new Exception('Can not set fork! Fork is empty!');
        }
        else{
            $this->fork = $fork;
        }
    }

    //---------------------------------

    public function getShock()
    {
        return $this->shock;
    }

    public function setShock($shock)
    {
        if($shock ==''){
            throw new Exception('Can not set shock! Shock is empty!');
        }
        else{
            $this->shock = $shock;
        }
    }

    ###############
    ####Methods####
    ###############

    public function StringForTable(){

        return 'Color: ' . $this->color . '<br>' . 'Size: ' . $this->size . '<br>' . 'Brakes: ' . $this->brakes . '<br>' . 'Shifter: ' . $this->shifter . '<br>' . 'Fork: ' . $this->fork . '<br>' . 'Shock: ' . $this->shock . '<br>';
    }
}