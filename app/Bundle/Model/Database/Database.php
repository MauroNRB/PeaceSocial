<?php

namespace app\Bundle\Model\Database;

class Database
{
    public function connectDatabase()
    {
        $connect = mysqli_connect('localhost', 'root', '', 'peace_social');
        return $connect;
    }

    public function queryBuilder($queryBuilder)
    {
        $connect = $this->connectDatabase();
        $script = mysqli_query($connect, $queryBuilder);

        return $script;
    }

    public function arrSelect($queryBuilder)
    {
        $connect = $this->connectDatabase();

        $select = mysqli_query($connect, $queryBuilder);
        $arrQuery = mysqli_fetch_array($select);

        return $arrQuery;
    }
}