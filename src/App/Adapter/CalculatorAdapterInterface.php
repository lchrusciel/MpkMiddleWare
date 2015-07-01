<?php

namespace MPK\App\Adapter;

use MPK\App\Entity\Connection;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
interface CalculatorAdapterInterface
{
    /**
     * Calculates shortest path between two stops.
     *
     * @param integer $srcStopNumber
     * @param integer $dstStopNumber
     *
     * @return Connection
     */
    public function getShortestPath($srcStopNumber, $dstStopNumber);
}