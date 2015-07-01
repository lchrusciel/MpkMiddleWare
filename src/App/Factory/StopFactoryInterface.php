<?php

namespace MPK\App\Factory;

use MPK\App\Entity\Stop;

interface StopFactoryInterface
{
    /**
     * Creates stop based on given array
     *
     * @param array $rawStop
     *
     * @return Stop
     */
    public function create($rawStop);
    /**
     * Creates source stop for connection.
     *
     * @param array $rawStop
     *
     * @return Stop
     */
    public function createSource(array $rawStop);
    /**
     * Creates destination stop for connection.
     *
     * @param array $rawStop
     *
     * @return Stop
     */
    public function createDestination(array $rawStop);
}
