<?php

use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    public function testThetest() {

        $c = 22;
        $this->assertEquals($c, 20);
    }
}