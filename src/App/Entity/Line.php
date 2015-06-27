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
     * @var string
     */
    private $name;
    /**
     * @var LineType
     */
    private $lineType;

    /**
     * @return string
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * @param string $line
     */
    public function setLine($line)
    {
        $this->line = $line;
    }

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
     * @return LineType
     */
    public function getLineType()
    {
        return $this->lineType;
    }

    /**
     * @param LineType $lineType
     */
    public function setLineType($lineType)
    {
        $this->lineType = $lineType;
    }
}
