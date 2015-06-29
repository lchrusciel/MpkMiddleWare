<?php

namespace spec\MPK\App\Repository;

use PhpSpec\ObjectBehavior;
use Doctrine\DBAL\Connection;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class LineRepositorySpec extends ObjectBehavior
{
    function let(Connection $connection)
    {
        $this->beConstructedWith($connection);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Repository\LineRepository');
    }

    function it_implements_line_repository_interface()
    {
        $this->shouldImplement('MPK\App\Repository\LineRepositoryInterface');
    }

    function it_fetches_all_stops_from_database($connection)
    {
        $connection->fetchAll('SELECT * FROM mpk_lines')->shouldBeCalled()->willReturn(array('stops'));
        $this->getAll()->shouldReturn(array('stops'));
    }

    function it_fetches_detailed_stop_from_database($connection)
    {
        $connection->fetchAssocc('SELECT * FROM mpk_lines ml JOIN mpk_stops ms ON ms.service_line_id = ml.line_id WHERE ml.line_id = 77')->shouldBeCalled()->willReturn(array('stop'));
        $this->get(77)->shouldReturn(array('stop'));
    }
}