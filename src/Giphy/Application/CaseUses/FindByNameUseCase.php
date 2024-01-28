<?php

declare(strict_types=1);

namespace Src\Giphy\Application\CaseUses;

class FindByNameUseCase 
{
    /**
     * var gifRepository
     */
    private $gifRepository;

    public function __construct(GifRepository $gifRepository) {
        $this->gifRepository=$gifRepository;
    }

    function execute() : Collection {
        return new Collection();
    }


}