<?php

namespace MPK\App\Factory;

use MPK\App\Entity\Stop;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class StopFactory implements StopFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function create($rawStop)
    {
        $stop = new Stop();
        $stop->setStopNumber($rawStop['stop_number']);
        $stop->setStopStreet($rawStop['stop_street']);

        return $stop;
    }

    /**
     * {@inheritdoc}
     */
    public function createSource(array $rawStop)
    {
        $stop = new Stop();
        $stop->setId($rawStop['source_id']);
        $stop->setStopNumber($rawStop['source_stop_number']);
        $stop->setStopStreet($rawStop['source_stop_street']);

        return $stop;
    }

    /**
     * {@inheritdoc}
     */
    public function createDestination(array $rawStop)
    {
        $stop = new Stop();
        $stop->setId($rawStop['dst_id']);
        $stop->setStopNumber($rawStop['dst_stop_number']);
        $stop->setStopStreet($rawStop['dst_stop_street']);

        return $stop;
    }
}
