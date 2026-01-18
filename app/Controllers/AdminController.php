<?php

namespace App\Controllers;

use App\Core\Auth;

class AdminController
{

    public function dashboard()
    {
        Auth::check(['admin']);
        include __DIR__ . '/../Views/admin/dashboard.php';;
    }
}
