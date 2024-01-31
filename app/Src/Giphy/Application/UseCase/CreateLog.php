<?php

namespace App\Src\Giphy\Application\UseCase;

use App\Src\Giphy\Domain\Entity\Log;
use App\Src\Giphy\Domain\Repository\GifRepositoryInterface;
use App\Src\Giphy\Domain\Repository\LogRepositoryInterface;

class CreateLog
{
    /**
     * var logRepository
     */
    private $logRepository;

    public function __construct(LogRepositoryInterface $logRepository)
    {
        $this->logRepository = $logRepository;
    }

    function execute(
        string $service,
        string $requestBody,
        string $responseBody,
        int $responseCode,
        string $ipSource,
        string $userName= null,
        string $userEmail= null,
        int $userId= null
    ): void {
        $log = new Log($service, $requestBody, $responseBody, $responseCode, $ipSource, $userName, $userEmail,$userId);
        $this->logRepository->save($log);
    }


}