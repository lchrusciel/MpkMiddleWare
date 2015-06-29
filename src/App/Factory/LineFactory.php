<?php

namespace MPK\App\Factory;

use MPK\App\Entity\Line;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class LineFactory implements LineFactoryInterface
{

    public function createLineWithStops($argument1)
    {
        return $argument1;
    }

    /**
     * {@inheritdoc}
     */
    public function createLine(array $rawLine)
    {
        $line = new Line();

        $line->setId($rawLine['line_id']);
        $line->setLine($rawLine['line']);
        $line->setType($rawLine['type']);

        return $line;
    }
}
