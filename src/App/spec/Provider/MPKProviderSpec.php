<?php

namespace spec\MPK\App\Provider;

use PhpSpec\ObjectBehavior;
use MPK\App\Entity\Line;
use MPK\App\Entity\Stop;
use MPK\App\Adapter\LineAdapterInterface;
use MPK\App\Adapter\StopAdapterInterface;

/**
 * @author Łukasz Chruściel <lukasz.chrusciel@lakion.com>
 */
class MPKProviderSpec extends ObjectBehavior
{
    function let(
        LineAdapterInterface $linesAdapter,
        StopAdapterInterface $stopAdapter
    )
    {
        $this->beConstructedWith($linesAdapter, $stopAdapter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Provider\MPKProvider');
    }

    function it_implements_mpk_provider_interface()
    {
        $this->shouldImplement('MPK\App\Provider\MPKProviderInterface');
    }

    function it_provides_all_lines($linesAdapter)
    {
        $linesAdapter->getAll()->willReturn(array());
        $this->getAllLines()->shouldReturn(array());
    }

    function it_provides_detailed_line_information(
        $linesAdapter,
        $stopAdapter,
        Line $line,
        Stop $stop
    )
    {
        $linesAdapter->get(1)->willReturn($line);
        $line->getId()->willReturn(2);
        $stopAdapter->getStopsForLine(2)->willReturn(array($stop));
        $line->setStops(array($stop))->shouldBeCalled();
        $this->getLineWithStops(1)->shouldReturn($line);
    }

    function it_provides_all_stops($stopAdapter)
    {
        $stopAdapter->getAll()->willReturn(array());
        $this->getAllStops()->shouldReturn(array());
    }

    function it_provides_detailed_stop_inforamtion($stopAdapter, Stop $stop)
    {
        $stopAdapter->get(1)->willReturn($stop);
        $this->getStop(1)->shouldReturn($stop);
    }
}