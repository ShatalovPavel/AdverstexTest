<?php

require_once 'config/database.php';
require_once 'config/DatabaseFactory.php';
require_once 'models/User.php';
require_once 'repositories/User/UserRepositoryInterface.php';
require_once 'repositories/User/UserRepository.php';
require_once 'services/User/UserServiceInterface.php';
require_once 'services/User/UserService.php';
require_once 'controllers/UserController.php';
require_once 'config/di.php';

use App\Tasks\Task_3\Config\Container;
use App\Tasks\Task_3\Controllers\UserController;

try {
    $controller = $container->get('UserController');
    $controller->index();
} catch (Exception $e) {
    header('Content-Type: application/json', true, 500);
    echo json_encode(['error' => $e->getMessage()]);
}