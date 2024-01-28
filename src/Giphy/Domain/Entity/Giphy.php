<?php

declare(strict_types=1);

namespace Src\Giphy\Domain\Entity;


use Src\Giphy\Domain\Entity\ValueObjects\Name;
use Src\Giphy\Domain\Entity\ValueObjects\Address;
use Src\Giphy\Domain\Entity\ValueObjects\Latitude;

class Gif 
{
    public function __construct(
        public readonly ?int $id,
        public readonly Name $name,
        public readonly User $user,
        public readonly Path $path,
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'user' => $this->user,
            'path' => $this->path
        ];
    }
}