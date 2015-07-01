<?php

namespace spec\MPK\App\Calculator;

use MPK\App\Adapter\StopAdapter;
use MPK\App\Adapter\StopAdapterInterface;
use MPK\App\Entity\Stop;
use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class RouteCalculatorSpec extends ObjectBehavior
{
    function let(StopAdapterInterface $stopAdapter)
    {
        $this->beConstructedWith($stopAdapter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Calculator\RouteCalculator');
    }

    function it_implements_route_calculator_interface()
    {
        $this->shouldHaveType('MPK\App\Calculator\RouteCalculatorInterface');
    }

    function it_calculates_the_shortest_path(
        $stopAdapter,
        Stop $stop1,
        Stop $stop2,
        Stop $stop3,
        Stop $stop4
    )
    {
        $stopAdapter->get('Stop1')->willReturn($stop1);

        $stop1->getStopNumber()->willReturn('StopNumber1');

//        $stopAdapter->getConnectedStops('StopNumber1')->willReturn(array($stop2, $stop3));
    }
}