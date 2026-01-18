<?php

namespace App\Controllers;

use App\Core\Auth;

class RecruiterController
{

    public function dashboard()
    {
        Auth::check(['recruiter']);
        include __DIR__ . '/../Views/recruiter/dashboard.php';

    }

 
}
