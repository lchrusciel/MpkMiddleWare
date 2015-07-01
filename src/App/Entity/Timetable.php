<?php

namespace MPK\App\Entity;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class Timetable
{
    /**
     * @var string
     */
    private $dayType;
    /**
     * @var string
     */
    private $timetable;
    /**
     * @var Stop
     */
    private $stop;
    /**
     * @var Line
     */
    private $line;

    /**
     * @return string
     */
    public function getDayType()
    {
        return $this->dayType;
    }

    /**
     * @param string $dayType
     */
    public function setDayType($dayType)
    {
        $this->dayType = $dayType;
    }

    /**
     * @return string
     */
    public function getTimetable()
    {
        return $this->timetable;
    }

    /**
     * @param string $timetable
     */
    public function setTimetable($timetable)
    {
        $this->timetable = $timetable;
    }

    /**
     * @return Stop
     */
    public function getStop()
    {
        return $this->stop;
    }

    /**
     * @param Stop $stop
     */
    public function setStop(Stop $stop)
    {
        $this->stop = $stop;
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
