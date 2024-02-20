<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;

class InvoiceController
{
    public function index(): View
    {
        return View::make('invoices/index.view');
    }

    public function create(): View
    {
        return View::make('invoices/create.view');
    }

    public function store()
    {
        $amount = $_POST['amount'];
        dd($amount);
    }
}