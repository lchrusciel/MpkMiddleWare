<?php

namespace spec\MPK\App\Repository;

use PhpSpec\ObjectBehavior;
use Doctrine\DBAL\Connection;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class StopRepositorySpec extends ObjectBehavior
{
    function let(Connection $connection)
    {
        $this->beConstructedWith($connection);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Repository\StopRepository');
    }

    function it_implements_stop_repository_interface()
    {
        $this->shouldImplement('MPK\App\Repository\StopRepositoryInterface');
    }

    function it_fetches_all_stops_from_database($connection)
    {
        $connection->fetchAll('SELECT * FROM mpk_stops')->shouldBeCalled()->willReturn(array('stops'));
        $this->getAll()->shouldReturn(array('stops'));
    }

    function it_fetches_detailed_stop_from_database($connection)
    {
        $connection->fetchAll('SELECT * FROM mpk_stops ms JOIN mpk_lines ml ON ms.service_line_id = ml.line_id WHERE ms.stop_number = 101')->shouldBeCalled()->willReturn(array('stop'));
        $this->get(101)->shouldReturn(array('stop'));
    }

    function it_fetches_stops_for_given_line($connection)
    {
        $connection->fetchAll('SELECT * FROM mpk_stops ms WHERE ms.service_line_id = 101')->shouldBeCalled()->willReturn(array('stop'));
        $this->getStopsForLine(101)->shouldReturn(array('stop'));
    }
}