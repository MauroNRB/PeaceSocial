<?php

namespace app\Bundle\Model\Database;

class Database
{
    function connectDatabase()
    {
        $connect = mysql_connect('','', '');
        $db = mysql_select_db('');

        return $connect;
    }

    function queryBuilder($queryBuilder)
    {
        $connect = $this->connectDatabase();
        $select = mysql_query($queryBuilder);

        return $select;
    }

    function arrSelect($queryBuilder)
    {
        $connect = $this->connectDatabase();
        $select = mysql_query($queryBuilder,$connect);
        $arrQuery = mysql_fetch_array($select);

        return $arrQuery;
    }

    function queryBuilderInsert($queryBuilder)
    {
        $connect = $this->connectDatabase();
        $insert = mysql_query($queryBuilder, $connect);

        return $insert;
    }
}