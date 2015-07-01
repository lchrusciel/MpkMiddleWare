<?php

namespace spec\MPK\App\Entity;

use MPK\App\Entity\Line;
use MPK\App\Entity\Stop;
use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class ConnectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Entity\Connection');
    }

    function it_has_source_stop(Stop $stop)
    {
        $this->setSourceStop($stop);
        $this->getSourceStop()->shouldReturn($stop);
    }

    function it_has_destination_stop(Stop $stop)
    {
        $this->setDestinationStop($stop);
        $this->getDestinationStop()->shouldReturn($stop);
    }

    function it_has_travel_time()
    {
        $this->setTravelTime(100);
        $this->getTravelTime()->shouldReturn(100);
    }

    function it_has_line(Line $line)
    {
        $this->setLine($line);
        $this->getLine()->shouldReturn($line);
    }
}
