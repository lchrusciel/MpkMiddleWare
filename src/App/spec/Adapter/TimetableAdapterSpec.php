<?php

namespace spec\MPK\App\Adapter;

use MPK\App\Entity\Timetable;
use MPK\App\Factory\TimetableFactoryInterface;
use MPK\App\Repository\TimetableRepositoryInterface;
use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class TimetableAdapterSpec extends ObjectBehavior
{
    function let(
        TimetableFactoryInterface $timetableFactory,
        TimetableRepositoryInterface $timetableRepository
    )
    {
        $this->beConstructedWith(
            $timetableFactory,
            $timetableRepository
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Adapter\TimetableAdapter');
    }

    function it_implements_timetable_adapter_interface()
    {
        $this->shouldImplement('MPK\App\Adapter\TimetableAdapterInterface');
    }

    function it_provides_timetable_for_given_line_and_stop(
        $timetableRepository,
        $timetableFactory,
        Timetable $timetable1,
        Timetable $timetable2
    )
    {
        $timetableRepository->getTimetable(6,656)->willReturn(array(array('timeTable1'), array('timeTable2')));
        $timetableFactory->create(array('timeTable1'))->willReturn($timetable1);
        $timetableFactory->create(array('timeTable2'))->willReturn($timetable2);

        $this->getTimetable(6,656)->shouldReturn(array($timetable1, $timetable2));
    }
}
