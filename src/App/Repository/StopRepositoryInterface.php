<?php

namespace MPK\App\Repository;

interface StopRepositoryInterface
{
    /**
     * Fetches all stops from database.
     *
     * @return array
     */
    public function getAll();

    /**
     * Fetches detailed stop for provided stop id.
     *
     * @param integer $stopId
     *
     * @return array
     */
    public function get($stopId);

    public function getStopsForLine($argument1);
}
