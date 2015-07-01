<?php

namespace MPK\App\Repository;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
interface TimetableRepositoryInterface
{
    /**
     * Gets timetable from database.
     *
     * @param integer $lineId
     * @param integer $stopId
     *
     * @return array
     */
    public function getTimetable($lineId, $stopId);
}