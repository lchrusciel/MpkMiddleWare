<?php

namespace MPK\App\Factory;

use MPK\App\Entity\Line;

interface LineFactoryInterface
{
    /**
     * Creates line based on given array
     *
     * @param array $rawLine
     *
     * @return Line
     */
    public function createLine(array $rawLine);

    public function createLineWithStops($argument1);

}
