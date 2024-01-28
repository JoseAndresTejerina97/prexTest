<?php

declare(strict_types=1);

namespace Src\Guiphy\Domain\Repository;

use Src\Giphy\Domain\ValueObjects\GifId;
use Src\Giphy\Domain\ValueObjects\Name;
use Illuminate\Database\Eloquent\Collection;
use Src\Giphy\Domain\Entity\Gif;
use Src\Giphy\Domain\ValueObjects\User as User;

interface GifRepositoryInterface
{

    public function findByName(Name $name): ?Collection;
    public function findByGifId(GifId $gifId): ?Collection;
    public function save(Gif $gif, User $user): void;
}