<?php

namespace spec\MPK\App\Factory;

use MPK\App\Entity\Line;
use PhpSpec\ObjectBehavior;

/**
 * @author Łukasz Chruściel <lchrusciel@gmail.com>
 */
class LineFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MPK\App\Factory\LineFactory');
    }

    function it_implements_line_factory_interface()
    {
        $this->shouldImplement('MPK\App\Factory\LineFactoryInterface');
    }
    
    function it_creates_list_of_lines(Line $line)
    {
        $rawLine = array(
            'line_id' => 23,
            'type' => 'Autobusy',
            'line' => 52,
        );

        $line->getId()->willReturn(23);
        $line->getType()->willReturn('Autobusy');
        $line->getLine()->willReturn(52);

        $this->createLine($rawLine)->shouldBeSameAs($line);
    }

    /**
     * Custom matcher for Line comparison.
     */
    public function getMatchers()
    {
        return [
            'beSameAs' => function ($subject, $key) {
                if (!$subject instanceof Line || !$key instanceof Line) {
                    return false;
                }
                return (
                    $subject->getId() === $key->getId() &&
                    $subject->getType() === $key->getType() &&
                    $subject->getLine() === $key->getLine()
                );
            },
        ];
    }
}