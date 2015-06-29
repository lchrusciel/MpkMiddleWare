<?php

namespace MPK\App\Adapter;

use MPK\App\Factory\StopFactoryInterface;
use MPK\App\Repository\StopRepositoryInterface;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class StopAdapter implements StopAdapterInterface
{
    /**
     * @var StopFactoryInterface
     */
    private $stopFactory;
    /**
     * @var StopRepositoryInterface
     */
    private $stopRepository;

    /**
     * StopAdapter constructor.
     * @param StopFactoryInterface $stopFactory
     * @param StopRepositoryInterface $stopRepository
     */
    public function __construct(StopFactoryInterface $stopFactory, StopRepositoryInterface $stopRepository)
    {
        $this->stopFactory = $stopFactory;
        $this->stopRepository = $stopRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function getAll()
    {
        $rawStops = $this->stopRepository->getAll();
        $stops = array();

        foreach($rawStops as $rawStop) {
            $stops[] = $this->stopFactory->create($rawStop);
        }

        return $stops;
    }
    
    /**
     * {@inheritdoc}
     */
    public function get($stopId)
    {
        $rawStop = $this->stopRepository->get($stopId);

        $stop = $this->stopFactory->create($rawStop);

        return $stop;
    }
    
    /**
     * Gets all stops for given line.
     *
     * @param integer $lineId
     *
     * @return array
     */
    public function getStopsForLine($lineId)
    {
        $rawStops = $this->stopRepository->getStopsForLine($lineId);
        $stops = array();

        foreach($rawStops as $rawStop) {
            $stops[] = $this->stopFactory->create($rawStop);
        }

        return $stops;
    }
}
