<?php

namespace App\Core ;
class Auth {

public static  function check(array $roles):void {
if (!isset($_SESSION['user']))
    {
        header('Location:/login');
        exit;
    }
}
}