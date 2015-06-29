<?php

namespace MPK\App\Entity;

/**
 * @author Łukasz Chruściel <lukasz.chrusciel@lakion.com>
 */
class Line
{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var integer
     */
    private $line;
    /**
     * @var string
     */
    private $type;
    /**
     * @var array
     */
    private $stops;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * @param int $line
     */
    public function setLine($line)
    {
        $this->line = $line;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return array
     */
    public function getStops()
    {
        return $this->stops;
    }

    /**
     * @param array $stops
     */
    public function setStops(array $stops)
    {
        $this->stops = $stops;
    }
}
