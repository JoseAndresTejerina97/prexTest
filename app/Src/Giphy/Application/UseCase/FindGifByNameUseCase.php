<?php

namespace App\Src\Giphy\Application\UseCase;

use App\Src\Giphy\Domain\Repository\GifRepositoryInterface;

class FindGifByNameUseCase
{
    /**
     * var userRepository
     */
    private $gifRepository;

    public function __construct(GifRepositoryInterface $gifRepository)
    {
        $this->gifRepository = $gifRepository;
    }

    function execute(string $name, int $limit, int $offset): array
    {

        return $this->gifRepository->findByName($name, $limit, $offset);
    }



}