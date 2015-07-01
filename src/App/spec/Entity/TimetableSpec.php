<?php

namespace spec\MPK\App\Entity;

use MPK\App\Entity\Line;
use MPK\App\Entity\Stop;
use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class TimetableSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Entity\Timetable');
    }

    function it_has_day_type()
    {
        $this->setDayType('wrokDay');
        $this->getDayType()->shouldReturn('wrokDay');
    }

    function it_has_timetable()
    {
        $this->setTimetable('timetable');
        $this->getTimetable()->shouldReturn('timetable');
    }

    function it_has_stop(Stop $stop)
    {
        $this->setStop($stop);
        $this->getStop()->shouldReturn($stop);
    }

    function it_has_line(Line $line)
    {
        $this->setTimetable($line);
        $this->getTimetable()->shouldReturn($line);
    }
}