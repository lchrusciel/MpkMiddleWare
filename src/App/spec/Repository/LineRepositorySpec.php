<?php

namespace spec\MPK\App\Repository;

use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class LineRepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Repository\LineRepository');
    }

    function it_implements_line_repository_interface()
    {
        $this->shouldImplement('MPK\App\Repository\LineRepositoryInterface');
    }
}