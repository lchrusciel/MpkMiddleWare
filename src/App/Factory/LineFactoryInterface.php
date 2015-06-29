<?php

namespace MPK\App\Factory;

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
