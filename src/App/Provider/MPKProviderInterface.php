<?php

namespace MPK\App\Provider;
use Doctrine\Common\Collections\Collection;
use MPK\App\Adapter\LineAdapterInterface;
use MPK\App\Adapter\StopAdapterInterface;
use MPK\App\Entity\Line;
use MPK\App\Entity\Stop;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
interface MPKProviderInterface
{
    /**
     * Get list of all lines.
     *
     * @return array
     */
    public function getAllLines();
    /**
     * Get detailed information about given line.
     *
     * @param integer $lineId
     *
     * @return Line
     */
    public function getLine($lineId);
    /**
     * Get list of all stops.
     *
     * @return array
     */
    public function getAllStops();
    /**
     * TODO add info here
     *
     * @param integer $stopId
     *
     * @return Stop
     */
    public function getStop($stopId);
}
