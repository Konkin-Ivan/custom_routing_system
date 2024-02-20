<?php

namespace App\Core;

class Config
{
    protected array $config = [];

    public function __construct(array $env)
    {
        $this->config = [
            'db' => [
                'host'      => $env['DB_HOST'],
                'user'      => $env['DB_USER'],
                'password'  => $env['DB_ROOT_PASSWORD'],
                'database'  => $env['DB_NAME'],
                'driver'    => $env['DB_DRIVER'] ?? 'mysql'
            ]
        ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}