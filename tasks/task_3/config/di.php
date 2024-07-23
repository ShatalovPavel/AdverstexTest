<?php

namespace App\Tasks\Task_3\Config;

use App\Tasks\Task_3\Models\User;
use App\Tasks\Task_3\Repositories\User\UserRepository;
use App\Tasks\Task_3\Services\User\UserService;
use App\Tasks\Task_3\Controllers\UserController;
use App\Tasks\Task_3\Repositories\User\UserRepositoryInterface;
use App\Tasks\Task_3\Services\User\UserServiceInterface;
use Exception;

class Container {
    private array $bindings = [];

    /**
     * @param string $key
     * @param callable $resolver
     * @return void
     */
    public function set(string $key, callable $resolver): void {
        $this->bindings[$key] = $resolver;
    }

    /**
     * @param string $key
     * @return mixed
     * @throws Exception
     */
    public function get(string $key): mixed {
        if (isset($this->bindings[$key])) {
            return $this->bindings[$key]($this);
        }

        throw new Exception("Нет привязки для ключа: {$key}");
    }
}

$container = new Container();

$config = require 'database.php';

$container->set('DatabaseFactory', fn($c) => new DatabaseFactory(
    $config['type'],
    $config['host'],
    $config['db_name'],
    $config['username'],
    $config['password']
));

$container->set('User', fn($c) => new User($c->get('DatabaseFactory')->getConnection()));

$container->set(UserRepositoryInterface::class, fn($c) => new UserRepository($c->get('User')));

$container->set(UserServiceInterface::class, fn($c) => new UserService($c->get(UserRepositoryInterface::class)));

$container->set('UserController', fn($c) => new UserController($c->get(UserServiceInterface::class)));