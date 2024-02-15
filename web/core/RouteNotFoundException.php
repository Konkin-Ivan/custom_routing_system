<?php

namespace App\core;

class RouteNotFoundException extends \Exception
{
    protected $message = '404 Not found';
}