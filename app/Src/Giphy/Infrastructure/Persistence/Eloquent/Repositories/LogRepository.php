<?php

namespace App\Src\Giphy\Infrastructure\Persistence\Eloquent\Repositories;

use App\Src\Giphy\Domain\Entity\Log;
use App\Src\Giphy\Domain\Entity\User;
use App\Src\Giphy\Domain\Repository\LogRepositoryInterface;
use App\Src\Giphy\Infrastructure\Persistence\Eloquent\Model\Log as LogEloquent;
use App\Src\Giphy\Infrastructure\Persistence\Eloquent\Model\User as UserEloquent;
use Illuminate\Support\Facades\Hash;
class LogRepository implements LogRepositoryInterface
{
    private $logModelEloquent;

    public function __construct() {
        $this->logModelEloquent = new LogEloquent();
    }
    function save(Log $log) : void {
        $this->logModelEloquent->service=$log->getService();
        $this->logModelEloquent->request_body=$log->getRequestBody();
        $this->logModelEloquent->response_code=$log->getResponseCode();
        $this->logModelEloquent->response_body=$log->getResponseBody();
        $this->logModelEloquent->ip_source=$log->getIpSource();
        $this->logModelEloquent->user_email=$log->getUserEmail();
        $this->logModelEloquent->user_name=$log->getUserName();
        $this->logModelEloquent->user_id=$log->getUserId();
        $this->logModelEloquent->save();
    }

}
