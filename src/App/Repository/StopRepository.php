<?php

namespace MPK\App\Repository;

use Doctrine\DBAL\Connection;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class StopRepository implements StopRepositoryInterface
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * StopRepository constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * {@inheritdoc}
     */
    public function getAll()
    {
        return $this->connection->fetchAll('SELECT stop_number, stop_street FROM mpk_stops GROUP BY stop_number, stop_street');
    }
    
    /**
     * {@inheritdoc}
     */
    public function get($stopId)
    {
        return $this->connection->fetchAssoc('SELECT * FROM mpk_stops ms JOIN mpk_lines ml ON ms.service_line_id = ml.line_id WHERE ms.stop_number = '.$stopId);
    }

    /**
     * {@inheritdoc}
     */
    public function getStopsForLine($stopId)
    {
        return $this->connection->fetchAll('SELECT * FROM mpk_stops ms WHERE ms.service_line_id = '.$stopId);
    }
}
