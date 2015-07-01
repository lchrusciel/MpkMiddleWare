<?php

namespace spec\MPK\App\Repository;

use Doctrine\DBAL\Connection;
use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class TimetableRepositorySpec extends ObjectBehavior
{
    function let(Connection $connection)
    {
        $this->beConstructedWith($connection);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Repository\TimetableRepository');
    }

    function it_implements_timetable_repository_interface()
    {
        $this->shouldImplement('MPK\App\Repository\TimetableRepositoryInterface');
    }

    function it_provides_timetable_for_given_line_and_stop($connection)
    {
        $connection->fetchAll("
          SELECT * FROM mpk_timetables mt
          JOIN mpk_stops ms
          ON ms.id = mt.stop_id
          JOIN mpk_lines ml
          ON mt.service_line_id = ml.line_id
          WHERE ml.line = '6'
          AND ms.stop_number = '656'"
        )
            ->willReturn(array())
            ->shouldBeCalled();

        $this->getTimetable(6, 656)->shouldReturn(array());
    }
}