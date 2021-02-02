<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 08.03.2018
 * Time: 11:06
 */

  abstract class Vehicle implements IFFilters
  {
      private $ID;        //Id
      private $brand;     //Marke
      private $name;      //Name
      private $category;  //Kategorie
      private $price;     //Preis

      public function __construct($ID, $brand, $name, $category, $price)
      {
          $this->setID($ID);
          $this->setBrand($brand);
          $this->setName($name);
          $this->setCategory($category);
          $this->setPrice($price);
      }

      ###########################
      ####Getters und Setters####
      ###########################

      public function getID()
      {
          return $this->ID;
      }

      public function setID($ID)
      {
          if ($ID == '' || !is_numeric($ID) || $ID < 0) {
              throw new Exception('Can not set ID! ID is empty, not a number or smaller then 0!');
          } else {
              $this->ID = $ID;
          }
      }

      //-------------------------------

      public function getBrand()
      {
          return $this->brand;
      }

      public function setBrand($brand)
      {
          if ($brand == '') {
              throw new Exception('Can not set brand! Brand is empty!');
          } else {
              $this->brand = $brand;
          }
      }

      //--------------------------------

      public function getName()
      {
          return $this->name;
      }

      public function setName($name)
      {
          if ($name == '') {
              throw new Exception('Can not set name! Name is empty!');
          } else {
              $this->name = $name;
          }
      }

      //-------------------------------

      public function getCategory()
      {
          return $this->category;
      }

      public function setCategory($category)
      {
          if ($category == 'Bicycle' || $category == 'Motorcycle' || $category == 'EBike') {
              $this->category = $category;
          } else {
              throw new Exception('Can not set category! Category has to be Bicycle, Motorcycle or EBike!');
          }
      }

      //--------------------------------

      public function getPrice()
      {
          return $this->price;
      }

      public function setPrice($price)
      {
          if ($price == '' || !is_numeric($price) || $price < 0) {
              throw new Exception('Can not set price! Price is empty, not a number or smaller then 0!');
          } else {
              $this->price = $price;
          }
      }

      //---------------------------------

      ###############
      ####Methods####
      ###############

      abstract function StringForTable();

      public function FilterCategory($category)
      {
          if ($this->category == $category) {
              return true;
          }
          else {
              return false;
          }
      }

      public function FilterPrice($price)
      {
          if ($this->price <= $price) {
              return true;
          }
          else {
              return false;
          }
      }
  }