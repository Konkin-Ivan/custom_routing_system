<?php

namespace App\classes;

class Home
{
    public function index(): string
    {
        setcookie('UserName', 'Gio', time() + (24 * 60 * 60), '/', '', false, false);
        return "Home";
    }
}