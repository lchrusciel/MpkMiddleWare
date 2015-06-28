<?php

namespace spec\MPK\App\Repository;

use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class StopRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Repository\StopRepository');
    }

    function it_implements_stop_repository_interface()
    {
        $this->shouldImplement('MPK\App\Repository\StopRepositoryInterface');
    }
}