<?php

namespace MPK\App\Factory;

use MPK\App\Entity\Connection;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class ConnectionFactory implements ConnectionFactoryInterface
{
    /**
     * @var LineFactoryInterface
     */
    private $lineFactory;
    /**
     * @var StopFactoryInterface
     */
    private $stopFactory;

    /**
     * ConnectionFactory constructor.
     * @param LineFactoryInterface $lineFactory
     * @param StopFactoryInterface $stopFactory
     */
    public function __construct(LineFactoryInterface $lineFactory, StopFactoryInterface $stopFactory)
    {
        $this->lineFactory = $lineFactory;
        $this->stopFactory = $stopFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $rawConnection)
    {
        $connection = new Connection();
        $connection->setTravelTime($rawConnection['time']);
        $connection->setLine($this->lineFactory->createLine($rawConnection));
        $connection->setDestinationStop($this->stopFactory->createDestination($rawConnection));
        $connection->setSourceStop($this->stopFactory->createSource($rawConnection));

        return $connection;
    }
}
