<?php
/**
 * Created by PhpStorm.
 * User: chrustu
 * Date: 01.07.2015
 * Time: 12:42
 */
namespace MPK\App\Adapter;
use MPK\App\Entity\Timetable;


/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
interface TimetableAdapterInterface
{
    /**
     * Provides Timetable for given line and stop.
     *
     * @param integer $lineNumber
     * @param integer $stopNumber
     *
     * @return Timetable
     */
    public function getTimetable($lineNumber, $stopNumber);
}