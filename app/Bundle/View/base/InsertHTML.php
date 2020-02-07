<?php

namespace app\Bundle\View\base;

require '../Controller/Useful.php';

require '../Model/Database/Database.php';

/**
 * @author Mauro Ribeiro
 * @since 2020-02-03
 */

class InsertHTML
{
    public function constructorHeadHTML()
    {
        $userful = $this->constructorUsefull();

        $html = '
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <!--link rel="shortcut icon" href="img/ico.ico" type="image/x-icon">-->
            <link rel="stylesheet" href="compiled//font-awesome.min.css">
            <script src="compiled/jquery.min.js"></script >
            <link rel="stylesheet" href="compiled/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link type="text/css" rel="stylesheet" href="css/mmenu.css" />
            <link rel="stylesheet/less" type="text/css" href="css/style.less" />
            <script src="compiled/less.min.js"></script>
        ';

        $userful->constructorHTML($html);
    }

    public function constructorMenuHTML()
    {
        $userful = $this->constructorUsefull();

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

        $userful->constructorHTML($html);
    }

    public function constructorMessageHTML()
    {
        $userful = $this->constructorUsefull();

        $query = "SELECT a.id_message as id, a.message as message, a.title as title FROM message_social a ORDER BY a.id_message DESC";

        $database = $this->constructorDatabase();
        $result = $database->queryBuilder($query);

        if(!empty($result)) {
            $count = 0;
            while($aux = mysqli_fetch_assoc($result)) {
                $arrGroup = $userful->arrGroupPublications($aux);
                foreach ($arrGroup as $publications) {
                    $arrColor = array('color-1', 'color-2', 'color-3', 'color-4', 'color-5', 'color-6', 'color-7', 'color-8', 'color-9');

                    $color = $arrColor[array_rand($arrColor)];
                    $count ++;
                    if($count === 11) {
                        $count = 1;
                    }
                    $message = $publications['message'];
                    $title = $publications['title'] ?? null;

                    if(!empty($title)) {
                        $title = "<h3>$title</h3>";
                    }

                    $html = "
                        <div class='col-post $color'>    
                            <div class='publication'>
                                $title
                                $message
                            </div>
                        </div>
                    ";

                    $userful->constructorHTML($html);
                }
            }
        }
    }

    public function constructorFooterHTML()
    {
        $userful = $this->constructorUsefull();
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

        $userful->constructorHTML($html);
    }

    public function constructorUsefull()
    {
        $userful = new \app\Bundle\Controller\Useful();
        return $userful;
    }

    public function constructorDatabase()
    {
        $database = new \app\Bundle\Model\Database\Database();
        return $database;
    }
}