<?php

namespace App\Src\Giphy\Domain\Repository;

use App\Src\Giphy\Domain\ValueObject\GifId;
use Illuminate\Database\Eloquent\Collection;
use App\Src\Giphy\Domain\Entity\Gif;
use App\Src\Giphy\Domain\ValueObject\User as User;

interface GifRepositoryInterface
{

    public function findByName(string $name, int $limit, int $offset): array;
    public function findByGifId(string $gifId): Gif;
    public function save(string $gif_id,string $nick, int $user_id): void;
}