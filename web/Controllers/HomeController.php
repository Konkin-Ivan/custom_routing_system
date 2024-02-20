<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\App;
use App\Core\View;
use JetBrains\PhpStorm\NoReturn;

class HomeController
{
    #[NoReturn]
    public function index(): View
    {
        $email = 'john@doe.com';
        $name = 'John Doe';
        $amount = 25;
        $db = App::db();
        $db->beginTransaction();

        $newUserStmt = $db->prepare(
            'INSERT INTO users (email, full_name, created_at) VALUES (?, ?, 1, NOW())'
        );

        $newInvoiceStmt = $db->prepare(
            'INSERT INTO invoices (amount, user_id) VALUES (?, ?,'
        );

        $newUserStmt->execute([$email, $name]);

        $userId = (int) $db->lastInsertId();

        $newInvoiceStmt->execute([$amount, $userId]);

        $db->commit();

        $fetchStmt = $db->prepare(
            'SELECT invoices.id AS invoice_id, amount, user_id, full_name
            FROM invoices
            INNER JOIN users ON user_id = users.id
            WHERE email = ?'
        );

        setcookie('UserName', 'Gio', time() + (24 * 60 * 60), '/', '', false, false);
        return View::make('index.view', ['foo' => 'bar']);
    }
}