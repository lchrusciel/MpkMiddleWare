<?php

namespace spec\MPK\App\Provider;

use MPK\App\Adapter\TimetableAdapterInterface;
use MPK\App\Entity\Timetable;
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
        StopAdapterInterface $stopAdapter,
        TimetableAdapterInterface $timetableAdapter
    )
    {
        $this->beConstructedWith(
            $linesAdapter,
            $stopAdapter,
            $timetableAdapter
        );
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

    function it_provides_timetable_for_given_line_and_stop(
        $timetableAdapter
    )
    {
        $timetableAdapter->getTimetable(6,656)->shouldBeCalled()->willReturn(array());
        $this->getTimetable(6,656)->shouldReturn(array());
    }
}