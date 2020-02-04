<?php

namespace app\Bundle\View\base;

require '../Controller/Initial.php';

/**
 * @author Mauro Ribeiro
 * @since 2020-02-03
 */
class Login
{
    public function isLogged()
    {
        $initial = $this->constructor();
        $initial->isLoggedController();
    }

    public function isLoggedLoginRegister()
    {
        $initial = $this->constructor();
        $initial->isLoggedLoginRegisterController();
    }

    public function logout()
    {
        $initial = $this->constructor();
        $initial->logout();
    }

    public function constructor()
    {
        $initial = new \app\Bundle\Controller\Initial();
        return $initial;
    }
}