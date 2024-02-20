<?php

namespace App\Core;

class ViewNotFoundException extends \Exception
{
    protected $message = 'View not found';
}