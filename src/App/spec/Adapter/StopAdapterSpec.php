<?php

namespace spec\MPK\App\Adapter;

use PhpSpec\ObjectBehavior;
use MPK\App\Repository\StopRepositoryInterface;
use MPK\App\Factory\StopFactoryInterface;
use MPK\App\Entity\Stop;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class StopAdapterSpec extends ObjectBehavior
{
    function let(
        StopFactoryInterface $stopFactory,
        StopRepositoryInterface $stopRepository
    )
    {
        $this->beConstructedWith(
            $stopFactory,
            $stopRepository
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Adapter\StopAdapter');
    }

    function it_implementes_stop_adapter_interface()
    {
        $this->shouldImplement('MPK\App\Adapter\StopAdapterInterface');
    }

    function it_provides_list_of_stops(
        $stopRepository,
        $stopFactory,
        stop $stop1,
        stop $stop2
    )
    {
        $stopRepository->getAll()->willReturn(
            array(
                array('repository1'),
                array('repository2'),
            )
        );

        $stopFactory->createStop(array('repository1'))->willReturn($stop1);
        $stopFactory->createStop(array('repository2'))->willReturn($stop2);

        $this->getAll()->shouldReturn(array($stop1,$stop2));
    }

    function it_provides_stops_details(
        $stopRepository,
        $stopFactory,
        stop $stop1
    )
    {
        $stopRepository->get(1)->willReturn(array('repository1'));

        $stopFactory->createStop(array('repository1'))->willReturn($stop1);

        $this->get(1)->shouldReturn($stop1);
    }
}