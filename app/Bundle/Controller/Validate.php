<?php

namespace app\Bundle\Controller;

/**
 * Class Validate
 * @author Mauro Ribeiro
 * @since 2020-02-01
 */
class Validate
{
    public function validadeRegister($login, $email, $password, $arrLogin, $arrEmail)
    {
        if($login == "" || $login == null) {;
            return 'O campo login deve ser preenchido';
        } else if($email == "" || $email == null) {
            return 'O campo e-mail deve ser preenchido';
        } else  if($password == "" || $password == null) {
            return 'O campo Senha deve ser preenchido';
        } else if($arrLogin == $login) {
            return 'Esse login já existe';
        }  else if ($arrEmail == $email) {
            return 'Esse e-mail já está cadastrado';
        } else {
            return null;
        }
    }
}