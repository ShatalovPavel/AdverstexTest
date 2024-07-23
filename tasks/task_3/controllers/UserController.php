<?php

namespace App\Tasks\Task_3\Controllers;

use App\Tasks\Task_3\Services\User\UserServiceInterface;

class UserController
{
    public function __construct(
      private UserServiceInterface $userService
    ){}

    /**
     * @return void
     */
    public function index(): void {
        try {
            $users = $this->userService->getAllUsers();
            header('Content-Type: application/json');
            echo json_encode($users);
        } catch (\Exception $e) {
            header('Content-Type: application/json', true, 500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}