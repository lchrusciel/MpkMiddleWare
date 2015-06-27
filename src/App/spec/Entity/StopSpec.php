<?php

namespace spec\MPK\App\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StopSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Entity\Stop');
    }
}
