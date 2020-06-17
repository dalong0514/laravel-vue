<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testPushAndPop()
    {
        $stack = [];
        $this->assertEquals(0, count($stack));

        array_push($stack, 'dalong');
        $this->assertEquals(1, count($stack));
        $this->assertEquals('dalong', $stack[0]);
    }
}
