<?php



namespace App\Core;

class Controller
{
    protected function view(string $view): void
    {
        require "../app/Views/{$view}.php";
    }
}
