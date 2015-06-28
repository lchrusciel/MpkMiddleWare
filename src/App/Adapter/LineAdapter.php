<?php

namespace MPK\App\Adapter;

use MPK\App\Factory\LineFactoryInterface;
use MPK\App\Repository\LineRepositoryInterface;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class LineAdapter implements LineAdapterInterface
{
    /**
     * @var LineFactoryInterface
     */
    private $lineFactory;
    /**
     * @var LineRepositoryInterface
     */
    private $lineRepository;

    /**
     * LineAdapter constructor.
     * @param LineFactoryInterface $lineFactory
     * @param LineRepositoryInterface $lineRepository
     */
    public function __construct(LineFactoryInterface $lineFactory, LineRepositoryInterface $lineRepository)
    {
        $this->lineFactory = $lineFactory;
        $this->lineRepository = $lineRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function getAll()
    {
        $rawLines = $this->lineRepository->getAll();
        $lines = array();

        foreach($rawLines as $rawLine) {
            $lines[] = $this->lineFactory->createLine($rawLine);
        }

        return $lines;
    }
    
    /**
     * {@inheritdoc}
     */
    public function get($lineId)
    {
        $rawLine = $this->lineRepository->get($lineId);

        $line = $this->lineFactory->createLineWithStops($rawLine);

        return $line;
    }
}
