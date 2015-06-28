<?php

namespace MPK\App\Provider;

use MPK\App\Adapter\LineAdapterInterface;
use MPK\App\Adapter\StopAdapterInterface;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class MPKProvider implements MPKProviderInterface
{
    /**
     * @var LineAdapterInterface
     */
    private $lineAdapter;
    /**
     * @var StopAdapterInterface
     */
    private $stopAdapter;

    /**
     * MPKProvider constructor.
     * @param LineAdapterInterface $lineAdapter
     * @param StopAdapterInterface $stopAdapter
     */
    public function __construct(LineAdapterInterface $lineAdapter, StopAdapterInterface $stopAdapter)
    {
        $this->lineAdapter = $lineAdapter;
        $this->stopAdapter = $stopAdapter;
    }
    
    /**
     * {@inheritdoc
     */
    public function getAllLines()
    {
        return $this->lineAdapter->getAll();
    }
    
    /**
     * {@inheritdoc
     */
    public function getLine($lineId)
    {
        return $this->lineAdapter->get($lineId);
    }
    
    /**
     * {@inheritdoc
     */
    public function getAllStops()
    {
        return $this->stopAdapter->getAll();
    }
    
    /**
     * {@inheritdoc
     */
    public function getStop($stopId)
    {
        return $this->stopAdapter->get($stopId);
    }
}
