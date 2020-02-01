<?php

require '../Controller/Initial.php';

$page = 'app/Bundle/View/afterLogin/home.php';

$initial = new \app\Bundle\Controller\Initial();
$initial->isLoginController();