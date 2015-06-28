<?php

namespace MPK\App\Entity;

/**
 * @author Łukasz Chruściel <lukasz.chrusciel@lakion.com>
 */
class Stop
{
    /**
     * @var Line
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
     * @return Line
     */
    public function getServiceLine()
    {
        return $this->serviceLine;
    }

    /**
     * @param Line $serviceLine
     */
    public function setServiceLine(Line $serviceLine)
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
