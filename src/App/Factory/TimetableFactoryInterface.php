<?php

namespace MPK\App\Factory;

use MPK\App\Entity\Timetable;


/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
interface TimetableFactoryInterface
{
    /**
     * Creates Timetable object base on given array.
     *
     * @param array $rawTimetable
     *
     * @return Timetable
     */
    public function create(array $rawTimetable);
}