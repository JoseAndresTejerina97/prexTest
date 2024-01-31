<?php
namespace App\Src\Giphy\Application\UseCase;
use App\Src\Giphy\Domain\Entity\User;
use App\Src\Giphy\Domain\Repository\UserRepositoryInterface;


class LoginUserUseCase 
{
    /**
     * var userRepository
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository=$userRepository;
    }

    function execute(string $email, string $password) : User|array {

        return $this->userRepository->login($email,$password);
    }


}