<?php

namespace spec\MPK\App\Factory;

use MPK\App\Entity\Connection;
use MPK\App\Entity\Line;
use MPK\App\Entity\Stop;
use MPK\App\Factory\LineFactoryInterface;
use MPK\App\Factory\StopFactoryInterface;
use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class ConnectionFactorySpec extends ObjectBehavior
{
    function let(LineFactoryInterface $lineFactory, StopFactoryInterface $stopFactory)
    {
        $this->beConstructedWith($lineFactory, $stopFactory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Factory\ConnectionFactory');
    }

    function it_implements_connection_factory_interface()
    {
        $this->shouldImplement('MPK\App\Factory\ConnectionFactoryInterface');
    }

    function it_creates_connection_based_on_given_array(
        $lineFactory,
        $stopFactory,
        Connection $connection,
        Line $line,
        Stop $dstStop,
        Stop $srcStop
    )
    {
        $rawObject = array(
            'time' => '120',
            'line' => 'line',
            'srtStop' => 'stop',
            'dstStop' => 'stop',
        );
        $lineFactory->createLine($rawObject)->willReturn($line)->shouldBeCalled();
        $stopFactory->createDestination($rawObject)->willReturn($dstStop)->shouldBeCalled();
        $stopFactory->createSource($rawObject)->willReturn($srcStop)->shouldBeCalled();
        $connection->getDestinationStop()->willReturn('$dstStop');
        $connection->getLine()->willReturn('$line');
        $connection->getSourceStop()->willReturn('$srcStop');
        $connection->getTravelTime()->willReturn('120');

        $this->create($rawObject)->shouldBeSameAs($connection);
    }

    /**
     * Custom matcher for Line comparison.
     */
    public function getMatchers()
    {
        return [
            'beSameAs' => function ($subject, $key) {
                if (!$subject instanceof Connection || !$key instanceof Connection) {
                    return false;
                }
                return (
                    $subject->getTravelTime() === $key->getTravelTime()
                );
            },
        ];
    }
}