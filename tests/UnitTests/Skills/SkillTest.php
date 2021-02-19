<?php

namespace Emagia\Tests\UnitTests\Skills;

use Emagia\Skills\Skill;
use PHPUnit\Framework\TestCase;

class SkillTest extends TestCase{

    private $skill;

    protected function setUp(): void
    {
        $this->skill = new Skill();
    }

    /**
     * @test
     */
    public function magic_shield_class_exists()
    {
        $this->assertIsObject($this->skill);
    }

}