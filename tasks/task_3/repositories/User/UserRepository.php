<?php

namespace App\Tasks\Task_3\Repositories\User;

use App\Tasks\Task_3\Models\User;
use Exception;

readonly class UserRepository implements UserRepositoryInterface
{
    public function __construct(
        private User $userModel
    )
    {}

    /**
     * @return array
     * @throws Exception
     */
    public function getAllUsers(): array {
        try {
            return $this->userModel->getAllUsers();
        }catch (Exception $exception){
            throw new Exception('Failed to get the users db', 0, $exception);
        }
    }
}