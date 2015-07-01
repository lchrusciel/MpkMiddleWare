<?php
/**
 * Created by PhpStorm.
 * User: chrustu
 * Date: 01.07.2015
 * Time: 19:01
 */
namespace MPK\App\Calculator;


/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
interface RouteCalculatorInterface
{
    /**
     * Provides information about all possible connections from given stop.
     *
     * @param integer $stopNumber
     *
     * @return array
     */
    public function getConnectionFromStop($stopNumber);
}