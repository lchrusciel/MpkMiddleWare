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
}
