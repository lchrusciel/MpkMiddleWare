<?php

namespace MPK\App\Factory;

use MPK\App\Entity\Timetable;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class TimetableFactory implements TimetableFactoryInterface
{
    /**
     * @var StopFactoryInterface
     */
    private $stopFactory;

    /**
     * @var LineFactoryInterface
     */
    private $lineFactory;

    /**
     * TimetableFactory constructor.
     * @param StopFactoryInterface $stopFactory
     * @param LineFactoryInterface $lineFactory
     */
    public function __construct(StopFactoryInterface $stopFactory, LineFactoryInterface $lineFactory)
    {
        $this->stopFactory = $stopFactory;
        $this->lineFactory = $lineFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $rawTimetable)
    {
        $timetable = new Timetable();
        $timetable->setDayType($rawTimetable['day_type']);
        $timetable->setTimetable($rawTimetable['timetable']);
        $timetable->setStop($this->stopFactory->create($rawTimetable));
        $timetable->setLine($this->lineFactory->createLine($rawTimetable));

        return $timetable;
    }
}
