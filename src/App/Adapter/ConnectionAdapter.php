<?php

namespace MPK\App\Adapter;

use MPK\App\Entity\Connection;
use MPK\App\Factory\ConnectionFactoryInterface;
use MPK\App\Repository\ConnectionRepositoryInterface;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class ConnectionAdapter implements ConnectionAdapterInterface
{
    /**
     * @var ConnectionRepositoryInterface
     */
    private  $connectionRepository;
    /**
     * @var ConnectionFactoryInterface
     */
    private $connectionFactory;

    /**
     * ConnectionAdapter constructor.
     * @param ConnectionRepositoryInterface $connectionRepository
     * @param ConnectionFactoryInterface $connectionFactory
     */
    public function __construct(ConnectionRepositoryInterface $connectionRepository, ConnectionFactoryInterface $connectionFactory)
    {
        $this->connectionRepository = $connectionRepository;
        $this->connectionFactory = $connectionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getConnection($stopNumber)
    {
        $rawConnections = $this->connectionRepository->get($stopNumber);
        $connections = array();

        foreach($rawConnections as $rawConnection) {
            $connections[] = $this->connectionFactory->create($rawConnection);
        }

        return $connections;
    }
}
