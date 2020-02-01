<?php

namespace app\Bundle\Model\Database\Database;

class Database
{
    function connectDatabase()
    {
        $connect = mysql_connect('','', '');
        $db = mysql_select_db('');

        return $connect;
    }

    function select($query)
    {
        $queryBuilder = $query;
        $connect = $this->connectDatabase();
        $select = mysql_query($queryBuilder,$connect);
        $arrQuery = mysql_fetch_array($select);

        return $arrQuery;
    }
}