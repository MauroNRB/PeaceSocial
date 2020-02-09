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
        $this->validadeEmptyUsername($login);
        $this->validadeEmptyEmail($email);
        $this->validadePassword($password);

        if($arr['username'] == $login) {
            return 'Esse login já existe';
        }  else if ($arr['email'] == $email) {
            return 'Esse e-mail já está cadastrado';
        } else {
            return null;
        }
    }

    public function validadePublication($arr)
    {
        if($arr['ban'] == 1) {
            return 'Você não pode publicar, pois violou os termos de contrato';
        } else {
            return null;
        }
    }

    public function validadeEmailUpdatePassword($email)
    {
        $this->validadeEmptyEmail($email);
        return null;
    }

    public function validadeEmptyEmail($email)
    {
        if(empty($email)) {
            return 'O campo e-mail deve ser preenchido';
        }
    }

    public function validadeEmptyUsername($login)
    {
        if(empty($login)) {
            return 'O campo login deve ser preenchido';
        }
    }

    public function validadePassword($password) {
        if(empty($password)) {
            return 'O campo Senha deve ser preenchido';
        } else if(strlen($password) < 8) {
            return 'O campo Senha deve ter mais 8 caracteres';
        }
    }

    public function validadeUpdateAccount($password)
    {
        $this->validadePassword($password);
        return null;
    }
}