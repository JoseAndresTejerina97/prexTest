<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Src\Giphy\Domain\Entity\Gif as EntityGif;
use Src\Guiphy\Domain\Repository\GifRepositoryInterface ;
use Src\Giphy\Domain\ValueObjects\User;

class Gif implements GifRepositoryInterface
{
    use HasFactory;

    function findByName(\Src\Giphy\Domain\ValueObjects\Name $name) : Collection {
        return new Collection;
    }

    function findByGifId(\Src\Giphy\Domain\ValueObjects\GifId $gifId) : Collection {
        return new Collection;

    }

    function save(EntityGif $gif, User $user) : void {
        
    }
}
