<?php

namespace spec\MPK\App\Adapter;

use MPK\App\Calculator\RouteCalculatorInterface;
use MPK\App\Entity\Connection;
use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class CalculatorAdapterSpec extends ObjectBehavior
{
    function let(RouteCalculatorInterface $calculator)
    {
        $this->beConstructedWith($calculator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Adapter\CalculatorAdapter');
    }

    function it_implements_calculator_adapter_interface()
    {
        $this->shouldImplement('MPK\App\Adapter\CalculatorAdapterInterface');
    }

    function it_choose_shortest_path_to_destination_stop(
        $calculator,
        Connection $connection1,
        Connection $connection2,
        Connection $connection3
    )
    {
        $calculator->getConnectionFromStop('SrcStop')->willReturn(
            array(
                'Stop1' => $connection1,
                'DstStop' => $connection2,
                'Stop2' => $connection3,
            )
        );

        $this->getShortestPath('SrcStop', 'DstStop')->shouldReturn($connection2);
    }
}