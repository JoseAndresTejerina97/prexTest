<?php

namespace App\Src\Giphy\Infrastructure\Persistence\Eloquent\Repositories;

use App\Src\Giphy\Domain\Entity\User;
use App\Src\Giphy\Infrastructure\Persistence\Eloquent\Model\User as UserEloquent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Src\Giphy\Domain\Repository\UserRepositoryInterface;
class UserRepository implements UserRepositoryInterface
{
    private $userModelEloquent;

    public function __construct() {
        $this->userModelEloquent = new UserEloquent();
    }
    function login(string $email, string $password) : User|array {
        $userModel  = $this->userModelEloquent->where('email', $email)->first();
        if ($userModel) {
            if (Hash::check($password, $userModel->password)) {
 
                $token = $userModel->createToken('Laravel Password Grant Client');
                $userDomain= new User($userModel->id,$userModel->name,$userModel->email,$userModel->password,$token->accessToken,$token->token->expires_at);
                return $userDomain;
            } else {
                $response = ["message" => "Password mismatch"];
                return $response;
            }
        } else {
            $response = ["message" =>'User does not exist'];
            return $response;
        } 
    }

}
