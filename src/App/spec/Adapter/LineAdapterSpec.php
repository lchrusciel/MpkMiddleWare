<?php

namespace spec\MPK\App\Adapter;

use MPK\App\Entity\Line;
use MPK\App\Repository\LineRepositoryInterface;
use MPK\App\Factory\LineFactoryInterface;
use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class LineAdapterSpec extends ObjectBehavior
{
    function let(
        LineFactoryInterface $lineFactory,
        LineRepositoryInterface $lineRepository
    )
    {
        $this->beConstructedWith(
            $lineFactory,
            $lineRepository
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Adapter\LineAdapter');
    }

    function it_implements_line_adapter_interface()
    {
        $this->shouldImplement('MPK\App\Adapter\LineAdapterInterface');
    }

    function it_provides_list_of_lines(
        $lineRepository,
        $lineFactory,
        Line $line1,
        Line $line2
    )
    {
        $lineRepository->getAll()->willReturn(
            array(
                array('repository1'),
                array('repository2'),
            )
        );

        $lineFactory->createLine(array('repository1'))->willReturn($line1);
        $lineFactory->createLine(array('repository2'))->willReturn($line2);

        $this->getAll()->shouldReturn(array($line1,$line2));
    }

    function it_provides_lines_details(
        $lineRepository,
        $lineFactory,
        Line $line1
    )
    {
        $lineRepository->get(1)->willReturn(array('repository1'));

        $lineFactory->createLineWithStops(array('repository1'))->willReturn($line1);

        $this->get(1)->shouldReturn($line1);
    }
}