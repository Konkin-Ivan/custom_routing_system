<?php

namespace App\classes;

class Invoice
{
    public function index(): string
    {
        return "Invoices";
    }

    public function create(): string
    {
        return '<form method="post" action="/invoice/create"><label>Amount</label><input type="text" name="amount"></form>';
    }

    public function store()
    {
        $amount = $_POST['amount'];
        dd($amount);
    }
}