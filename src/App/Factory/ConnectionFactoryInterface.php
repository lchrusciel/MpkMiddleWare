<?php

namespace MPK\App\Factory;

use MPK\App\Entity\Connection;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
interface ConnectionFactoryInterface
{
    /**
     * Creates connection object based on given array.
     *
     * @param array $rawConnection
     *
     * @return Connection
     */
    public function create(array $rawConnection);
}