<?php

namespace MPK\App\Adapter;

use MPK\App\Entity\Connection;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
interface ConnectionAdapterInterface
{
    /**
     * Provides connection for given stop.
     *
     * @param integer $stopNumber
     *
     * @return Connection
     */
    public function getConnection($stopNumber);
}