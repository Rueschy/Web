<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 20.03.2018
 * Time: 19:52
 */

interface IFAccounting
{
    public function DoAccounting($price);

    public function AddBalance($balance);
}