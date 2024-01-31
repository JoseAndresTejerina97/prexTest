<?php

namespace App\Src\Giphy\Infrastructure\Controller;

use App\Http\Controllers\Controller;
use App\Src\Giphy\Application\UseCase\CreateLog;
use App\Src\Giphy\Application\UseCase\LoginUserUseCase;
use App\Src\Giphy\Infrastructure\Persistence\Eloquent\Repositories\LogRepository;
use App\Src\Giphy\Infrastructure\Persistence\Eloquent\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    private $userRepository;
    private $logRepository;

    public function __construct(UserRepository $userRepository,LogRepository $logRepository)
    {
        $this->userRepository = $userRepository;
        $this->logRepository = $logRepository;

    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return  response(['errors' => $validator->errors()->all()], 201);
        }
        $loginUser = new LoginUserUseCase($this->userRepository);
        $userResult = $loginUser->execute($request->email, $request->password);
        $logUserCase = new CreateLog($this->logRepository);
        $userId=$userName=$userEmail=null;
        if (!is_array($userResult
        )) {
            $userId=$userResult->getId();
            $userName=$userResult->getName();
            $userEmail=$userResult->getEmail();
            $userResult=["token"=>$userResult->getToken(),"expires_at"=>$userResult->getExpiresAt()];
        }
        $response= response($userResult, 200);
        $logUserCase->execute("login",$request->getContent(),$response->content(), $response->getStatusCode(),$request->ip(),$userName,$userEmail,$userId);
        return $response;

    }

}
