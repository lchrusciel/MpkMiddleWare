<?php

namespace MPK\App\Provider;

use MPK\App\Adapter\LineAdapterInterface;
use MPK\App\Adapter\StopAdapterInterface;
use MPK\App\Adapter\TimetableAdapterInterface;
use MPK\App\Entity\Timetable;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class MPKProvider implements MPKProviderInterface
{
    /**
     * @var LineAdapterInterface
     */
    private $lineAdapter;
    /**
     * @var StopAdapterInterface
     */
    private $stopAdapter;
    /**
     * @var TimetableAdapterInterface
     */
    private $timetableAdapter;

    /**
     * MPKProvider constructor.
     * @param LineAdapterInterface $lineAdapter
     * @param StopAdapterInterface $stopAdapter
     * @param TimetableAdapterInterface $timetableAdapter
     */
    public function __construct(LineAdapterInterface $lineAdapter, StopAdapterInterface $stopAdapter, TimetableAdapterInterface $timetableAdapter)
    {
        $this->lineAdapter = $lineAdapter;
        $this->stopAdapter = $stopAdapter;
        $this->timetableAdapter = $timetableAdapter;
    }

    /**
     * {@inheritdoc
     */
    public function getAllLines()
    {
        return $this->lineAdapter->getAll();
    }
    
    /**
     * {@inheritdoc
     */
    public function getLine($lineId)
    {
        return $this->lineAdapter->get($lineId);
    }
    
    /**
     * {@inheritdoc
     */
    public function getAllStops()
    {
        return $this->stopAdapter->getAll();
    }
    
    /**
     * {@inheritdoc
     */
    public function getStop($stopId)
    {
        return $this->stopAdapter->get($stopId);
    }
    
    /**
     * Gets line for given id, and fetches all its stops.
     *
     * @param integer $lineId
     *
     * @return Line
     */
    public function getLineWithStops($lineId)
    {
        $line =  $this->lineAdapter->get($lineId);

        $line->setStops($this->stopAdapter->getStopsForLine($line->getId()));

        return $line;
    }
    
    /**
     * Gets timetable for given line and stop numbers.
     *
     * @param integer $lineNumber;
     * @param integer $stopNumber;
     *
     * @return Timetable
     */
    public function getTimetable($lineNumber, $stopNumber)
    {
        return $this->timetableAdapter->getTimetable($lineNumber, $stopNumber);
    }
}
