<?php

namespace spec\MPK\App\Factory;

use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class LineFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Factory\LineFactory');
    }

    function it_implements_line_factory_interface()
    {
        $this->shouldImplement('MPK\App\Factory\LineFactoryInterface');
    }

    function it_creates_line()
    {

    }
}