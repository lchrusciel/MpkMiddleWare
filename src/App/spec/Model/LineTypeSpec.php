<?php

namespace spec\MPK\App\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LineTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Model\LineType');
    }

    function it_has_id()
    {
        $this->setId(1);
        $this->getId()->shouldReturn(1);
    }

    function it_has_name()
    {
        $this->setId('Bus');
        $this->getId()->shouldReturn('Bus');
    }
}
