<?php

namespace MPK\App\Adapter;
use MPK\App\Entity\Stop;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
interface StopAdapterInterface
{
    /**
     * Gets list of all stops.
     *
     * @return array
     */
    public function getAll();
    /**
     * Gets detailed information for given line.
     *
     * @param integer $stopId
     *
     * @return Stop
     */
    public function get($stopId);
    /**
     * Gets all stops for given line.
     *
     * @param integer $lineId
     *
     * @return array
     */
    public function getStopsForLine($lineId);
}
