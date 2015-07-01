<?php

namespace MPK\App\Repository;

use Doctrine\DBAL\Connection;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class TimetableRepository implements TimetableRepositoryInterface
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * TimetableRepository constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * {@inheritdoc}
     */
    public function getTimetable($lineId, $stopId)
    {
        return $this->connection->fetchAll(sprintf("
          SELECT * FROM mpk_timetables mt
          JOIN mpk_stops ms
          ON ms.id = mt.stop_id
          JOIN mpk_lines ml
          ON mt.service_line_id = ml.line_id
          WHERE ml.line = '%d'
          AND ms.stop_number = '%d'", $lineId, $stopId));
    }
}
