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
        $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)) {
            header("Location:app/Bundle/View/html/home.php");
        } else{
            header("Location:app/Bundle/View/html/login.php");
        }
    }
}