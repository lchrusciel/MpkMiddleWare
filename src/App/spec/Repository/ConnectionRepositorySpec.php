<?php

namespace spec\MPK\App\Repository;

use Doctrine\DBAL\Connection;
use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class ConnectionRepositorySpec extends ObjectBehavior
{
    function let(Connection $connection)
    {
        $this->beConstructedWith($connection);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Repository\ConnectionRepository');
    }

    function it_implements_connection_repository_interface()
    {
        $this->shouldImplement('MPK\App\Repository\ConnectionRepositoryInterface');
    }

    function it_receives_connection_from_data_base($connection)
    {
        $connection->fetchAll("
        SELECT
            msc.time as time,
            mss.stop_number as source_stop_number,
            mss.id as source_id,
            mss.stop_street as source_stop_street,
            ml.line_id as line_id,
            ml.line as line,
            ml.type as type,
            msd.stop_number as dst_stop_number,
            msd.id as dst_id,
            msd.stop_street as dst_stop_street
        FROM mpk_stops_connections msc
        JOIN mpk_stops mss
        ON mss.id = msc.src_stop
        JOIN mpk_stops msd
        ON msd.id = msc.dst_stop
        JOIN mpk_lines ml
        ON ml.line_id = mss.service_line_id
        WHERE mss.stop_number = '13'
        ")->willReturn(array())->shouldBeCalled();

        $this->get(13)->shouldReturn(array());
    }
}