<?php

namespace App\Src\Giphy\Application\UseCase;

use App\Src\Giphy\Domain\Repository\GifRepositoryInterface;

class CreateFavoriteGifUseCase
{
    /**
     * var userRepository
     */
    private $gifRepository;

    public function __construct(GifRepositoryInterface $gifRepository)
    {
        $this->gifRepository = $gifRepository;
    }

    function execute(string $gif_id,string $nick, int $user_id): void
    {
        $this->gifRepository->save($gif_id,$nick,$user_id);
    }


}