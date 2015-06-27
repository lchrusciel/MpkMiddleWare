<?php

namespace spec\MPK\App\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use MPK\App\Model\LineType;

class LineSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Model\Line');
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

    function it_has_type(LineType $lineType)
    {
        $this->setType($lineType);
        $this->getType()->shouldReturn($lineType);
    }
}
