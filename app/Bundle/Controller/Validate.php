<?php

namespace app\Bundle\Controller;

/**
 * @author Mauro Ribeiro
 * @since 2020-01-31
 */
class Validate
{
    public function validadeRegister($login, $email, $password, $arr)
    {
        if(empty($login)) {
            return 'O campo login deve ser preenchido';
        } else if(empty($email)) {
            return 'O campo e-mail deve ser preenchido';
        } else if(empty($password)) {
            return 'O campo Senha deve ser preenchido';
        } else if($arr['username'] == $login) {
            return 'Esse login já existe';
        }  else if ($arr['email'] == $email) {
            return 'Esse e-mail já está cadastrado';
        } else {
            return null;
        }
    }
}