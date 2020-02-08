<?php

namespace app\Bundle\Controller;

/**
 * @author Mauro Ribeiro
 * @since 2020-02-01
 */
class Useful
{
    public function alert($msg, $route)
    {
        $html =  "
            <head>
                <link rel='stylesheet/less' type='text/css' href='../View/css/style.less' />
                <script src='../View/compiled/less.min.js'></script>
            </head>
            <body id='load-msg'>
                <div class='loader'></div>
            </body>
            <script language='javascript' type='text/javascript'>
                setTimeout(function(){ 
                    alert('$msg');
                    window.location.href= '$route';
                }, 1000);
            </script>
        ";

        $this->constructorHTML($html);
    }

    public function constructorHTML($html)
    {
        echo $html;
    }

    public function arrGroupPublications($queryBuilder)
    {
        $arr = array();
        foreach ($queryBuilder as $row) {
            $arr[$queryBuilder['id']] = $queryBuilder;
        }

        return $arr;
    }

    /**
     * @link https://www.devmedia.com.br/gerando-senhas-seguras-com-php/17497
     */
    public function passwordGenerator($length, $uppercase, $lowercase, $number, $symbols)
    {
        $password = '';

        $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
        $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
        $nu = "0123456789"; // $nu contem os números
        $si = "!@#$%¨&*()_+="; // $si contem os símbolos

        if ($uppercase){
            // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
            $password .= str_shuffle($ma);
        }

        if ($lowercase){
            // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
            $password .= str_shuffle($mi);
        }

        if ($number){
            // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
            $password .= str_shuffle($nu);
        }

        if ($symbols){
            // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
            $password .= str_shuffle($si);
        }

        // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
        return substr(str_shuffle($password),0,$length);
    }
}