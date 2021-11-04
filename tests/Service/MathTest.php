<?php

namespace App\Tests\Service;

use App\Service\Math;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{

    public function test_ok()
    {
        $result = Math::plus(1, 2);

        self::assertEquals(3, $result);
    }

    public function test_ko()
    {
        self::assertNotEquals(0, 1);
    }

    public function test_multiplication()
    {
        self::assertNotEquals(2, Math::multiplication(1, 2));
    }
}
