<?php

namespace spec\MPK\App\Factory;

use MPK\App\Entity\Stop;
use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class StopFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Factory\StopFactory');
    }

    function it_implements_stop_factory_interface()
    {
        $this->shouldImplement('MPK\App\Factory\StopFactoryInterface');
    }

    function it_creates_stop(Stop $stop)
    {
        $rawStop = array(
            'id' => 25878,
            'service_line_id' => 23,
            'stop_number' => 422,
            'stop_street' => 'KURCZAKI',
            'timetable_id' => 3031,
            'direction' => 1
        );

        $stop->getStopNumber()->willReturn(422);
        $stop->getStopStreet()->willReturn('KURCZAKI');
        $stop->getId()->willReturn(null);
        $stop->getServiceLine()->willReturn(null);

        $this->create($rawStop)->shouldBeSameAs($stop);
    }

    function it_creates_source_stop(Stop $stop)
    {
        $rawStop = array(
            'source_id' => 25878,
            'source_stop_number' => 422,
            'source_stop_street' => 'KURCZAKI',
        );

        $stop->getStopNumber()->willReturn(422);
        $stop->getStopStreet()->willReturn('KURCZAKI');
        $stop->getId()->willReturn(25878);
        $stop->getServiceLine()->willReturn(null);

        $this->createSource($rawStop)->shouldBeSameAs($stop);
    }

    function it_creates_destination_stop(Stop $stop)
    {
        $rawStop = array(
            'dst_id' => 25878,
            'dst_stop_number' => 422,
            'dst_stop_street' => 'KURCZAKI',
        );

        $stop->getStopNumber()->willReturn(422);
        $stop->getStopStreet()->willReturn('KURCZAKI');
        $stop->getId()->willReturn(25878);
        $stop->getServiceLine()->willReturn(null);

        $this->createDestination($rawStop)->shouldBeSameAs($stop);
    }

    /**
     * Custom matcher for Line comparison.
     */
    public function getMatchers()
    {
        return [
            'beSameAs' => function ($subject, $key) {
                if (!$subject instanceof Stop || !$key instanceof Stop) {
                    return false;
                }
                return (
                    $subject->getId() === $key->getId() &&
                    $subject->getServiceLine() === $key->getServiceLine() &&
                    $subject->getStopNumber() === $key->getStopNumber() &&
                    $subject->getStopStreet() === $key->getStopStreet()
                );
            },
        ];
    }
}