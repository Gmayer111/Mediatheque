<?php


namespace App\Service;


use Exception;
use Psr\Log\LoggerInterface;

class Random
{

    private int $index;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->index = 0;
    }

    public function securRandom(): int
    {
        try {
            return random_int(0, 500);
        }catch (Exception $e) {
            $this->logger->alert('Echec du random', [$e]);
            return $this->index++;
        }
    }
}