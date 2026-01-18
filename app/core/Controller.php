<?php

namespace App\Core;

class Controller
{

    protected function view(string $path): void
    {
        $file = __DIR__ . '/../Views/' . $path . '.php';

        if (!file_exists($file)) {
            die("Vue introuvable : " . $file);
        }

        require $file;
    }
}
