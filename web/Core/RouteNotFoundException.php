<?php

namespace App\Core;

class RouteNotFoundException extends \Exception
{
    protected $message = '404 Not found';
}