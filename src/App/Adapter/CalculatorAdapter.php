<?php

namespace MPK\App\Adapter;

use MPK\App\Calculator\RouteCalculatorInterface;
use MPK\App\Entity\Connection;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class CalculatorAdapter implements CalculatorAdapterInterface
{
    /**
     * @var RouteCalculatorInterface
     */
    private $calculator;

    /**
     * CalculatorAdapter constructor.
     * @param RouteCalculatorInterface $calculator
     */
    public function __construct(RouteCalculatorInterface $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * {@inheritdoc}
     */
    public function getShortestPath($srcStopNumber, $dstStopNumber)
    {
        $connections = $this->calculator->getConnectionFromStop($srcStopNumber);

        return $connections[$dstStopNumber];
    }
}
