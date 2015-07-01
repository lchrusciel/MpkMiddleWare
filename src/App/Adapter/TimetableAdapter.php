<?php

namespace MPK\App\Adapter;
use MPK\App\Entity\Timetable;
use MPK\App\Factory\TimetableFactoryInterface;
use MPK\App\Repository\TimetableRepositoryInterface;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class TimetableAdapter implements TimetableAdapterInterface
{
    /**
     * @var TimetableRepositoryInterface
     */
    private $timetableRepository;
    /**
     * @var TimetableFactoryInterface
     */
    private $timetableFactory;

    /**
     * TimetableAdapter constructor.
     * @param TimetableRepositoryInterface $timetableRepository
     * @param TimetableFactoryInterface $timetableFactory
     */
    public function __construct(
        TimetableFactoryInterface $timetableFactory,
        TimetableRepositoryInterface $timetableRepository
    )
    {
        $this->timetableRepository = $timetableRepository;
        $this->timetableFactory = $timetableFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getTimetable($lineNumber, $stopNumber)
    {
        $rawTimetable = $this->timetableRepository->getTimetable($lineNumber, $stopNumber);
        $timetables = array();

        foreach($rawTimetable as $rawTimetable) {
            $timetables[] = $this->timetableFactory->create($rawTimetable);
        }

        return $timetables;
    }
}
