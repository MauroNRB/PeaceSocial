<?php

namespace app\Bundle\Controller;

/**
 * @author Mauro Ribeiro
 * @since 2020-01-31
 */
class Initial
{
    public function indexController()
    {
        $loginSession = $_SESSION['social-login'];
        $passwordSession = $_SESSION['social-password'];

        if(isset($loginSession) && isset($passwordSession)) {
            header("Location:/PeaceSocial/app/Bundle/View/home.php");
        } else {
            header("Location:/PeaceSocial/app/Bundle/View/login.php");
        }
    }

    public function isLoginController()
    {
        $loginSession = isset($_SESSION['social-login']) ? $_SESSION['social-login'] : null;
        $passwordSession = isset($_SESSION['social-password']) ? $_SESSION['social-password'] : null;

        if(isset($loginSession) && isset($passwordSession)) {
            header("Location:./login.php");
        }
    }

    public function logOut()
    {
        session_unset();
        session_abort();
        header("Location:./../login.php");
    }
}