<?php

namespace App\Tests\Service;

use App\Service\Random;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class RandomTest extends TestCase
{

    public function test_securRandom()
    {
        $logger = new Logger('test');
        $random = new Random($logger);

        $value = $random->securRandom();

        self::assertGreaterThanOrEqual(0, $value);
        self::assertLessThanOrEqual(500, $value);
    }
}
