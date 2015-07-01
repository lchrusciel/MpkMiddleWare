<?php

namespace spec\MPK\App\Calculator;

use MPK\App\Adapter\ConnectionAdapterInterface;
use MPK\App\Adapter\StopAdapterInterface;
use MPK\App\Entity\Connection;
use MPK\App\Entity\Stop;
use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class RouteCalculatorSpec extends ObjectBehavior
{
    function let(StopAdapterInterface $stopAdapter, ConnectionAdapterInterface $connectionAdapter)
    {
        $this->beConstructedWith($stopAdapter, $connectionAdapter);
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
        $connectionAdapter,
        Stop $stop1,
        Connection $connection1,
        Connection $connection2,
        Connection $connection3,
        Connection $connection4,
        Stop $stop2,
        Stop $stop3,
        Stop $stop4
    )
    {
        $stopAdapter->get('StopNumber1')->willReturn($stop1);
        $stopAdapter->getAll()->willReturn(array($stop1,$stop2,$stop3,$stop4));

        $stop1->getStopNumber()->willReturn('StopNumber1');
        $stop2->getStopNumber()->willReturn('StopNumber2');
        $stop3->getStopNumber()->willReturn('StopNumber3');
        $stop4->getStopNumber()->willReturn('StopNumber4');

        $connectionAdapter->getConnection('StopNumber1')->willReturn(array($connection1, $connection2));
        $connectionAdapter->getConnection('StopNumber2')->willReturn(array($connection3));
        $connectionAdapter->getConnection('StopNumber3')->willReturn(array($connection4));
        $connectionAdapter->getConnection('StopNumber4')->willReturn(array());

        $connection1->getTravelTime()->willReturn(60);
        $connection1->setTravelTime(60)->shouldBeCalled();
        $connection1->getDestinationStop()->willReturn($stop2);
        $connection2->getTravelTime()->willReturn(120);
        $connection2->setTravelTime(120)->shouldBeCalled();
        $connection2->getDestinationStop()->willReturn($stop3);
        $connection3->getTravelTime()->willReturn(280, 340);
        $connection3->setTravelTime(340)->shouldBeCalled();
        $connection3->getDestinationStop()->willReturn($stop4);
        $connection4->getTravelTime()->willReturn(60, 180);
        $connection4->setTravelTime(180)->shouldBeCalled();
        $connection4->getDestinationStop()->willReturn($stop4);

        $this->getConnectionFromStop('StopNumber1')->shouldReturn(array(
            'StopNumber2' => $connection1,
            'StopNumber3' => $connection2,
            'StopNumber4' => $connection4,
        ));
    }
}