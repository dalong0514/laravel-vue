<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Box;

class StackTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testHasItemBox() {
        $box = new Box([
            'cat',
            'toy',
            'torch'
        ]);
        $this->assertTrue($box->has('toy'));
        $this->assertFalse($box->has('dalong'));
    }

    public function testTakeOneFromTheBox() {
        $box = new Box(['torch']);
        $this->assertEquals('torch', $box->takeOne());
        $this->assertNull($box->takeOne());
    }

    public function testStartWithALetter() {
        $box = new Box([
            'toy',
            'torch',
            'ball',
            'cat',
            'tissue'
        ]);
        $result = $box->startWith('t');
        $this->assertCount(3, $result);
        $this->assertContains('toy', $result);
        $this->assertEmpty($box->startWith('d'));
    }
}
