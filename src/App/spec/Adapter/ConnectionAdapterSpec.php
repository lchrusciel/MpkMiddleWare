<?php

namespace spec\MPK\App\Adapter;

use MPK\App\Entity\Connection;
use MPK\App\Factory\ConnectionFactoryInterface;
use MPK\App\Repository\ConnectionRepositoryInterface;
use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class ConnectionAdapterSpec extends ObjectBehavior
{
    function let(ConnectionRepositoryInterface $connectionRepository, ConnectionFactoryInterface $connectionFactory)
    {
        $this->beConstructedWith($connectionRepository, $connectionFactory);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Adapter\ConnectionAdapter');
    }

    function it_implements_connection_adapter_interface()
    {
        $this->shouldImplement('MPK\App\Adapter\ConnectionAdapterInterface');
    }

    function it_provides_connection_for_given_stop(
        $connectionRepository,
        $connectionFactory,
        Connection $connection1,
        Connection $connection2
    )
    {
        $connectionRepository->get(1)->willReturn(array(array('connection1'),array('connection2')));
        $connectionFactory->create(array('connection1'))->willReturn($connection1);
        $connectionFactory->create(array('connection2'))->willReturn($connection2);
        $this->getConnection(1)->shouldReturn(array($connection1, $connection2));
    }
}