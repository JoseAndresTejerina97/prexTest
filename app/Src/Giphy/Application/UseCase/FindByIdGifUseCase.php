<?php

namespace App\Src\Giphy\Application\UseCase;

use App\Src\Giphy\Domain\Entity\Gif;
use App\Src\Giphy\Domain\Repository\GifRepositoryInterface;

class FindByIdGifUseCase 
{
   /**
     * var userRepository
     */
    private $gifRepository;

    public function __construct(GifRepositoryInterface $gifRepository)
    {
        $this->gifRepository = $gifRepository;
    }

    function execute(string $id): Gif
    {

        return $this->gifRepository->findByGifId($id);
    }




}