<?php

namespace App\Tasks\Task_3\Services\User;

use App\Tasks\Task_3\Repositories\User\UserRepositoryInterface;
use Exception;

readonly class UserService implements UserServiceInterface
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ){}

    /**
     * @return array
     * @throws Exception
     */
    public function getAllUsers(): array
    {
        try {
            return $this->userRepository->getAllUsers();
        }catch (Exception $exception){
            throw new Exception('An error occurred while fetching users', 0, $exception);
        }
    }
}