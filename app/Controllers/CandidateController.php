<?php

namespace App\Controllers;

use App\Core\Auth;

class CandidateController
{
    public function dashboard()
    {
        // Vérifie le rôle
        Auth::check(['candidate']);

        // Inclure la vue
        include __DIR__ . '/../Views/condidate/dashboard.php';
    }
}
