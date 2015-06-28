<?php

namespace spec\MPK\App\Factory;

use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class StopFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Factory\StopFactory');
    }

    function it_implements_stop_factory_interface()
    {
        $this->shouldImplement('MPK\App\Factory\StopFactoryInterface');
    }
}