<?php

namespace app\Bundle\View\base;

require '../Controller/Useful.php';

/**
 * @author Mauro Ribeiro
 * @since 2020-02-03
 */

class InsertHTML
{
    public function constructorHeadHTML()
    {
        $html = '
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <!--link rel="shortcut icon" href="img/ico.ico" type="image/x-icon">-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link type="text/css" rel="stylesheet" href="css/menu.css" />
            <link type="text/css" rel="stylesheet" href="css/mmenu.css" />
            <link rel="stylesheet/less" type="text/css" href="css/style.less" />
            <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js"></script>
        ';

        $userful = $this->constructor();
        $userful->constructorHTML($html);
    }

    public function constructorMenuHTML()
    {
        $html = '
            <div class="header">
                <a href="#menu"><span></span></a>
                Peace Social
            </div>
            <nav id="menu">
                <ul>
                    <li><a href="">Página Inicial</a></li>
                    <li><span>Cadastro</span>
                        <ul>
                            <li><a href="">Alterar Informações</a></li>
                        </ul>
                    </li>
                    <li><a href="base/logout.php" name="logout">Deslogar</a></li>
                </ul>
            </nav>
        ';

        $userful = $this->constructor();
        $userful->constructorHTML($html);
    }

    public function constructorFooterHTML()
    {
        $html = "
	        <script src='js/mmenu.js'></script>
            <script>
                new Mmenu( document.querySelector('#menu'));

                document.addEventListener( 'click', function( evnt ) {
                    var anchor = evnt.target.closest('a[href^=\"#/\"]');
                    if (anchor) {
                        evnt.preventDefault();
                    }
                });
            </script>
        ";

        $userful = $this->constructor();
        $userful->constructorHTML($html);
    }

    public function constructor()
    {
        $userful = new \app\Bundle\Controller\Useful();
        return $userful;
    }
}