<?php

namespace app\Bundle\Model\Database;

class Database
{
    public function connectDatabase()
    {
        $connect = mysql_connect('', '', '');
        $db = mysql_select_db('');

        return $connect;
    }

    public function queryBuilder($queryBuilder)
    {
        $connect = $this->connectDatabase();
        $select = mysql_query($queryBuilder);

        return $select;
    }

    public function arrSelect($queryBuilder)
    {
        $connect = $this->connectDatabase();
        $select = mysql_query($queryBuilder, $connect);
        $arrQuery = mysql_fetch_array($select);

        return $arrQuery;
    }

    public function queryBuilderInsert($queryBuilder)
    {
        $connect = $this->connectDatabase();
        $insert = mysql_query($queryBuilder, $connect);

        return $insert;
    }
}