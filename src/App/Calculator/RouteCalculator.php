<?php

namespace MPK\App\Calculator;

use Doctrine\Common\Collections\ArrayCollection;
use MPK\App\Adapter\ConnectionAdapterInterface;
use MPK\App\Adapter\StopAdapterInterface;
use MPK\App\Entity\Connection;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class RouteCalculator implements RouteCalculatorInterface
{
    /**
     * @var StopAdapterInterface
     */
    private $stopAdapter;
    /**
     * @var ConnectionAdapterInterface
     */
    private $connectionAdapter;

    /**
     * RouteCalculator constructor.
     * @param StopAdapterInterface $stopAdapter
     * @param ConnectionAdapterInterface $connectionAdapter
     */
    public function __construct(StopAdapterInterface $stopAdapter, ConnectionAdapterInterface $connectionAdapter)
    {
        $this->stopAdapter = $stopAdapter;
        $this->connectionAdapter = $connectionAdapter;
    }

    /**
     * {@inheritdoc}
     */
    public function getConnectionFromStop($stopNumber)
    {
        $timedConnections = new ArrayCollection();
        $resultedCollection = new ArrayCollection();
        $baseTime = 0;

        for ($i = 0; $i < count($this->stopAdapter->getAll()); $i++) {
            $timedConnections = $this->calculate($timedConnections, $resultedCollection, $baseTime, $stopNumber);
            $nextNode = $this->takeNext($timedConnections, $resultedCollection);
            if (null === $nextNode) return $resultedCollection->toArray();
            $stopNumber = $nextNode->getDestinationStop()->getStopNumber();
            $baseTime = $nextNode->getTravelTime();
        }

        return $resultedCollection->toArray();
    }

    /**
     * Single calculator iteration.
     *
     * @param ArrayCollection $timedConnection
     * @param ArrayCollection $resultedCollection
     * @param integer $baseTime
     * @param string $stopNumber
     *
     * @return Connection
     */
    private function calculate(ArrayCollection $timedConnection, ArrayCollection $resultedCollection, $baseTime, $stopNumber)
    {
        $connections = $this->connectionAdapter->getConnection($stopNumber);

        if (0 == count($connections)) {
            return $timedConnection;
        }

        foreach ($connections as $connection) {
            $time = $connection->getTravelTime() + $baseTime;
            $connection->setTravelTime($time);

            if (!$timedConnection->containsKey($time)) {
                $timedConnection->set($time, new ArrayCollection());
            }

            $timedConnection->get($time)->add($connection);
        }

        $tmpArray = $timedConnection->toArray();
        ksort($tmpArray);

        return new ArrayCollection($tmpArray);
    }

    /**
     * Takes next element from a collection.
     *
     * @param ArrayCollection $timedConnection
     * @param ArrayCollection $resultedCollection
     *
     * @return Connection
     */
    private function takeNext(ArrayCollection $timedConnection, ArrayCollection $resultedCollection)
    {
        if (0 == $timedConnection->count()){
            return null;
        }

        $nextNode = $timedConnection->first()->first();
        $tmp  = $nextNode->getTravelTime();
        $timedConnection->get($tmp)->remove(0);

        if (0 == $timedConnection->get($nextNode->getTravelTime())->count()) {
            $timedConnection->remove($nextNode->getTravelTime());
        }

        $stopNumber = $nextNode->getDestinationStop()->getStopNumber();

        if (!$resultedCollection->containsKey($stopNumber)) {
            $resultedCollection->set($stopNumber, $nextNode);
            return $nextNode;
        }

        if ($resultedCollection->get($stopNumber)->getTravelTime() > $nextNode->getTravelTime()) {
            $resultedCollection->set($stopNumber, $nextNode);
        }

        return $this->takeNext($timedConnection, $resultedCollection);
    }
}
