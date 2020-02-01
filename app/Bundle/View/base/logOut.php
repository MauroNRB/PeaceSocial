<?php

if (isset($_POST['logOut'])) {
    $loginCookie = $_COOKIE['login'] ?? null;
    unset($loginCookie);
}