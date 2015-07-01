<?php

namespace MPK\App\Entity;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class Connection
{
    /**
     * @var Stop
     */
    private $sourceStop;
    /**
     * @var Stop
     */
    private $destinationStop;
    /**
     * @var integer
     */
    private $travelTime;
    /**
     * @var Line
     */
    private $line;

    /**
     * @return Stop
     */
    public function getSourceStop()
    {
        return $this->sourceStop;
    }

    /**
     * @param Stop $sourceStop
     */
    public function setSourceStop(Stop $sourceStop)
    {
        $this->sourceStop = $sourceStop;
    }

    /**
     * @return Stop
     */
    public function getDestinationStop()
    {
        return $this->destinationStop;
    }

    /**
     * @param Stop $destinationStop
     */
    public function setDestinationStop(Stop $destinationStop)
    {
        $this->destinationStop = $destinationStop;
    }

    /**
     * @return int
     */
    public function getTravelTime()
    {
        return $this->travelTime;
    }

    /**
     * @param int $travelTime
     */
    public function setTravelTime($travelTime)
    {
        $this->travelTime = $travelTime;
    }

    /**
     * @return Line
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * @param Line $line
     */
    public function setLine(Line $line)
    {
        $this->line = $line;
    }

}
