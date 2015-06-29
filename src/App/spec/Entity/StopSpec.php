<?php

namespace spec\MPK\App\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use MPK\App\Entity\Line;

class StopSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Entity\Stop');
    }

    function it_has_id()
    {
        $this->setId(1);
        $this->getId()->shouldReturn(1);
    }

    function it_has_service_line(Line $line)
    {
        $this->setServiceLine($line);
        $this->getServiceLine()->shouldReturn($line);
    }

    function it_has_stop_number()
    {
        $this->setStopNumber(1);
        $this->getStopNumber()->shouldReturn(1);
    }

    function it_has_stop_street()
    {
        $this->setStopStreet('Felińskiego/Kadłubka');
        $this->getStopStreet()->shouldReturn('Felińskiego/Kadłubka');
    }
}
