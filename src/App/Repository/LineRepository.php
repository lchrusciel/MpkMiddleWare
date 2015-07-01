<?php

namespace MPK\App\Repository;

use Doctrine\DBAL\Connection;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class LineRepository implements LineRepositoryInterface
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * LineRepository constructor.
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
        return $this->connection->fetchAll('SELECT * FROM mpk_lines');
    }
    
    /**
     * Fetches detailed date for provided line id.
     *
     * @param integer $lineId
     *
     * @return array
     */
    public function get($lineId)
    {
        return $this->connection->fetchAssoc("SELECT * FROM mpk_lines WHERE line = '".$lineId."'");
    }
}
