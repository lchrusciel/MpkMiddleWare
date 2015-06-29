<?php

namespace MPK\App\Repository;

interface LineRepositoryInterface
{
    /**
     * Fetches all lines from database.
     *
     * @return array
     */
    public function getAll();

    /**
     * Fetches detailed date for provided line id.
     *
     * @param integer $lineId
     *
     * @return array
     */
    public function get($lineId);
}
