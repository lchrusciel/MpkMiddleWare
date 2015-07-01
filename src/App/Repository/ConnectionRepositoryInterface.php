<?php

namespace MPK\App\Repository;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
interface ConnectionRepositoryInterface
{
    /**
     * Gets connection from given stop number from database.
     *
     * @param integer $stopNumber
     *
     * @return array
     */
    public function get($stopNumber);
}