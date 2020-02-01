<?php

namespace app\Bundle\Controller;

/**
 * Class Initial
 * @author Mauro Ribeiro
 * @since 2020-01-31
 */
class Initial
{
    public function indexController()
    {
        $loginCookie = $_COOKIE['login'] ?? null;
        if (isset($loginCookie)) {
            header("Location:app/Bundle/View/home.php");
        } else {
            header("Location:app/Bundle/View/login.php");
        }
    }

    public function isLoginController()
    {
        $loginCookie = $_COOKIE['login'] ?? null;
        if (isset($loginCookie)) {
            header("Location:./login.php");
        }
    }
}