<?php

namespace Emagia\Tests;

use PHPUnit\Framework\TestCase;
use Emagia\Stat;
use LogicException;

class StatTest extends TestCase
{
    private $stat;

    protected function setUp(): void
    {
        $this->stat = new Stat;
    }


    /**
     * @test
     */
    public function stats_class_exists()
    {
        $this->assertIsObject($this->stat);
    }

    /**
     * @test
     */
    public function stat_can_be_initialized_with_name()
    {
        $stat = new Stat("Defence");

        $this->assertEquals("Defence", $stat->name);
    }

    /**
     * @test
     */
    public function a_name_can_be_set_for_stat()
    {
        $this->assertEquals("", $this->stat->name);

        $this->stat->setName("Defence");

        $this->assertEquals("Defence", $this->stat->name);
    }

    /**
     * @test
     */
    public function stat_has_bounderies()
    {
        $this->assertEquals(null, $this->stat->lowerBound);
        $this->assertEquals(null, $this->stat->upperBound);

        $this->stat->setBoundaries(60, 100);

        $this->assertEquals(60, $this->stat->lowerBound);
        $this->assertEquals(100, $this->stat->upperBound);
    }

    /**
     * @test
     */
    public function upper_bound_must_be_higher_than_lower_bound()
    {
        $this->expectException(LogicException::class);
        $this->expectErrorMessage("Lower Bound must be lower than upper bound ");

        $this->stat->setBoundaries(100, 90);
    }

}
