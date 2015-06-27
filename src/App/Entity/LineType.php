<?php

namespace MPK\App\Entity;
use Doctrine\Common\Collections\Collection;

/**
 * @author Łukasz Chruściel <lukasz.chrusciel@lakion.com>
 */
class LineType
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
     * @var Collection
     */
    private $lines;

    /**
     * @return Collection
     */
    public function getLines()
    {
        return $this->lines;
    }

    /**
     * @param Collection $lines
     */
    public function setLines($lines)
    {
        $this->lines = $lines;
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
