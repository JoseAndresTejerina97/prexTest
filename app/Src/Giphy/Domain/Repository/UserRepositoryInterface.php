<?php

namespace App\Src\Giphy\Domain\Repository;
use App\Src\Giphy\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function login(string $email, string $password): User|array;
}