<?php

namespace MPK\App\Adapter;

use MPK\App\Entity\Line;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
interface LineAdapterInterface
{
    /**
     * Gets list of all lines.
     *
     * @return array
     */
    public function getAll();
    /**
     * Gets detailed information for given line.
     *
     * @param integer $lineId
     *
     * @return Line
     */
    public function get($lineId);
}
