<?php

declare(strict_types=1);

namespace Src\Giphy\Application\CaseUses;

use Illuminate\Database\Eloquent\Collection;
use Src\Giphy\Domain\ValueObjects\GifId;
use Src\Guiphy\Domain\Repository\GifRepository;

class CreateGifUseCase 
{
    /**
     * var gifRepository
     */
    private $gifRepository;

    public function __construct(GifRepository $gifRepository) {
        $this->gifRepository=$gifRepository;
    }

    function execute(GifId $gifId) : Collection {

        return new Collection();
    }


}