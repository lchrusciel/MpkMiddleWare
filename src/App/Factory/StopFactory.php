<?php

namespace MPK\App\Factory;

use MPK\App\Entity\Stop;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class StopFactory implements StopFactoryInterface
{
    /**
     * Creates stop based on given array
     *
     * @param array $rawStop
     *
     * @return Stop
     */
    public function create($rawStop)
    {
        $stop = new Stop();
        $stop->setId($rawStop['id']);
        $stop->setStopNumber($rawStop['stop_number']);
        $stop->setStopStreet($rawStop['stop_street']);

        return $stop;
    }

}