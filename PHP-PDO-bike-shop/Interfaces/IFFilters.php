<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 15.04.2018
 * Time: 16:53
 */

interface IFFilters
{
    public function FilterCategory($category);

    public function FilterPrice($price);
}