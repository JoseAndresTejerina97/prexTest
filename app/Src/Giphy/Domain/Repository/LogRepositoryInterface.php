<?php

namespace App\Src\Giphy\Domain\Repository;
use App\Src\Giphy\Domain\Entity\Log;


interface LogRepositoryInterface
{
    public function save(Log $log): void;
}