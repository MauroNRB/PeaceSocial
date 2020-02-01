<?php

namespace app\Bundle\Controller;

/**
 * Class Initial
 * @author Mauro Ribeiro
 * @since 2020-01-31
 */
class Initial
{
    function indexController()
    {
        $loginCookie = $_COOKIE['login'];
        if (isset($loginCookie)) {
            header("Location:app/Bundle/View/home.php");
        } else {
            header("Location:app/Bundle/View/login.php");
        }
    }

    function isLoginController()
    {
        $loginCookie = $_COOKIE['login'];
        if (!isset($loginCookie)) {
            header("Location:./login.php");
        }
    }
}