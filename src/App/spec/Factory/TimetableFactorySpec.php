<?php

namespace spec\MPK\App\Factory;

use MPK\App\Entity\Line;
use MPK\App\Entity\Stop;
use MPK\App\Entity\Timetable;
use MPK\App\Factory\LineFactoryInterface;
use MPK\App\Factory\StopFactoryInterface;
use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class TimetableFactorySpec extends ObjectBehavior
{
    function let(StopFactoryInterface $stopFactory, LineFactoryInterface $lineFactory)
    {
        $this->beConstructedWith($stopFactory, $lineFactory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Factory\TimetableFactory');
    }

    function it_is_implements_timetable_factory()
    {
        $this->shouldImplement('MPK\App\Factory\TimetableFactoryInterface');
    }

    function it_creates_timetable(
        $stopFactory,
        $lineFactory,
        Stop $stop,
        Line $line,
        Timetable $timetable
    )
    {
        $rawObject = array(
            'day_type' => 'workDay',
            'timetable' => 'hours',
            'stop' => 'rawStop',
            'line' => 'rawLine',
        );

        $lineFactory->createLine($rawObject)->willReturn($line);
        $stopFactory->create($rawObject)->willReturn($stop);

        $timetable->getDayType()->willReturn('workDay');
        $timetable->getTimetable()->willReturn('hours');
        $timetable->getStop()->willReturn($stop);
        $timetable->getLine()->willReturn($line);

        $this->create($rawObject)->shouldBeSameAs($timetable);
    }

    /**
     * Custom matcher for Line comparison.
     */
    public function getMatchers()
    {
        return [
            'beSameAs' => function ($subject, $key) {
                if (!$subject instanceof Timetable || !$key instanceof Timetable) {
                    return false;
                }
                return (
                    $subject->getDayType() === $key->getDayType() &&
                    $subject->getTimetable() === $key->getTimetable()
                );
            },
        ];
    }
}
