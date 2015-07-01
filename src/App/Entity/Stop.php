<?php

namespace MPK\App\Entity;

/**
 * @author Łukasz Chruściel <lukasz.chrusciel@lakion.com>
 */
class Stop
{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var integer
     */
    private $serviceLine;
    /**
     * @var integer
     */
    private $stopNumber;
    /**
     * @var string
     */
    private $stopStreet;

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
     * @return Line
     */
    public function getServiceLine()
    {
        return $this->serviceLine;
    }

    /**
     * @param Line $serviceLine
     */
    public function setServiceLine($serviceLine)
    {
        $this->serviceLine = $serviceLine;
    }

    /**
     * @return int
     */
    public function getStopNumber()
    {
        return $this->stopNumber;
    }

    /**
     * @param int $stopNumber
     */
    public function setStopNumber($stopNumber)
    {
        $this->stopNumber = $stopNumber;
    }

    /**
     * @return string
     */
    public function getStopStreet()
    {
        return $this->stopStreet;
    }

    /**
     * @param string $stopStreet
     */
    public function setStopStreet($stopStreet)
    {
        $this->stopStreet = $stopStreet;
    }
}
