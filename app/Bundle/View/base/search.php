<?php

/**
 * @author Mauro Ribeiro
 * @since 2020-02-03
 */

$search = $_GET['search-title'] ?? null;

if(!empty($search)) {
    session_start();
    $_SESSION['search-title'] = $search;
    header("Location:../search.php");
}