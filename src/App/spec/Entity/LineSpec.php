<?php

namespace spec\MPK\App\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use MPK\App\Entity\LineType;

class LineSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Entity\Line');
    }

    function it_has_line()
    {
        $this->setLine('77');
        $this->getLine()->shouldReturn('77');
    }

    function it_has_id()
    {
        $this->setId(1);
        $this->getId()->shouldReturn(1);
    }

    function it_has_type()
    {
        $this->setType(0);
        $this->getType()->shouldReturn(0);
    }
}
